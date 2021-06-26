<?php


namespace Hyperion\WebSite;


class TraderHistoryOfferController extends Controller
{
    protected function prepareTraderHistoryProduct(): string{
	    $categories = API_request("", "GET");
	    if($categories === false){
		    header("Location: /500");
	    }
	    $categories = $categories['content'];
	    unset($categories['total'], $categories['totalNotFiltered']);
	    $states = API_request("/state", "GET");
	    $states = $states['content'];
	    ob_start();
	    include "Views/traderHistoryProduct.php";
	    return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Shop");
        $header = $this->prepareHeader_2($root['header'], "trader");
        $main = $this->prepareTraderHistoryProduct();
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