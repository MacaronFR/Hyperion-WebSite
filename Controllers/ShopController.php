<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ShopController extends Controller{

	private function prepareShop(): string{
		ob_start();
		include "Views/shop.php";
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		$root = get_text("root");
		$head = $this->prepareHead("Shop");
		$info = $this->getShopInfo();
		$header = $this->prepareHeader_2($root['header'], "Shop", $info['categories']);
		$main = $this->prepareShop();
		$footer = $this->prepareFooter();
		$body = $this->prepareBody($header, $main, $footer);
		include "Views/root.php";
	}

	public function getShopInfo(): array|false{
		$res = API_request("/category", "GET");
		if($res === false){
			return false;
		}
		$categories = $res['content'];
		unset($categories['total'], $categories['totalNotFiltered']);
		return ['categories' => $categories];
	}

	/**
	 * @inheritDoc
	 */
	public function post(array $args){
		return false;
	}
}