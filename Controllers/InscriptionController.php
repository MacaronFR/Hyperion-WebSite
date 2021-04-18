<?php


namespace Hyperion\WebSite;
include "autoload.php";

class InscriptionController extends Controller
{

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $head = $this->prepareHead("Inscription");
        $header = $this->prepareHeader();
        $main = $this->prepareInscription();
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