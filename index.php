<?php
require_once "Router.php";
require_once "Controllers/TestController.php";
use Router\Router;
use Controller\TestController;
$rt = new Router(new TestController());
$rt->get("/lol", new TestController());
$rt->default();