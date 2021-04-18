<?php


namespace Hyperion\WebSite;
include "autoload.php";

class VerifInscriptionController extends Controller
{

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