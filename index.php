<?php
require __DIR__ . "/vendor/autoload.php";

use CoffeeCode\Router\Router;

$router = new Router(ROOT);

//Aplicativo
$router->group(null)->namespace("Source\Controllers\App");
$router->get("/","Home:index","Home.index");
$router->get("/author","Author:index","Author.index");

//Api
$router->group("search")->namespace("Source\Controllers\Api");
$router->post("/cep","Search:fetchcep","Search.fetchcep");

//Routes CORE
$router->group("core")->namespace("Source\Controllers\Core");
$router->post("/fetchstate","Controller:fetchstate","Controller.fetchstate");
$router->post("/txtcreate","Controller:txtcreate","Controller.txtcreate");

//error page
$router->group("oops")->namespace("Source\Controllers\Error");
$router->get("/{errcode}", "Error:index");

$router->dispatch();

if ($router->error()) {
    $router->redirect("/oops/{$router->error()}");
}