<?php

use Hyperion\WebSite\PayementController;
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
use Hyperion\WebSite\TraderInstructionController;
use Hyperion\WebSite\ExpertHistoryOfferController;
use Hyperion\WebSite\ExpertOffersController;
use Hyperion\WebSite\ExpertPendingOfferController;
use Hyperion\WebSite\ExpertConsultOneOfferController;
use Hyperion\WebSite\ExpertReceptionController;
use Hyperion\WebSite\MyAccountController;
use Hyperion\WebSite\ShopProductController;
use Hyperion\WebSite\CartController;
use Hyperion\WebSite\OrdersPendingController;
use Hyperion\WebSite\OrderHistoryController;
use Hyperion\WebSite\AdministrationUsersController;
use Hyperion\WebSite\AdministrationFacturesController;
use Hyperion\WebSite\StripController;
use Hyperion\WebSite\GameController;
use Hyperion\WebSite\InvoicesController;
use Hyperion\WebSite\InvoicesVendorsController;


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
$rt->get("/shop{/*}", ShopController::class, ['main']);
$rt->get("/shop/cat/*/type/*/brand/*/*{/filter/_}", ShopController::class, ['cat', 'type', 'brand']);
$rt->get("/shop/cat/*/brand/*/*{/filter/_}", ShopController::class, ['cat', 'brand']);
$rt->get("/shop/cat/*/type/*/*{/filter/_}", ShopController::class, ['cat', 'type']);
$rt->get("/shop/type/*/brand/*/*{/filter/_}", ShopController::class, ['type', 'brand']);
$rt->get("/shop/type/*/*{/filter/_}", ShopController::class, ['type']);
$rt->get("/shop/brand/*/*{/filter/_}", ShopController::class, ['brand']);
$rt->get("/shop/cat/*/*{/filter/_}", ShopController::class, ['cat']);
$rt->get("/disconnect", DisconnectController::class);
$rt->get("/manage/all/categories", ManageCategoriesController::class);
$rt->get("/manage/add/reference", ManageAddReferenceController::class);
$rt->get("/manage/all/products", ManageAllProductController::class);
$rt->get("/manage/all/references", ManageAllReferenceController::class);
$rt->get("/trader/add/offer", TraderAddOfferController::class);
$rt->get("/trader/history/offer", TraderHistoryOfferController::class);
$rt->get("/trader/pending/offer", TraderPendingOfferController::class);
$rt->get("/trader/instruction", TraderInstructionController::class);
$rt->get("/expert/offer/pending", ExpertPendingOfferController::class);
$rt->get("/expert/offer/history", ExpertHistoryOfferController::class);
$rt->get("/expert/offer/consult", ExpertConsultOneOfferController::class);
$rt->get("/expert/offer", ExpertOffersController::class);
$rt->get("/expert/reception", ExpertReceptionController::class);
$rt->get("/me", MyAccountController::class);
$rt->post("/check/add/domain/product", VerifAddDomainProductController::class);
$rt->get("/text/*/*", TranslationController::class);
$rt->get("/shop/product/*", ShopProductController::class);
$rt->get("/cart", CartController::class);
$rt->get("/order/pending", OrdersPendingController::class);
$rt->get("/order/history", OrderHistoryController::class);
$rt->get("/administration/users", AdministrationUsersController::class);
$rt->get("/administration/factures", AdministrationFacturesController::class);
$rt->post("/strip", StripController::class);
$rt->get("/strip", StripController::class);
$rt->post("/strip/confirm", StripController::class);
$rt->get("/payement/accepted/*", PayementController::class);
$rt->get("/game", GameController::class);
$rt->get("/invoice", InvoicesController::class);
$rt->get("/invoice/vendor", InvoicesVendorsController::class);

if(!$rt->isRouted()){
	http_response_code(404);
}
