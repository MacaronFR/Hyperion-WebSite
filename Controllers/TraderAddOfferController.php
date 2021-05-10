<?php


namespace Hyperion\WebSite;


class TraderAddOfferController extends Controller{
	protected function prepareTraderAddProduct(): string{
		$categories = API_request("/category", "GET");
		if($categories === false){
			header("Location: /500");
		}
		$categories = $categories['content'];
		unset($categories['total'], $categories['totalNotFiltered']);
		$traderAddOfferText = get_text("trader/add/offer");
		ob_start();
		include "Views/traderAddProduct.php";
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		$root = get_text("root");
		$head = $this->prepareHead("Trader Add Offer");
		$header = $this->prepareHeader_2($root['header'], "TraderAddOfferController");
		$main = $this->prepareTraderAddProduct();
		$footer = $this->prepareFooter();
		$body = $this->prepareBody($header, $main, $footer);
		include "Views/root.php";
	}

	/**
	 * @inheritDoc
	 */
	public function post(array $args){
		return false;
	}
}