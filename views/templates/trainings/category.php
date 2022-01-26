<?php 

use App\Config;
use App\Model\Training;
use App\Table\CategoryTable;

$title = "Training";
$id = (int)$params['id'];
$slug = $params['slug'];

$pdo = Config::getPDO();
$table = new CategoryTable($pdo);
$category = $table->findCategory($id, "training");
$table->checkSlug($category->getSlug(), $slug, $id, 'category-training', $router);


$PageTitleDivider = e($category->getName());
$pagination = $table->paginationCategory($id, "training");
$trainings = $pagination->getItems(Training::class);
$link = $router->url('category-training', ['id' => $category->getId(), 'slug' => $category->getSlug()]);

?>

<div style="margin-top:0" class="cards-wrapper">
    <?php foreach($trainings as $training): ?>
        <div style="margin-bottom:50px" class="col">
            <?php require dirname(__DIR__) . "/cards/watchCard.php" ?>
        </div>
    <?php endforeach ?>
</div>

<div class="pagination container">
    <?= $pagination->previousLink($link) ?>
    <?= $pagination->nextLink($link) ?>
</div>