<?php


namespace Hyperion\WebSite;


class PayementController extends Controller{

	private function preparePayement(int $cart_id): string{
		$invoice = API_request("/invoice/cart/${_SESSION['token']}/$cart_id", "GET");
		//$res = API_request("/invoice/payed/${_SESSION['token']}/${invoice['id']}", "PUT");
		if($invoice === false){
			header("Location: /500");
		}
		$invoice = $invoice['content'];
		ob_start();
		include "Views/payement_accepted.php";
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		if(!is_numeric($args['uri_args'][0])){
			header("Location: /400");
		}
		$root = get_text("root");
		$head = $this->prepareHead("Paiement Accepter");
		$header = $this->prepareHeader_2($root['header'], "");
		$main = $this->preparePayement($args['uri_args'][0]);
		$footer = $this->prepareFooter();
		$body = $this->prepareBody($header, $main, $footer);
		include "Views/root.php";
	}

	/**
	 * @inheritDoc
	 */
	public function post(array $args){
		// TODO: Implement post() method.
	}
}