<?php

use App\Router;

require '../vendor/autoload.php';


define('PATH', dirname(__DIR__) . DIRECTORY_SEPARATOR . 'views');

$whoops = new \Whoops\Run;
$whoops->pushHandler(new \Whoops\Handler\PrettyPageHandler);
$whoops->register();

if(isset($_GET['page']) && $_GET['page'] === '1') {
    $uri = explode('?', $_SERVER['REQUEST_URI'])[0];
    $get = $_GET;
    unset($get['page']);
    $query = http_build_query($get);
    if(!empty($query)) {
        $uri = $uri . '?' . $query;
    }
    header('Location: ' . $uri);
    http_response_code(301);
    exit();
}

$router = new Router(PATH);
$router
    ->get('/', 'templates/home/home', 'home')
    ->get('/home', 'templates/home/home')

    ->match('/training', 'templates/trainings/index', 'training')
    ->get('/training/category/[*:slug]-[i:id]', 'templates/trainings/category', 'category-training')
    ->get('/training/[*:slug]-[i:id]', 'templates/trainings/single', 'single-training')
    ->post('/training/delete', 'templates/trainings/delete', 'delete')

    ->get('/blog', 'templates/blog/index', 'blog')
    ->get('/blog/category/[*:slug]-[i:id]', 'templates/blog/category', 'category-article')
    ->get('/blog/[*:slug]-[i:id]', 'templates/blog/single', 'single-article')

    ->get('/bookings', 'templates/bookings', 'bookings')
    ->get('/account', 'templates/account', 'account')
    ->get('/login', 'templates/login', 'login')
    ->get('/database', 'commands/fillUp', 'data')
    ->run();

?>