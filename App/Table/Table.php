<?php 

namespace App\Table;

use PDO;
use Exception;
use App\Model\Article;
use App\Model\Training;
use App\Model\Categories;

class Table {

    protected $pdo;
    private $table;

    public function __construct(PDO $pdo, ?string $table = null)
    {
        $this->pdo = $pdo;
        $this->table = $table;
    }

    public function getItemCategories(int $id, string $table): array
    {
        $query = $this->pdo->prepare("SELECT tc.id, tc.slug, tc.name FROM joint_{$table}_category jtc JOIN {$table}_categories tc ON jtc.category_id = tc.id WHERE jtc.{$table}_id = :id");
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, Categories::class);
        /** @var Categories[] */
        return $query->fetchAll();
    }

    public function checkSlug(string $originalSlug, string $slug, int $id, string $url, $router): void
    {
        if($originalSlug !== $slug) {
            $url = $router->url($url, ['slug' => $originalSlug, 'id' => $id]);
            http_response_code(301);
            header('Location: ' . $url);
        }
    }

    /**
     * @return Training[]
     */
    public function getPopular(string $table, int $limit): array
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table} ORDER BY views DESC LIMIT {$limit}");
        $query->execute();
        if($table === "training") {
            $query->setFetchMode(PDO::FETCH_CLASS, Training::class);
        }else{
            $query->setFetchMode(PDO::FETCH_CLASS, Article::class);
        }
        $result = $query->fetchAll();
        if($result === false) {
            throw new Exception("This {$table} ID does not exist");
        }
        return $result;
    }

    public function findItem (int $id)
    {
        $query = $this->pdo->prepare("SELECT * FROM {$this->table} WHERE id = :id");
        $query->execute(['id' => $id]);
        if($this->table === "articles") {
            $query->setFetchMode(PDO::FETCH_CLASS, Article::class);
        }else{
            $query->setFetchMode(PDO::FETCH_CLASS, Training::class);
        }
        $result = $query->fetch();
        if($result === false) {
            return false;
            throw new Exception('This training ID does not exist');
        }
        return $result;
    }


    public function previousItem(int $currentId): ?string
    {
        $item = $this->findItem($currentId - 1, $this->table);
        if($item === false) {
            return null;
            exit();
        }
        if($this->table === "training") {
            $link = "/training/{$item->getSlug()}-{$item->getId()}";
        }else{
            $link =  "/blog/{$item->getSlug()}-{$item->getId()}";
        }
        return "<a class='pagination-previous-link' href='$link'><button class='previous pagination-button'>PREVIOUS<i class='preivous-arrow fas fa-angle-double-left'></i></button></a>";

        
    }

    public function nextItem(int $currentId): ?string
    {
        $item = $this->findItem($currentId + 1, $this->table);
        if($item === false) {
            return null;
            exit();
        }
        if($this->table === "training") {
            $link = "/training/{$item->getSlug()}-{$item->getId()}";
        }else{
            $link =  "/blog/{$item->getSlug()}-{$item->getId()}";
        }
        return "<a class='pagination-next-link' href='$link'><button class='next pagination-button'>NEXT<i class='next-arrow fas fa-angle-double-right'></i></button></a>";
    }

    public function backToIndex(): ?string 
    {
        if($this->table === "training") {
            $link = "/training";
            $title = "ALL VIDEOS";
        }else{
            $link =  "/blog";
            $title = "ALL ARTICLES";
        }
        return "<a class='pagination-all-link' href='$link'><button class='all-button pagination-button'>{$title}</button></a>";
 
    }

}