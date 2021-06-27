<?php


namespace Hyperion\WebSite;


class TraderHistoryOfferController extends Controller
{
	protected function prepareTraderHistoryProduct(array $traderHistoryText): string{
		ob_start();
		include "Views/traderHistoryProduct.php";
		return ob_get_clean();
	}

    /**
     * @inheritDoc
     */
    public function get(array $args){
	    $traderHistoryText = get_text("trader/history/offer");
        $root = get_text("root");
        $head = $this->prepareHead("Shop");
        $header = $this->prepareHeader_2($traderHistoryText['offer']['title']);
        $main = $this->prepareTraderHistoryProduct($traderHistoryText);
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