<?php


namespace Hyperion\WebSite;


class TraderInstructionController extends Controller
{

    protected function prepareTraderInstruction(): string{
        ob_start();
        include "Views/traderInstruction.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Shop");
        $header = $this->prepareHeader_2($root['header'], "trader");
        $main = $this->prepareTraderInstruction();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args)
    {
        // TODO: Implement post() method.
    }
}