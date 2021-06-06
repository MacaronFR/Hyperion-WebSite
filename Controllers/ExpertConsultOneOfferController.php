<?php


namespace Hyperion\WebSite;


class ExpertConsultOneOfferController extends Controller
{
    protected function prepareExpertConsultOneOffer(): string{
        ob_start();
        include "Views/expertConsultOneOffer.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("expert");
        $header = $this->prepareHeader_2($root['header'], "expert");
        $main = $this->prepareExpertConsultOneOffer();
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