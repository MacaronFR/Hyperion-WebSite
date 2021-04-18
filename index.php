<?php

use Hyperion\WebSite\Router;
use Hyperion\WebSite\TestController;
use Hyperion\WebSite\StoreController;
use Hyperion\WebSite\ConnectionController;
use Hyperion\WebSite\InscriptionController;
use Hyperion\WebSite\VerifInscriptionController;
use Hyperion\WebSite\ShopController;


include "autoload.php";

$rt = new Router(new TestController());
$rt->get("/lol", new TestController());
$rt->get("/", new StoreController());
$rt->get("/connect", new ConnectionController());
$rt->post("/connect", new ConnectionController());
$rt->get("/inscription", new InscriptionController());
$rt->post("/inscription", new InscriptionController());
$rt->get("/verif_inscription", new VerifInscriptionController());
$rt->post("/verif_inscription", new VerifInscriptionController());
$rt->get("/shop", new ShopController());
$rt->post("/shop", new ShopController());
$rt->default();