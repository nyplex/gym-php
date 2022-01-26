<?php

use App\Config;

require dirname(dirname(__DIR__)) . '/vendor/autoload.php';

$pdo = Config::getPDO();
$faker = Faker\Factory::create();

$pdo->exec('SET FOREIGN_KEY_CHECKS = 0');
$pdo->exec('TRUNCATE TABLE training');
$pdo->exec('TRUNCATE TABLE training_categories');
$pdo->exec('TRUNCATE TABLE joint_training_category');
$pdo->exec('TRUNCATE TABLE articles ');
$pdo->exec('TRUNCATE TABLE article_categories');
$pdo->exec('TRUNCATE TABLE joint_articles_category ');
$pdo->exec('SET FOREIGN_KEY_CHECKS = 1');


for($i = 0; $i < 50; $i++) {
    $training_title = $faker->sentence(2, true);
    $description = $faker->paragraph(5, true);
    $slug = $faker->slug();
    $length = $faker->randomFloat(2, 3, 60);
    $views = $faker->numberBetween(10, 5000);
    $date = $faker->date('Y-m-d h:m:s', 'now');
    $levels = ["Easy", "Medium", "Medium+", "Hard", "Hard+"];
    $randomLevel = array_rand($levels, 1);
    $level = $levels[$randomLevel];
    $pdo->exec("INSERT INTO training SET title = '{$training_title}', slug = '{$slug}', description = '{$description}', level = '{$level}', length = '{$length}', views = '{$views}', posted_date = '{$date}'");
    $trainings[] = $pdo->lastInsertId();
}

for($i = 0; $i < 15; $i++) {
    $pdo->exec("INSERT INTO training_categories SET name = '{$faker->word()}', slug = '{$faker->slug()}'");
    $categories[] = $pdo->lastInsertId();
}

foreach($trainings as $training) {
    $randomCat = $faker->randomElements($categories, rand(0, count($categories)));
    foreach($randomCat as $category) {
        $pdo->exec("INSERT INTO joint_training_category SET training_id = $training, category_id = $category");
    }
}

for($i = 0; $i < 50; $i++){
    $article_title = $faker->sentence(2, true);
    $slug = $faker->slug();
    $content = $faker->paragraph(50, false);
    $views = $faker->numberBetween(10, 5000);
    $posted_date = $faker->date('Y-m-d h:m:s', 'now');
    $pdo->exec("INSERT INTO articles SET title = '{$article_title}', slug = '{$slug}', content = '{$content}', posted_date = '{$posted_date}', views = '{$views}'");
    $articles[] = $pdo->lastInsertId();
}
for($i = 0; $i < 15; $i++) {
    $pdo->exec("INSERT INTO article_categories SET name = '{$faker->word()}', slug = '{$faker->slug()}'");
    $article_categories[] = $pdo->lastInsertId();
}
foreach($articles as $article) {
    $randomArticleCat = $faker->randomElements($article_categories, rand(0, count($article_categories)));
    foreach($randomArticleCat as $article_category) {
        $pdo->exec("INSERT INTO joint_articles_category SET article_id = $article, category_id = $article_category");
    }
}