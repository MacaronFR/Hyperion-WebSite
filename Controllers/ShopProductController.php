<?php


namespace Hyperion\WebSite;


class ShopProductController extends Controller
{

    protected function prepareShopOneProduct(array $prod, array $productText): string{
    	$state = get_text("state")['state'];
    	$not_spec_key = ['state' => '', 'sell_p' => '', 'buy_p' => '', 'status' => '', 'offer' => '', 'ref' => '', 'buy_d' => '', 'sell_d' => '', 'id' => '', 'brand' => '', 'model' => ''];
    	$spec = array_diff_key($prod, $not_spec_key);
    	$prod['state'] = match ((int)$prod['state']){
    		1 => $state['state_jabba'],
    		2 => $state['state_passable'],
    		3 => $state['state_ok'],
    		4 => $state['state_good'],
    		5 => $state['state_new']
		};
        ob_start();
        include "Views/shopOneProduct.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
		$prod = API_request("/shop/product/" . $args['uri_args'][0], "GET");
		$prod = $prod['content'];
    	$productText = get_text("shop/product");
        $root = get_text("root");
        $head = $this->prepareHead($productText['product']['title'] . $prod['model']);
        $header = $this->prepareHeader_2($root['header'], "un produit");
        $main = $this->prepareShopOneProduct($prod, $productText);
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