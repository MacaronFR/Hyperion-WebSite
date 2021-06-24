<?php


namespace Hyperion\WebSite;
use JetBrains\PhpStorm\NoReturn;

require_once "autoload.php";

class DisconnectController extends Controller{

	/**
	 * @inheritDoc
	 */
	#[NoReturn] public function get(array $args){
		if(!isset($_SESSION['token'])){
			header("Location: /shop");
		}
		$response = API_request("/disconnect/${_SESSION['token']}", "DELETE");
		if($response !== false){
			if($response['status']['code'] === 200 || $_SESSION['status']['code'] === 404){
				session_destroy();
				header('location: /shop');
				exit();
			}
		}
		header("Location: /500");
		exit();
	}

	/**
	 * @inheritDoc
	 */
	public function post(array $args){
		return false;
	}
}