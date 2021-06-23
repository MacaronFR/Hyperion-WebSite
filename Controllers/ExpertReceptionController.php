<?php


namespace Hyperion\WebSite;


class ExpertReceptionController extends Controller
{

    protected function ExpertReception(): string{
        ob_start();
        include "Views/expertReception.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Expert Reception");
        $header = $this->prepareHeader_2($root['header'], "Expert:Reception");
        $main = $this->ExpertReception();
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