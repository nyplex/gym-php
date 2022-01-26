<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/0fd6fa10db.js" crossorigin="anonymous"></script>
    <title><?= e($title) ?? "GYM" ?></title>
</head>
<body>
<?php require "templates/header.php" ?>
<?=  $content ?>
<?php require "templates/footer.php" ?>

<script src="js/script.js"></script>
</body>
</html>