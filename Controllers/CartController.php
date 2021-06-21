<?php


namespace Hyperion\WebSite;
require_once "Stripe/init.php";

use Stripe\Checkout\Session;
use Stripe\Price;
use Stripe\Stripe;

class CartController extends Controller
{

    protected function prepareCart(): string{
    	$cart = API_request("/cart/product/${_SESSION['token']}", "GET");
    	if($cart === false){
    		header("Location: /500");
		}
    	$cart = $cart['content'] ?? [];
    	$user = API_request("/me/${_SESSION['token']}", "GET");
		if($user=== false){
			header("Location: /500");
		}
		$user = $user['content'] ?? [];
		$cart_id = API_request("/cart/active/${_SESSION['token']}", "GET");
		if($cart_id === false){
			header("Location: /500");
		}
		$cart_id = $cart_id['content'];
		if($user['addr'] === false){
			$address = "Set Address First";
			$adid = false;
		}else{
			$address = $user['addr']['address'] . " " . $user['addr']['zip'] . " " . $user['addr']['city'] . " " . $user['addr']['region'] . " " . $user['addr']['country'];
			$adid = $user['addr']['id'];
		}
		$total = 0;
		foreach($cart as $p){
			$total += (double)($p['sell_p'] ?? 0);
		}
    	$state = get_text("state")['state'];
		$conf = read_conf("[Stripe]");
		Stripe::setApiKey($conf[0]);
		if($total > 0){
			$session = Session::create([
				'payment_method_types' => ['card'],
				'line_items' => [[
					'price_data' => [
						'product_data' => [
							"name" => "Cart"
						],
						'unit_amount' => $total * 100,
						'currency' => 'eur',
					],
					'quantity' => 1,
				]],
				'mode' => 'payment',
				'success_url' => "${_SERVER['REQUEST_SCHEME']}://${_SERVER['SERVER_NAME']}/payement/accepted/${cart_id['id']}",
				'cancel_url' => 'https://example.com/cancel',
			]);
		}
        ob_start();
        include "Views/cart.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Panier");
        $head .= "\n<script src=\"https://js.stripe.com/v3/\"></script>";
        $header = $this->prepareHeader_2($root['header'], "Panier");
        $main = $this->prepareCart();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args)
    {
        return false;
    }
}