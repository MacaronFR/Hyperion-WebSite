<?php


namespace Hyperion\WebSite;


class TraderPendingOfferController extends Controller
{

    protected function prepareTraderPendingProduct(): string{
        ob_start();
        include "Views/traderPendingProduct.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Shop");
        $header = $this->prepareHeader_2($root['header'], "trader");
        $main = $this->prepareTraderPendingProduct();
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