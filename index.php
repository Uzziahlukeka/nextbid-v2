<?php
session_start();

// Check if session data is set and redirect if necessary
if(isset($_SESSION['data'])){
    // Ensure 'main' page is not the same as the current page to avoid a loop
    if($_SERVER['REQUEST_URI'] !== '/main'){
        header('Location: /main');
        exit;
    }
}

// Include the Router class
require_once 'controller/Router/Router.php';

// Create a new instance of the Router class
$router = new Router();

// Define some routes
$routes = require 'route.php';

// Extract the path component from the request URI
$url = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
$url = urldecode($url);

// Determine the HTTP method of the request
$method = $_SERVER['REQUEST_METHOD'];

// Route the request
$router->route($url, $method);
