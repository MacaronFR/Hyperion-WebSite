<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class ShopController extends Controller{

	private function prepareShop(array $info): string{
		ob_start();
		include "Views/shop.php";
		return ob_get_clean();
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		if($args['additional'][0] === 'cat'){
			$info = $this->getShopInfo('cat', $args['uri_args'][0]);
			$info['active'] = $args['uri_args'][0];
		}else{
			$info = $this->getShopInfo();
		}
		$this->buildPage($info);
	}

	private function buildPage(array $info){
		$root = get_text("root");
		$head = $this->prepareHead("Shop");
		$header = $this->prepareHeader_2($root['header'], "Shop", $info['categories'], $info['active']);
		$main = $this->prepareShop($info);
		$footer = $this->prepareFooter();
		$body = $this->prepareBody($header, $main, $footer);
		include "Views/root.php";
	}

	public function getShopInfo(string $mode = "", mixed $value = 0): array|false{
		$res = API_request("/category", "GET");
		if($res === false){
			return false;
		}
		$categories = $res['content'];
		unset($categories['total'], $categories['totalNotFiltered']);
		$brand = $this->getBrand($mode, $value)['content'];
		$type = $this->getType($mode, $value)['content'];
		unset($brand['total'], $brand['totalNotFiltered']);
		unset($type['total'], $type['totalNotFiltered']);
		return ['categories' => $categories, "brand" => $brand, "type" => $type];
	}

	private function getBrand(string $mode, mixed $value){
		$res = match($mode){
			'cat' => API_request("/category/$value/brand", "GET"),
			'type' => API_request("/type/$value/brand", "GET"),
			default => API_request("/brand", "GET")
		};
		if($res === false){
			header("Location: /500");
		}
		if($res['status']['code'] === 204){
			$res['content'] = [];
		}
		return $res;
	}

	private function getType(string $mode, mixed $value){
		$res = match($mode){
			'cat' => API_request("/category/$value/type", "GET"),
			default => API_request("/type", "GET")
		};
		if($res === false){
			header("Location: /500");
		}
		if($res['status']['code'] === 204){
			$res['content'] = [];
		}
		return $res;
	}

	/**
	 * @inheritDoc
	 */
	public function post(array $args){
		return false;
	}
}