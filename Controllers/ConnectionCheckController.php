<?php


namespace Hyperion\WebSite;
require_once "autoload.php";


class ConnectionCheckController extends Controller
{

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $head = $this->prepareHead("ConnectionCheck");
        $header = "";;
        $main = $this->prepareConnectionCheck();
        $footer = "";
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $head = $this->prepareHead("ConnectionCheck");
        $header = "";;
        $main = $this->prepareConnectionCheck();
        $footer = "";
        $body = $this->prepareBody($header, $main, $footer);
        var_dump($_POST);
        include "Views/root.php";
    }
}