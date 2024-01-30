<?php

$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH); // Extract the path component

 $url=urldecode($url);

$routes = [
    '/homepage' => 'homepage.php',
    '/index.php' => 'homepage.php',
    '/main'=>'view/logedin.php',
    '/'=>'homepage.php',

    '/create' => 'view/user/create.php',
    '/delete' => 'view/user/delete.php',
    '/edit' => 'view/user/edit.php',
    '/forget' => 'view/user/forget.php',
    '/login' => 'view/user/login.php',
    '/read' => 'view/user/read.php',
    '/show' => 'view/user/show.php',
    '/update' => 'view/user/update.php',

    '/new item' => 'view/item/add_product.php',
    '/edit item' => 'view/item/ioupdate.php',
    '/show item' => 'view/item/Ishow.php',
    '/update item' => 'view/item/iupdate.php',
    '/upload' => 'view/item/iupdate.php',
    '/delete item' => 'view/item/idelete.php',
    '/payment' => 'view/item/payment.php'
];

if (array_key_exists($url, $routes)) {
    require_once $routes[$url];
} else {
    require_once 'view/404.php';
    echo "Route not found.";
}
?>
