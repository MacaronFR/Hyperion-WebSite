<?php


namespace Hyperion\WebSite;


class TraderAddOffer extends Controller
{
    protected function prepareTraderAddProduct(): string{
        ob_start();
        include "Views/traderAddProduct.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("TraderAddOffer");
        $header = $this->prepareHeader_2($root['header'], "TraderAddOffer");
        $main = $this->prepareTraderAddProduct();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args)
    { return false; }
}