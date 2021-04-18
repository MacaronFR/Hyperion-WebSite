<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ConnectionController extends Controller {

	private function prepareConnection(): string{
		ob_start();
		include "Views/connection.php";
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		$head = $this->prepareHead("Connection");
		$header = $this->prepareHeader();
		$main = $this->prepareConnection();
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
        $main = $this->prepareConnection();
		$footer = $this->prepareFooter();
		$body = $this->prepareBody($header, $main, $footer);
		//var_dump($_POST);
		include "Views/root.php";
	}
}