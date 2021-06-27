<?php


namespace Hyperion\WebSite;


class Error500Controller extends Controller
{

    protected function prepareError500(): string{
        ob_start();
        include "Views/error_500.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("error 500");
        $header = $this->prepareHeader();
        $main = $this->prepareError500();
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