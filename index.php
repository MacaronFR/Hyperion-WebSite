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
use Hyperion\WebSite\TraderHistoryOfferController;
use Hyperion\WebSite\TraderPendingOfferController;
use Hyperion\WebSite\ExpertHistoryOfferController;
use Hyperion\WebSite\ExpertOffersController;
use Hyperion\WebSite\ExpertPendingOfferController;
use Hyperion\WebSite\ExpertConsultOneOfferController;
use Hyperion\WebSite\MyAccountController;


include "autoload.php";
session_start();
get_lang();

$rt = new Router();
$rt->get("/", StoreController::class);
$rt->get("/connect", ConnectionController::class);
$rt->get("/connect/*", ConnectionController::class);
$rt->post("/check/connect", VerifConnectionController::class);
$rt->get("/inscription{/*/*}", InscriptionController::class);
$rt->post("/check/inscription", VerifInscriptionController::class);
$rt->get("/shop", ShopController::class);
$rt->get("/disconnect", DisconnectController::class);
$rt->get("/manage/all/categories", ManageCategoriesController::class);
$rt->get("/manage/add/reference", ManageAddReferenceController::class);
$rt->get("/manage/all/products", ManageAllProductController::class);
$rt->get("/manage/all/references", ManageAllReferenceController::class);
$rt->get("/trader/add/offer", TraderAddOfferController::class);
$rt->get("/trader/history/offer", TraderHistoryOfferController::class);
$rt->get("/trader/pending/offer", TraderPendingOfferController::class);
$rt->get("/expert/pending/offer", ExpertPendingOfferController::class);
$rt->get("/expert/history/offer", ExpertHistoryOfferController::class);
$rt->get("/expert/consult/offer", ExpertConsultOneOfferController::class);
$rt->get("/expert/offers", ExpertOffersController::class);
$rt->get("/myAccount", MyAccountController::class);
$rt->post("/check/add/domain/product", VerifAddDomainProductController::class);
$rt->get("/text/*/*", TranslationController::class);
if(!$rt->isRouted()){
	http_response_code(404);
}