<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ManageCategories extends Controller
{
    protected function prepareManageCategories(): string{
        ob_start();
        include "Views/manageCategories.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("ManageCategories");
        $header = $this->prepareHeader_2($root['header'], "ManageCategories");
        $main = $this->prepareManageCategories();
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