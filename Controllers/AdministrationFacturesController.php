<?php


namespace Hyperion\WebSite;


class AdministrationFacturesController extends Controller
{

    protected function AdministrationFactures(): string{
        ob_start();
        include "Views/administrationUsers.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Administration");
        $header = $this->prepareHeader_2($root['header'], "Administration");
        $main = $this->AdministrationFactures();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }


    /**
     * @inheritDoc
     */
    public function post(array $args)
    {
        return false;
    }
}