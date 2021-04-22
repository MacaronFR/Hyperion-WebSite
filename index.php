<?php

use Hyperion\WebSite\Router;
use Hyperion\WebSite\TestController;
use Hyperion\WebSite\StoreController;
use Hyperion\WebSite\ConnectionController;
use Hyperion\WebSite\DisconnectController;
use Hyperion\WebSite\VerifConnectionController;
use Hyperion\WebSite\InscriptionController;
use Hyperion\WebSite\VerifInscriptionController;
use Hyperion\WebSite\ShopController;
use Hyperion\WebSite\ManageCategories;
use Hyperion\WebSite\ManageAddProductController;


include "autoload.php";
include "connectionCheck.php";
get_lang();

$rt = new Router(new TestController());
$rt->get("/lol", TestController::class);
$rt->get("/", StoreController::class);
$rt->get("/connect", ConnectionController::class);
$rt->get("/connect/*", ConnectionController::class);
$rt->post("/verif_connect", VerifConnectionController::class);
$rt->get("/inscription", InscriptionController::class);
$rt->post("/verif_inscription", VerifInscriptionController::class);
$rt->get("/shop", ShopController::class);
$rt->get("/disconnect", DisconnectController::class);
$rt->get("/manageCategories", ManageCategories::class);
$rt->post("/manageCategories", ManageCategories::class);
$rt->get("/manageAddProduct", ManageAddProductController::class);
$rt->post("/manageAddProduct", ManageAddProductController::class);
$rt->default();