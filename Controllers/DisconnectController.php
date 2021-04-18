<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class DisconnectController extends Controller
{
    private function prepareDisconnect(): string{
        ob_start();
        include "disconnect_process.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $head = $this->prepareHead("Disconnect");
        $header = "";;
        $main = $this->prepareDisconnect();
        $footer = "";
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){ return false;}
}