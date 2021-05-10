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
$rt->post("/verif_connect", VerifConnectionController::class);
$rt->get("/inscription{/*/*}", InscriptionController::class);
$rt->post("/verif_inscription", VerifInscriptionController::class);
$rt->get("/shop", ShopController::class);
$rt->get("/disconnect", DisconnectController::class);
$rt->get("/manageCategories", ManageCategoriesController::class);
$rt->post("/manageCategories", ManageCategoriesController::class);
$rt->get("/manageAddReference", ManageAddReferenceController::class);
$rt->get("/manageAllProducts", ManageAllProductController::class);
$rt->get("/traderAddOffer", TraderAddOfferController::class);
$rt->get("/manageAllReferences", ManageAllReferenceController::class);
$rt->post("/manageAddProduct", ManageAddReferenceController::class);
$rt->post("/verifAddDomainProduct", VerifAddDomainProductController::class);
$rt->get("/text/*/*", TranslationController::class);
$rt->default();