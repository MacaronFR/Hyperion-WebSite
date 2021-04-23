<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ManageAllProductController extends Controller
{
    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("ManageAllProducts");
        $header = $this->prepareHeader_2($root['header'], "ManageAllProducts");
        $main = $this->prepareManageAllProduct();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    public function post(array $args){return false; }
}