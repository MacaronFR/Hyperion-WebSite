<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class VerifConnectionController extends Controller
{

	protected function prepareVerifConnection(): string{
		ob_start();
		include "Views/verif_connection.php";
		return ob_get_clean();
	}
    /**
     * @inheritDoc
     */
    public function get(array $args){
        $head = $this->prepareHead("VerifConnection");
        $header = "";;
        $main = $this->prepareVerifConnection();
        $footer = "";
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $head = $this->prepareHead("VerifConnection");
        $header = "";;
        $main = $this->prepareVerifConnection();
        $footer = "";
        $body = $this->prepareBody($header, $main, $footer);
        var_dump($_POST);
        include "Views/root.php";
    }
}