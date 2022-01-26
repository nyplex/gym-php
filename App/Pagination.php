<?php 

namespace App;

use PDO;
use Exception;
use App\Helpers\Url;

class Pagination {


    private $sql;
    private $count;
    private $perPage;
    private $pdo;
    private $countPage;
    private $items;


    public function __construct(string $sql, string $count, int $perPage = 6, ?PDO $pdo = null)
    {
        $this->sql = $sql;
        $this->count = $count;
        $this->perPage = $perPage;
        $this->pdo = $pdo ?: Config::getPDO();

    }

    public function getItems(string $class): array 
    {
        if($this->items === null) {
            $currentPage = $this->getCurrentPage();
            $count = (int)$this->pdo->query($this->count)->fetch(PDO::FETCH_NUM)[0];
            $pages = ceil($count / $this->perPage);
            if($currentPage > $pages) {
                throw new Exception('Numero de page invalide');
            }
            $offset = $this->perPage * ($currentPage - 1);
            $this->items = $this->pdo->query($this->sql . " LIMIT $this->perPage OFFSET $offset")
            ->fetchAll(PDO::FETCH_CLASS, $class);
        }
        return $this->items;
    }

    public function previousLink(string $link): ?string 
    {
        $currentPage = $this->getCurrentPage();
        if($currentPage <= 1) return null;
        if($currentPage > 2) $link .= "?page=" . ($currentPage - 1);
        return "<a href='$link'><button class='previous pagination-button'>PREVIOUS<i class='preivous-arrow fas fa-angle-double-left'></i></button></a>";
    }

    public function nextLink(string $link): ?string
    {
        $currentPage = $this->getCurrentPage();
        $pages = $this->getPages();
        if($currentPage >= $pages){
            return null;
        } 
        $link .= "?page=" . ($currentPage + 1);
        return "<a href='$link'><button class='next pagination-button'>NEXT<i class='next-arrow fas fa-angle-double-right'></i></button></a>";
    }

    public function getCurrentPage(): int 
    {
        return Url::getPositiveInt('page', 1);
    }

    private function getPages(): int 
    {
        if($this->countPage === null) {
            $this->countPage = (int)$this->pdo
                ->query($this->count)
                ->fetch(PDO::FETCH_NUM)[0];
        }
        
        return ceil($this->countPage / $this->perPage);
    }


}