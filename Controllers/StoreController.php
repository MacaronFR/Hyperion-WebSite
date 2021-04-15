<?php


namespace Hyperion\WebSite;
include "autoload.php";

class StoreController extends Controller {
	
	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		$title = "Hyperion";
		ob_start();
		include "Views/head.php";
		$head = ob_get_contents();
		ob_end_clean();
		ob_start();
		include "Views/header.php";
		$header = ob_get_contents();
		ob_end_clean();
		$main = "";
		ob_start();
		include "Views/body.php";
		$body = ob_get_contents();
		ob_end_clean();
        ob_start();
        include "Views/footer.php";
        $footer = ob_get_contents();
        ob_end_clean();
		include "Views/root.php";
	}
	
	/**
	 * @inheritDoc
	 */
	public function post(array $args){ return false; }
}