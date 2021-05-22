<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ManageAllProductController extends Controller{
	protected function prepareManageAllProducts(): string{
		$allProductText = get_text("manage/all/product");
		ob_start();
		include "Views/manageAllProducts.php";
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		$root = get_text("root");
		$head = $this->prepareHead("ManageAllProducts");
		$header = $this->prepareHeader_2($root['header'], "manage");
		$main = $this->prepareManageAllProducts();
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