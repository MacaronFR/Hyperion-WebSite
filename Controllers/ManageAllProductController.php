<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ManageAllProductController extends Controller
{
    protected function prepareManageAllProducts(): string{
        ob_start();
        include "Views/manageAllProducts.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("ManageAllProducts");
        $header = $this->prepareHeader_2($root['header'], "ManageAllProducts");
        $main = $this->prepareManageAllProducts();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $head = $this->prepareHead("ManageAllProducts");
        $header = $this->prepareHeader_2($root['header'], "ManageAllProducts");
        $main = $this->prepareManageAllProducts();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        var_dump($_POST);
        include "Views/root.php";
    }
}