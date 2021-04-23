<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ManageAddProductController extends Controller
{

    /**
     * @inheritDoc
     */
    protected function prepareManageAddProduct(): string{
        ob_start();
        include "Views/manageAddProduct.php";
        return ob_get_clean();
    }

    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("ManageAddProduct");
        $header = $this->prepareHeader_2($root['header'], "ManageAddProduct");
        $main = $this->prepareManageAddProduct();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $head = $this->prepareHead("ManageAddProduct");
        $header = $this->prepareHeader_2($root['header'], "ManageAddProduct");
        $main = $this->prepareManageAddProduct();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        var_dump($_POST);
        include "Views/root.php";
    }
}