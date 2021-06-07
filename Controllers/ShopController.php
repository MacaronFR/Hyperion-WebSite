<?php


namespace Hyperion\WebSite;
use JetBrains\PhpStorm\ArrayShape;

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
			if(in_array('type', $args['additional'])){
				if(in_array("brand", $args['additional'])){
					$info = $this->getShopInfo('full', $args['uri_args']);
				}else{
					$info = $this->getShopInfo('catType', $args['uri_args']);
				}
			}else{
				if(in_array("brand", $args['additional'])){
					$info = $this->getShopInfo('catBrand', $args['uri_args']);
				}else{
					$info = $this->getShopInfo('cat', $args['uri_args']);
				}

			}
		}else{
			if(in_array('type', $args['additional'])){
				if(in_array("brand", $args['additional'])){
					$info = $this->getShopInfo('typeBrand', $args['uri_args']);
				}else{
					$info = $this->getShopInfo('type', $args['uri_args']);
				}
			}else{
				if(in_array("brand", $args['additional'])){
					$info = $this->getShopInfo('brand', $args['uri_args']);
				}else{
					$info = $this->getShopInfo('main');
				}
			}
		}
		$res = $this->prepareShopURL($args);
		$info['prefix'] = $res['prefix'];
		$info['active'] = $res['active'];
		$this->buildPage($info);
	}

	#[ArrayShape(['prefix' => "string[]", 'active' => "mixed[]"])]
	private function prepareShopURL(array $args): array{
		$prefix = ['category' => "", 'type' => "", 'brand' => "", 'filter' => ""];
		$active = ['category' => null, 'type' => null, 'brand' => null, 'filter' => null];
		if(in_array('cat', $args['additional'])){
			$prefix['category'] = "/cat/" . $args['uri_args'][0];
			$active['category'] = $args['uri_args'][0];
			if(in_array('type', $args['additional'])){
				$prefix['type'] = "/type/" . $args['uri_args'][1];
				$active['type'] = $args['uri_args'][1];
				if(in_array("brand", $args['additional'])){
					$prefix['brand'] = "/brand/" . $args['uri_args'][2];
					$active['brand'] = $args['uri_args'][2];
					$prefix['page'] = $args['uri_args'][3];
					$active['page'] = $args['uri_args'][3];
					if(count($args['uri_args']) === 5){
						$prefix['filter'] = "/filter/" . $args['uri_args'][4];
						$active['filter'] = $this->filterToArray($args['uri_args'][4]);
					}
				}else{
					$prefix['page'] = $args['uri_args'][2];
					$active['page'] = $args['uri_args'][2];
					if(count($args['uri_args']) === 4){
						$prefix['filter'] = "/filter/" . $args['uri_args'][3];
						$active['filter'] = $this->filterToArray($args['uri_args'][3]);
					}
				}
			}else{
				if(in_array("brand", $args['additional'])){
					$prefix['brand'] = "/brand/" . $args['uri_args'][1];
					$active['brand'] = $args['uri_args'][1];
					$prefix['page'] = $args['uri_args'][2];
					$active['page'] = $args['uri_args'][2];
					if(count($args['uri_args']) === 4){
						$prefix['filter'] = "/filter/" . $args['uri_args'][3];
						$active['filter'] = $this->filterToArray($args['uri_args'][3]);
					}
				}else{
					$prefix['page'] = $args['uri_args'][1];
					$active['page'] = $args['uri_args'][1];
				}
			}
		}else{
			if(in_array('type', $args['additional'])){
				$prefix['type'] = "/type/" . $args['uri_args'][0];
				$active['type'] = $args['uri_args'][0];
				if(in_array("brand", $args['additional'])){
					$prefix['brand'] = "/brand/" . $args['uri_args'][1];
					$active['brand'] = $args['uri_args'][1];
					$prefix['page'] = $args['uri_args'][2];
					$active['page'] = $args['uri_args'][2];
					if(count($args['uri_args']) === 4){
						$prefix['filter'] = "/filter/" . $args['uri_args'][3];
						$active['filter'] = $this->filterToArray($args['uri_args'][3]);
					}
				}else{
					$prefix['page'] = $args['uri_args'][1];
					$active['page'] = $args['uri_args'][1];
					if(count($args['uri_args']) === 3){
						$prefix['filter'] = "/filter/" . $args['uri_args'][2];
						$active['filter'] = $this->filterToArray($args['uri_args'][2]);
					}
				}
			}else{
				if(in_array("brand", $args['additional'])){
					$prefix['brand'] = "/brand/" . $args['uri_args'][0];
					$active['brand'] = $args['uri_args'][0];
					$prefix['page'] = $args['uri_args'][1];
					$active['page'] = $args['uri_args'][1];
					if(count($args['uri_args']) === 3){
						$prefix['filter'] = "/filter/" . $args['uri_args'][2];
						$active['filter'] = $this->filterToArray($args['uri_args'][2]);
					}
				}else{
					$prefix['page'] = $args['uri_args'][0] ?? 0;
					$active['page'] = $args['uri_args'][0] ?? 0;
				}
			}
		}
		return ['prefix' => $prefix, 'active' => $active];
	}

	private function filterToArray(string $filter): array{
		$filter = urldecode($filter);
		$filters = explode("/", $filter);
		$array_filter = [];
		for($i = 0; $i < count($filters); $i += 2){
			$array_filter[$filters[$i]][] = $filters[$i+1];
		}
		return $array_filter;
	}

	private function buildPage(array $info){
		$root = get_text("root");
		$head = $this->prepareHead("Shop");
		$header = $this->prepareHeader_2($root['header'], "Shop", $info['categories'], $info['active']['category']);
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
		$brand = $this->getBrand($mode, $value)['content'];
		$type = $this->getType($mode, $value)['content'];
		$spec = $this->getSpec($mode, $value)['content'];
		unset($categories['total'], $categories['totalNotFiltered']);
		unset($brand['total'], $brand['totalNotFiltered']);
		unset($type['total'], $type['totalNotFiltered']);
		unset($spec['total'], $spec['totalNotFiltered']);
		return ['categories' => $categories, "brand" => $brand, "type" => $type, "spec" => $spec];
	}

	private function getBrand(string $mode, mixed $value){
		$res = match($mode){
			'cat', 'catBrand' => API_request("/category/${value[0]}/brand", "GET"),
			'type' , 'typeBrand'=> API_request("/type/${value[0]}/brand", "GET"),
			'catType', 'full' => API_request("/type/${value[1]}/brand", "GET"),
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
			'cat', 'catType', 'catBrand', 'full' => API_request("/category/${value[0]}/type", "GET"),
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

	private function getSpec(string $mode, mixed $value){
		$res = match($mode){
			'catType' => API_request("/specification/type/${value[1]}", "GET"),
			'type' => API_request("/specification/type/${value[0]}", "GET"),
			'full' => API_request("/specification/type/${value[1]}/brand/${value[2]}", "GET"),
			'typeBrand' => API_request("/specification/type/${value[0]}/brand/${value[1]}", "GET"),
			'brand' => API_request("/specification/brand/${value[0]}", "GET"),
			'catBrand' => API_request("/specification/brand/${value[1]}", "GET"),
			default => ['status' =>['code' => 204]]
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