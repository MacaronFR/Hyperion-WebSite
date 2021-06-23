<?php


namespace Hyperion\WebSite;


class AdministrationUsersController extends Controller{

	protected function AdministrationUsers(): string{
		ob_start();
		include "Views/administrationUsers.php";
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		if(!isset($_SESSION['token'])){
			header("Location: /connect");
		}
		if($_SESSION['level'] >= 3){
			header("Location: /401");
		}
		$root = get_text("root");
		$head = $this->prepareHead("Administration");
		$header = $this->prepareHeader_2($root['header'], "Administration");
		$main = $this->AdministrationUsers();
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