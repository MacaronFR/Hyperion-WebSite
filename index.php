<?php
use Hyperion\WebSite\Router;
use Hyperion\WebSite\TestController;

require_once "Router.php";
require_once "Controllers/TestController.php";
$rt = new Router(new TestController());
$rt->get("/lol", new TestController());
$rt->default();