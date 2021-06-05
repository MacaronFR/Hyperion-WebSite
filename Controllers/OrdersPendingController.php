<?php


namespace Hyperion\WebSite;


class OrdersPendingController extends Controller
{

    protected function OrdersPending(): string{
        ob_start();
        include "Views/orderPending.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Mes commandes");
        $header = $this->prepareHeader_2($root['header'], "Mes commandes");
        $main = $this->OrdersPending();
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