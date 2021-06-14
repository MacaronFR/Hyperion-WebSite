<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ManageCategoriesController extends Controller
{
    protected function prepareManageCategories(): string{
		$response_cat = API_request("/category", "GET");
		$categories = [];
		if($response_cat !== false && $response_cat["status"]["code"] === 200){
			$categories = $response_cat["content"];
		}
		unset($categories['total'], $categories['totalNotFiltered']);
		$response_type = API_request("/type_cat", "GET");
		$types = [];
		if($response_type !== false && $response_type["status"]["code"] === 200){
			$types = $response_type["content"];
		}
        ob_start();
        include "Views/manageCategories.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Manage Categories");
        $header = $this->prepareHeader_2($root['header'], "manage:allprod");
        $main = $this->prepareManageCategories();
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