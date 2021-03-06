<?php


namespace Hyperion\WebSite;


class TraderAddOfferController extends Controller{
	protected function prepareTraderAddProduct($traderAddOfferText, $traderAddOfferSpecText): string{
		$categories = API_request("/category", "GET");
		if($categories === false){
			header("Location: /500");
		}
		$categories = $categories['content'];
		unset($categories['total'], $categories['totalNotFiltered']);
		$states = API_request("/state", "GET");
		$states = $states['content'];
		ob_start();
		include "Views/traderAddProduct.php";
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		$main = get_text("trader/add/offer");
		$spec = get_text("spec");
		$root = get_text("root");
		$head = $this->prepareHead($main['offer']['title']);
		$head .= '<script src="/assets/js/base64.js"></script>';
		$header = $this->prepareHeader_2($root['header'], "trader");
		$main = $this->prepareTraderAddProduct($main, $spec);
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