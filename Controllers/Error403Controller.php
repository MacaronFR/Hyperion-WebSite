<?php


namespace Hyperion\WebSite;


class Error403Controller extends Controller
{

    protected function prepareError403(): string{
        ob_start();
        include "Views/error_403.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("error 403");
        $header = $this->prepareHeader();
        $main = $this->prepareError403();
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