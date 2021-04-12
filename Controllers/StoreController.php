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
		$head .= "\t<nik>\n";
		include "Views/root.php";
	}
	
	/**
	 * @inheritDoc
	 */
	public function post(array $args){ return false; }
}