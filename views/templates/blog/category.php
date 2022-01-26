<?php 

use App\Config;
use App\Model\Article;
use App\Table\CategoryTable;

$title = "The Blog";
$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Config::getPDO();
$table = new CategoryTable($pdo, "articles");
$category = $table->findCategory($id, "articles");
$table->checkSlug($category->getSlug(), $slug, $id, 'category-articles', $router);


$PageTitleDivider = e($category->getName());
$pagination = $table->paginationCategory($id, "articles");
$articles = $pagination->getItems(Article::class);
$link = $router->url('category-article', ['id' => $category->getId(), 'slug' => $category->getSlug()]);

?>

<div style="margin-top:0" class="cards-wrapper">
    <?php foreach($articles as $article): ?>
        <div style="margin-bottom:50px" class="col">
            <?php require dirname(__DIR__) . "/cards/readCard.php" ?>
        </div>
    <?php endforeach ?>
</div>

<div class="pagination container">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
</div>