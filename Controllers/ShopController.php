<?php


namespace Hyperion\WebSite;
include "autoload.php";

class ShopController extends Controller
{

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $head = $this->prepareHead("Shop");
        $header = $this->prepareHeader_2();
        $main = $this->prepareShop();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $head = $this->prepareHead("Shop");
        $header = $this->prepareHeader_2();
        $main = $this->prepareShop();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        var_dump($_POST);
        include "Views/root.php";
    }
}