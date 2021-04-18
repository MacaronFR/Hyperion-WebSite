<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ShopController extends Controller
{

	private function prepareShop(): string{
		ob_start();
		include "Views/shop.php";
		return ob_get_clean();
	}
    /**
     * @inheritDoc
     */
    public function get(array $args){
        $head = $this->prepareHead("Shop");
        $header = $this->prepareHeader_2();
        $main = $this->prepareShop();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $head = $this->prepareHead("Shop");
        $header = $this->prepareHeader_2();
        $main = $this->prepareShop();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        var_dump($_POST);
        include "Views/root.php";
    }
}