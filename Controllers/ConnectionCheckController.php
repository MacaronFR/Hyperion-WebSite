<?php


namespace Hyperion\WebSite;
require_once "autoload.php";


class ConnectionCheckController extends Controller
{

	private function prepareConnectionCheck(): string{
		ob_start();
		include "connectionCheck.php";
		return ob_get_clean();
	}
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