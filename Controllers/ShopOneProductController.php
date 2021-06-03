<?php


namespace Hyperion\WebSite;


class ShopOneProductController extends Controller
{

    protected function prepareShopOneProduct(): string{
        ob_start();
        include "Views/shopOneProduct.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("produit");
        $header = $this->prepareHeader_2($root['header'], "un produit");
        $main = $this->prepareShopOneProduct();
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