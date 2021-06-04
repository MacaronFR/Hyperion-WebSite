<?php


namespace Hyperion\WebSite;


class CartController extends Controller
{

    protected function prepareCart(): string{
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