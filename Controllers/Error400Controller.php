<?php


namespace Hyperion\WebSite;


class Error400Controller extends Controller
{

    protected function prepareError400(): string{
        ob_start();
        include "Views/error_400.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("error 400");
        $header = $this->prepareHeader();
        $main = $this->prepareError400();
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