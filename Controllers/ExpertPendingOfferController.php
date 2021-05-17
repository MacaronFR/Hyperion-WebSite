<?php


namespace Hyperion\WebSite;


class ExpertPendingOfferController extends Controller
{
    protected function prepareExpertPendingOffer(): string{
        ob_start();
        include "Views/expertHistoryOffer.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("expert");
        $header = $this->prepareHeader_2($root['header'], "expert");
        $main = $this->prepareExpertPendingOffer();
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