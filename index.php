<?php

use Hyperion\WebSite\Router;
use Hyperion\WebSite\TestController;
use Hyperion\WebSite\StoreController;
use Hyperion\WebSite\ConnectionController;
use Hyperion\WebSite\DisconnectController;
use Hyperion\WebSite\TranslationController;
use Hyperion\WebSite\VerifConnectionController;
use Hyperion\WebSite\VerifAddDomainProductController;
use Hyperion\WebSite\InscriptionController;
use Hyperion\WebSite\VerifInscriptionController;
use Hyperion\WebSite\ShopController;
use Hyperion\WebSite\ManageCategoriesController;
use Hyperion\WebSite\ManageAddReferenceController;
use Hyperion\WebSite\ManageAllProductController;
use Hyperion\WebSite\ManageAllReferenceController;
use Hyperion\WebSite\TraderAddOfferController;


include "autoload.php";
include "connectionCheck.php";
get_lang();

$rt = new Router(new TestController());
$rt->get("/lol", TestController::class);
$rt->get("/", StoreController::class);
$rt->get("/connect", ConnectionController::class);
$rt->get("/connect/*", ConnectionController::class);
$rt->post("/check/connect", VerifConnectionController::class);
$rt->get("/inscription{/*/*}", InscriptionController::class);
$rt->post("/check/inscription", VerifInscriptionController::class);
$rt->get("/shop", ShopController::class);
$rt->get("/disconnect", DisconnectController::class);
$rt->get("/manage/categories", ManageCategoriesController::class);
$rt->post("/manage/categories", ManageCategoriesController::class);
$rt->get("/manage/add/reference", ManageAddReferenceController::class);
$rt->get("/manage/all/products", ManageAllProductController::class);
$rt->get("/trader/add/offer", TraderAddOfferController::class);
$rt->get("/manage/all/references", ManageAllReferenceController::class);
$rt->post("/manage/add/product", ManageAddReferenceController::class);
$rt->post("/check/add/domain/product", VerifAddDomainProductController::class);
$rt->get("/text/*/*", TranslationController::class);
$rt->default();