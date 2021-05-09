<?php


namespace Hyperion\WebSite;


class ManageAllReferenceController extends Controller
{
    protected function prepareManageAllReferences(): string{
        ob_start();
        include "Views/manageAllReference.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Manage All Reference");
        $header = $this->prepareHeader_2($root['header'], "ManageAllReference");
        $main = $this->prepareManageAllReferences();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
    	return false;
    }
}