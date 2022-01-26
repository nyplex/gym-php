<?php

use App\Config;
use App\Table\TrainingTable;

$title = "Training";
$PageTitleDivider = "GET READY!";

$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Config::getPDO();
$table = new TrainingTable($pdo, "training");
$training = $table->findItem($id);
$categories = $table->getItemCategories($id, "training");
$table->checkSlug($training->getSlug(), $slug, $id, 'single-training', $router);
$populars = $table->getPopular("training", 3);

?>

<div class="container popular-video single-training">
    <div class="container-single-video">
        <div class="video-title">
            <h4 style="font-size:30px"><?= $training->getTitle() ?></h4>
            <p style="font-size:25px"><?= $training->getPosted_date() ?></p>
        </div>
        <iframe width="100%" height="450px" src="https://www.youtube.com/embed/8DZktowZo_k?autoplay=1&iv_load_policy=3" title="YouTube video player" frameborder="0" allow="accelerometer; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>
    <div class="video-single-info">
        <div class="video-data">
            <h6><?= $training->getLevel() ?></h6>
            <i class="fas fa-circle fa-xs"></i>
            <h6><?= round($training->getLength()) ?> min</h6>
        </div>
        <p><?= $training->getDescription() ?></p>
        <div class="video-categories">
            <?php foreach($categories as $category): ?>
                <a href="<?= $router->url('category-training', ['slug' => $category->getSlug(), 'id' => $category->getId()]) ?>"><?= e($category->getName()) ?></a>
            <?php endforeach ?>
        </div>
    </div>
</div>
<div style="margin-bottom:50px" class="pagination container">
    <?= $table->previousItem($training->getId()) ?>
    <?= $table->backToIndex() ?>
    <?= $table->nextItem($training->getId()) ?>
</div>
<div class="container-b">
    <img src="svg/dividers/divider-1.svg" loading="lazy" alt="Divider Image" class="divider-1">
    <h1 class="divider-heading-a">
        POPULAR TRAINING
    </h1>
</div>
<div style="margin-bottom:-150px" class="container">
    <div class="cards-wrapper">
        <?php foreach($populars as $training): ?>
            <div class="col">
                <?php require dirname(__DIR__) . "/cards/watchCard.php" ?>
            </div>
        <?php endforeach ?>
    </div>
</div>