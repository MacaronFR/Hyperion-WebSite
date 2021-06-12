<?php


namespace Hyperion\WebSite;


class GameController extends Controller
{

    protected function prepareGame(): string{
        ob_start();
        include "Views/game.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Panier");
        $header = $this->prepareHeader();
        $main = $this->prepareGame();
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