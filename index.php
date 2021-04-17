<?php

use Hyperion\WebSite\Router;
use Hyperion\WebSite\TestController;
use Hyperion\WebSite\StoreController;
use Hyperion\WebSite\ConnectionController;
use Hyperion\WebSite\InscriptionController;

include "autoload.php";

$rt = new Router(new TestController());
$rt->get("/lol", new TestController());
$rt->get("/", new StoreController());
$rt->get("/connect", new ConnectionController());
$rt->post("/connect", new ConnectionController());
$rt->get("/connect", new InscriptionController());
$rt->post("/connect", new InscriptionController());
$rt->default();