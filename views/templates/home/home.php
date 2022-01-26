<?php

use App\Config;
use App\Table\Table;

$title = "HOME";
$activeLinkHome = "active";
$PageTitleDivider = "WELCOME,";

$pdo = Config::getPDO();
$table = new Table($pdo);
$popularTrainings = $table->getPopular("training", 3);
$popularArticles = $table->getPopular("articles", 3);
?>

<div class="standard-container container-a">
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

<div class="cards-wrapper">
    <?php foreach($popularTrainings as $training): ?>
        <div class="col">
            <?php require dirname(__DIR__) . "/cards/watchCard.php" ?>
        </div>
    <?php endforeach ?>
</div>

<div class="container-c">
    <img src="svg/dividers/divider-2.svg" loading="lazy" alt="Divider Image" class="divider-2">
    <h1 class="divider-heading-b">
        ABOUT US
    </h1>
</div>
<div class="about-container">
    <div class="about-image">
        <img src="svg/about-image" alt="Fitness Picture" loading="lazy">
    </div>
    <div class="about-text">
        <p>
        Lorem ipsum dolor sit amet, 
        consectetuer adipiscing elit, 
        sed diam nonummy nibh euismod tincidunt 
        ut laoreet dolore magna aliquam erat sed 
        diam nonummy nibh euismod tincidunt 
        ut laoreet dolore magna aliquam erat v dolore.
    <br><br>
        v magna aliquam erat sed diam nonummy 
        nibh euismod tincidunt 
        ut laoreet dolore magna aliquam erat.
        sit amet, consectetuer adipiscing elit sed.
        </p>
    </div>
</div>
<div class="container-d">
    <img src="svg/dividers/divider-1.svg" loading="lazy" alt="Divider Image" class="divider-3">
    <h1 class="divider-heading-c">
        POPULAR ARTICLES
    </h1>
</div>

<div class="cards-wrapper">
    <?php foreach($popularArticles as $article): ?>
        <div class="col">
            <?php require dirname(__DIR__) . "/cards/readCard.php" ?>
        </div>
    <?php endforeach ?>
</div>

<div class="container-e">
    <img src="svg/dividers/divider-3.svg" loading="lazy" alt="Divider Image" class="divider-4">
    <h1 class="divider-heading-d">
        NEWSLETTER
    </h1>
</div>
<div class="standard-container container-f">
    <p class="standard-paragraph">
        Lorem ipsum dolor sit amet, 
        consectetuer adipiscing elit, 
        sed diam nonummy nibh euismod tincidunt 
        ut laoreet dolore magna aliquam erat.
    </p>
</div>
<div class="standard-container form-container">
    <form action="#" method="post">
        <input class="standard-input" type="email" placeholder="Your Email" name="email">
        <button class="form-button" type="submit">CONFIRM</button><br>
        <div class="checkbox-container">
            <div class="div-checkbox">
                <label class="checkbox-label">
                    <input required class="form-checkbox" type="checkbox" name="checked" id="newsletter-checkbox">
                    <span class="custom-checkbox"></span>
                </label>
            </div>
            <div class="label-checkbox">
                <p class="checkbox-text">Lorem ipsum dolor sit amet, consecsit amet, consec Lorem ipsum </p>
            </div>
        </div>
    </form>
</div>