<?php


namespace Hyperion\WebSite;


class TraderHistoryOfferController extends Controller
{
    protected function prepareTraderHistoryProduct($traderAddOfferText, $traderAddOfferSpecText): string{
        ob_start();
        include "Views/traderAddProduct.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $main = get_text("trader/history/offer");
        $spec = get_text("spec");
        $root = get_text("root");
        $head = $this->prepareHead($main['offer']['title']);
        $head .= '<script src="/assets/js/base64.js"></script>';
        $header = $this->prepareHeader_2($root['header'], "trader");
        $main = $this->prepareTraderHistoryProduct($main, $spec);
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