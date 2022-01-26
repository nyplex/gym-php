<?php 


namespace App\Table;

use PDO;
use Exception;
use App\Pagination;
use App\Model\Article;
use App\Model\Categories;

class ArticlesTable extends Table {


    public function pagination()
    {
        $pagination = new Pagination("SELECT * FROM articles ORDER BY posted_date DESC", "SELECT COUNT(id) FROM articles", 6, $this->pdo);
        $articles = $pagination->getItems(Article::class);
        $articlesById = [];
        foreach($articles as $article){
            $articlesById[$article->getId()] = $article;
        }

        $ids = implode(',', array_keys($articlesById));
        $categories = $this->pdo->query("SELECT c.*, jc.articles_id FROM joint_articles_category jc JOIN articles_categories c ON c.id = jc.category_id WHERE jc.articles_id IN ($ids)")->fetchAll(PDO::FETCH_CLASS, Categories::class);

        foreach($categories as $category) {
            $articlesById[$category->getArticle_id()]->addCategory($category);
        }
        return [$articles, $pagination];
    }

    
    
}