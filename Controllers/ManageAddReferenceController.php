<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ManageAddReferenceController extends Controller
{

    /**
     * @inheritDoc
     */
    protected function prepareManageAddReference(): string{
		$categories = API_request("/category", "GET");
		$types = API_request("/type", "GET");
		if($categories === false || $types === false){
			exit();
		}
		$categories = $categories['content'];
		$types = $types['content'];
		unset($categories['total'], $categories['totalNotFiltered'], $types['total'], $types['totalNotFiltered']);
        ob_start();
        include "Views/manageAddReference.php";
        return ob_get_clean();
    }

    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("ManageAddReference");
        $header = $this->prepareHeader_2($root['header'], "ManageAddReference");
        $main = $this->prepareManageAddReference();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args){
        $head = $this->prepareHead("ManageAddProduct");
        $header = $this->prepareHeader_2($root['header'], "ManageAddProduct");
        $main = $this->prepareManageAddProduct();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        var_dump($_POST);
        include "Views/root.php";
    }
}