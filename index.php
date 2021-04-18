<?php

use Hyperion\WebSite\Router;
use Hyperion\WebSite\TestController;
use Hyperion\WebSite\StoreController;
use Hyperion\WebSite\ConnectionController;
use Hyperion\WebSite\ConnectionCheckController;
use Hyperion\WebSite\VerifConnectionController;
use Hyperion\WebSite\InscriptionController;
use Hyperion\WebSite\VerifInscriptionController;
use Hyperion\WebSite\ShopController;


include "autoload.php";
include "connectionCheck.php";

$rt = new Router(new TestController());
$rt->get("/lol", new TestController());
$rt->get("/", new StoreController());
$rt->get("/connect", new ConnectionController());
$rt->post("/verif_connect", new VerifConnectionController());
$rt->get("/inscription", new InscriptionController());
$rt->post("/verif_inscription", new VerifInscriptionController());
$rt->get("/shop", new ShopController());
$rt->default();