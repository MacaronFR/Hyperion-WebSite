<?php


namespace Hyperion\WebSite;


use Stripe\Exception\SignatureVerificationException;
use Stripe\Stripe;
use Stripe\Webhook;
use UnexpectedValueException;

class StripController extends Controller{
	protected function Strip(): string{
		ob_start();
		include "Views/strip.php";
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		$root = get_text("root");
		$head = $this->prepareHead("strip");
		$header = $this->prepareHeader();
		$main = $this->Strip();
		$footer = $this->prepareFooter();
		$body = $this->prepareBody($header, $main, $footer);
		include "Views/root.php";
	}

	/**
	 * @inheritDoc
	 */
	public function post(array $args){
		Stripe::setApiKey("sk_test_51IyypYGc9T6D4Xa9C5Y2Ypke3QmSsyKX2N1nCjgLIAXqpZVFQZ4AR9FHBHjGHxmy4eI5OQzt8K2NTql8wIgC4Q0c00vnBLSKZx");
		$payload = file_get_contents('php://input');
		$array = json_decode($payload, true);

		if($array['type'] === "checkout.session.completed"){
			$url = explode("/", $array['data']['object']['success_url']);
			$cart_id = end($url);
			file_put_contents("php://stderr", API_request("/invoice/confirm/$cart_id", "PUT"));
		}
    }
}