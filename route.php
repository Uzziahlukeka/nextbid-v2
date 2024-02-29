<?php
//changer ceci 
// post pour creer 
//delete pour supprimer
//put pour update 

$router->get('/', 'view/homepage.php')->only('guest');
$router->get('/index.php', 'view/homepage.php');
$router->get('/homepage', 'view/homepage.php');

$router->get('/main', 'view/logedin.php')->only('auth');
$router->get('/guest','view/guest.html')->only('guest');
$router->get('/redirect','view/message.html');
$router->get('/log out','controller/user/logout.php');

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
$router->post('/pay', 'view/item/pay.php');

$router->get('/about', 'view/about.html');
$router->get('/contact', 'view/contact.html');
