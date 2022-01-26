<?php 

use App\Helpers\Text;
use App\Table\ArticlesTable;
use App\Model\Article;

$title = "Articles";
$activeLinkBlog = "active";
$PageTitleDivider = "ARTICLES";


$table = new ArticlesTable($pdo, "articles");
[$articles, $pagination] = $table->pagination();
/**@var Article */
$popular = $table->getPopular("articles", 1)[0];
$categories = $table->getItemCategories($popular->getId(), "articles");
$link = $router->url('blog');
?>

<div id="top-view" class="standard-container container-a">
    <p class="standard-paragraph">
    Lorem ipsum dolor sit amet, 
    consectetuer adipiscing elit, 
    sed diam nonummy nibh euismod tincidunt 
    ut laoreet dolore magna aliquam erat 
    sed diam nonummvy nibh euismod tincidunt 
    ut laoreet dolore magna aliquam erat.
    </p>
</div>
<div class="container-b">
    <img src="svg/dividers/divider-1.svg" loading="lazy" alt="Divider Image" class="divider-1">
    <h1 class="divider-heading-a">
        POPULAR ARTICLE
    </h1>
</div>
<div class="container">
    <div class="container-article">
        <div class="article-title">
            <h4><?= $popular->getTitle() ?></h4>
            <p><?= $popular->getPosted_date() ?></p>
        </div>
        <div class="article-content">
            <img src="svg/article-image.png" alt="">
            <p><?= $popular->getShortContent(500) ?></p>
        </div>
        <div style="margin-bottom:35px;justify-content:flex-end;margin-right:25px" class="pagination container">
            <a class="pagination-all-link" href="<?= $router->url('single-article', ['slug' => $popular->getSlug(), 'id' => $popular->getId()]) ?>"><button class="pagination-button">READ MORE</button></a>
        </div>
        <div class="article-categories">
            <?php foreach($categories as $category): ?>
                <a href="<?= $router->url('category-article', ['slug' => $category->getSlug(), 'id' => $category->getId()]) ?>"><?= e($category->getName()) ?></a>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="container-c">
    <img src="svg/dividers/divider-2.svg" loading="lazy" alt="Divider Image" class="divider-2">
    <h1 id="all-videos-divider" class="divider-heading-b">
        ALL ARTICLES
    </h1>
</div>
<div style="margin-top:140px" class="container search-form-container">
    <form class="search-form" action="" method="post">
        <select name="search_by" id="">
            <option value="views">Views</option>
            <option value="easy_first">By Category</option>
            <option value="recent">Most Recent</option>
        </select>
    </form>
    <form class="search-form" action="" method="post">
        <input class="standard-input" type="text" placeholder="Search...">
    </form>
</div>
<div class="cards-wrapper">
    <?php foreach($articles as $article): ?>
        <div class="col">
            <?php require dirname(__DIR__) . "/cards/readCard.php" ?>
        </div>
    <?php endforeach ?>
</div>
<div class="pagination container">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
</div>