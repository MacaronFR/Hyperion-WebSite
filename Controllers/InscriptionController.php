<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class InscriptionController extends Controller
{

	protected function prepareInscription($error): string{
		ob_start();
		include "Views/inscription.php";
		return ob_get_clean();
	}
    /**
     * @inheritDoc
     */
    public function get(array $args){
        $head = $this->prepareHead("Inscription");
        $header = $this->prepareHeader();
        $main = $this->prepareInscription(($args['uri_args'][0] ?? "") . "/" . ($args['uri_args'][1] ?? ""));
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $head = $this->prepareHead("Inscription");
        $header = $this->prepareHeader();
        $main = $this->prepareInscription();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        var_dump($_POST);
        include "Views/root.php";
    }
}