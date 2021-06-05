<?php


namespace Hyperion\WebSite;


class OrderHistoryController extends Controller
{

    protected function OrdersHistory(): string{
        ob_start();
        include "Views/orderHistory.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Mes commandes");
        $header = $this->prepareHeader_2($root['header'], "Mes commandes");
        $main = $this->OrdersHistory();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args)
    {
        // TODO: Implement post() method.
    }
}