<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class VerifInscriptionController extends Controller
{

	private function prepareVerifInscription(): string{
		ob_start();
		include "Views/verif_inscription.php";
		return ob_get_clean();
	}
    /**
     * @inheritDoc
     */
    public function get(array $args){
        $head = $this->prepareHead("VerifInscription");
        $header = "";
        $main = $this->prepareVerifInscription();
        $footer = "";
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $head = $this->prepareHead("VerifInscription");
        $header = "";
        $main = $this->prepareVerifInscription();
        $footer = "";
        $body = $this->prepareBody($header, $main, $footer);
        var_dump($_POST);
        include "Views/root.php";
    }
}