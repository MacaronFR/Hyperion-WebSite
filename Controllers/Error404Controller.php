<?php


namespace Hyperion\WebSite;


class Error404Controller extends Controller
{

    protected function prepareError404(): string{
        ob_start();
        include "Views/error_404.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("error 404");
        $header = $this->prepareHeader();
        $main = $this->prepareError404();
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