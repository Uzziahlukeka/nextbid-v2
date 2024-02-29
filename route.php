<?php 

/*return[
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
    '/pay' => 'view/item/pay.php',


    '/about'=>'view/about.html',
    '/contact'=>'view/about.html',
    '/about'=>'view/about.html'


];*/


//changer ceci 
// post pour creer 
//delete pour supprimer
//put pour update 

$router->get('/', 'view/homepage.php');
$router->get('/index.php', 'view/homepage.php');
$router->get('/homepage', 'view/homepage.php');

$router->get('/main', 'view/logedin.php');

$router->get('/create', 'view/user/create.php');
$router->get('/delete', 'view/user/delete.php');
$router->get('/edit', 'view/user/edit.php');
$router->get('/forget', 'view/user/forget.php');
$router->get('/login', 'view/user/login.php');
$router->get('/read', 'view/user/read.php');
$router->get('/show', 'view/user/show.php');
$router->get('/update', 'view/user/update.php');


$router->get('/new item', 'view/item/add_product.php');
$router->get('/edit item', 'view/item/ioupdate.php');
$router->get('/show item', 'view/item/Ishow.php');
$router->get('/update item', 'view/item/iupdate.php');
$router->get('/upload', 'view/item/upload.php');
$router->get('/delete item', 'view/item/idelete.php');
$router->get('/pay', 'view/item/pay.php');


$router->get('/about', 'view/about.html');
$router->get('/contact', 'view/contact.html');
