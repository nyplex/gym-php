<?php 

use App\Config;
use App\Table\ArticlesTable;

$title = "The Blog";
$PageTitleDivider = "THE BLOG";
$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Config::getPDO();
$table = new ArticlesTable($pdo, "articles");
$article = $table->findItem($id);
$categories = $table->getItemCategories($id, "articles");
$table->checkSlug($article->getSlug(), $slug, $id, 'single-article', $router);
$populars = $table->getPopular("articles", 3);
?>

<div class="container top-article">
    <h1><?= $article->getTitle() ?></h1>
    <p><?= $article->getPosted_date() ?></p>
</div>
<div class="container">
    <div class="single-article-content">
        <img src="svg/article-image.png" alt="">
        <p><?= e($article->getContent()) ?></p>
    </div>
</div>
<div style="margin-bottom:50px" class="pagination container">
    <?= $table->previousItem($article->getId()) ?>
    <?= $table->backToIndex() ?>
    <?= $table->nextItem($article->getId()) ?>
</div>
<div class="container-b">
    <img src="svg/dividers/divider-1.svg" loading="lazy" alt="Divider Image" class="divider-1">
    <h1 class="divider-heading-a">
        POPULAR ARTICLES
    </h1>
</div>
<div style="margin-bottom:-150px" class="container">
    <div class="cards-wrapper">
        <?php foreach($populars as $article): ?>
            <div class="col">
                <?php require dirname(__DIR__) . "/cards/readCard.php" ?>
            </div>
        <?php endforeach ?>
    </div>
</div>