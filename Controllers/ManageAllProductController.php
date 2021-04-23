<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ManageAllProductController extends Controller
{

    /**
     * @inheritDoc
     */
    protected function prepareManageAllProduct(): string{
        $response = API_request("/manageAllProducts", "GET");
        $categories = [];
        if($response !== false && $response["status"]["code"]){
            $categories = $response["content"];
        }
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
        $main = $this->prepareManageAllProduct();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }
}