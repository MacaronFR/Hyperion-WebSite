<?php


namespace Hyperion\WebSite;


class StripController extends Controller
{
    protected function Strip(): string{
        ob_start();
        include "Views/strip.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("strip");
        $header = $this->prepareHeader();
        $main = $this->Strip();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("strip");
        $header = $this->prepareHeader();
        $main = $this->Strip();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }
}