<?php

use App\Form;
use App\Table\TrainingTable;

$title = "Training";
$activeLinkTraining = "active";
$PageTitleDivider = "ARE YOU READY ?";


$table = new TrainingTable($pdo);
[$trainings, $pagination] = $table->pagination();
$popular = $table->getPopular("training", 1)[0];
$categories = $table->getItemCategories($popular->getId(), "training");
$levels = $table->getLevels();
$form = new Form();

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
        POPULAR TRAINING
    </h1>
</div>
<div class="container popular-video">
    <div class="container-video">
        <div class="video-title">
            <h4><?= $popular->getTitle() ?></h4>
            <p><?= $popular->getPosted_date() ?></p>
        </div>
        <iframe width="100%" height="350px" src="https://www.youtube.com/embed/8DZktowZo_k?autoplay=1&iv_load_policy=3" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="video-info">
        <div class="video-data">
            <h6><?= $popular->getLevel() ?></h6>
            <i class="fas fa-circle fa-xs"></i>
            <h6><?= round($popular->getLength()) ?> min</h6>
        </div>
        <p>
            <?= $popular->getDescription() ?>
        </p>
        <div class="video-categories">
            <?php foreach($categories as $category): ?>
                <a href="<?= $router->url('category-training', ['slug' => $category->getSlug(), 'id' => $category->getId()]) ?>"><?= e($category->getName()) ?></a>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div class="container-c">
    <img src="svg/dividers/divider-2.svg" loading="lazy" alt="Divider Image" class="divider-2">
    <h1 id="all-videos-divider" class="divider-heading-b">
        ALL VIDEOS
    </h1>
</div>
<div style="margin-top:140px;" class="container search-form-container">
    <form id="form_sort_training" class="search-form" action="" method="get">
        <?= $form->select("search_by", "sort_training", $levels) ?>
    </form>
    <form action="" method="post" class="search-form">
        <?= $form->input("Search...") ?>
    </form>
</div>

<div class="cards-wrapper">
    <?php foreach($trainings as $training): ?>
        <div class="col">
            <?php require dirname(__DIR__) . "/cards/watchCard.php" ?>
        </div>
    <?php endforeach ?>
</div>

<div class="pagination container">
    <?= $pagination->previousLink($router->url('training')) ?>
    <?= $pagination->nextLink($router->url('training')) ?>
</div>
