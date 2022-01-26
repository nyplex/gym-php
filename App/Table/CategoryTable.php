<?php 

namespace App\Table;

use PDO;
use Exception;
use App\Pagination;
use App\Model\Training;
use App\Model\Categories;

class CategoryTable extends Table {


    public function findCategory (int $id, string $table): Categories
    {
        $query = $this->pdo->prepare("SELECT * FROM {$table}_categories WHERE id = :id");
        $query->execute(['id' => $id]);
        $query->setFetchMode(PDO::FETCH_CLASS, Categories::class);
        $result = $query->fetch();
        if($result === false) {
            throw new Exception('This category ID does not exist');
        }
        return $result;
    }
    
    /**
     * paginationCategory
     *
     * @param  mixed $id category ID
     * @param  mixed $table training or blog
     * @return Pagination
     */
    public function paginationCategory(int $id, string $table): Pagination
    {
        $pagination = new Pagination("SELECT t.* FROM {$table} t JOIN joint_{$table}_category jtc ON jtc.{$table}_id = t.id WHERE jtc.category_id = {$id} ORDER BY posted_date DESC", "SELECT COUNT(category_id) FROM joint_{$table}_category WHERE category_id = {$id}");

        /**@var Training[] */
        return $pagination;
    }

}