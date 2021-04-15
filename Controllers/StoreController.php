<?php


namespace Hyperion\WebSite;
include "autoload.php";

class StoreController extends Controller {
	
	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		$head = $this->prepareHead("Hyperion");
		$header = $this->prepareHeader();
		$main = "";
        $footer = $this->prepareFooter();
		$body = $this->prepareBody($header, $main, $footer);
		include "Views/root.php";
	}
	/**
	 * @inheritDoc
	 */
	public function post(array $args){ return false; }
}