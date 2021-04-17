<?php


namespace Hyperion\WebSite;
include "autoload.php";

class ConnectionController extends Controller {

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		$head = $this->prepareHead("Connection");
		$header = $this->prepareHeader();
		$main = "NIKK";
		$main .= "<form method='post'><input type='submit'><input type='text' name='nik'></form>";
		$footer = $this->prepareFooter();
		$body = $this->prepareBody($header, $main, $footer);
		include "Views/root.php";
	}

	/**
	 * @inheritDoc
	 */
	public function post(array $args){
		$head = $this->prepareHead("Connection");
		$header = $this->prepareHeader();
		$main = "";
		$footer = $this->prepareFooter();
		$body = $this->prepareBody($header, $main, $footer);
		var_dump($_POST);
		include "Views/root.php";
	}
}