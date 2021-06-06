<?php

namespace Hyperion\WebSite;
include "autoload.php";

/**
 * Class Router used to route all request on project hyperion website
 * @package Router
 * @author Macaron
 */
class Router {
	/** @var string $uri URI of the request */
	private string $uri;
	/** @var string $method HTTP method of the request; */
	private string $method;
	/** @var bool $have_file Flag if POST request include file */
	private bool $have_file;
	/** @var bool $routed Flag if request has been routed */
	private bool $routed;
	/** @var Controller|null $default_controller Used if no route match */
	private Controller|null $default_controller;
	/** @var string */
	public const GET = "GET";
	/** @var string */
	public const POST = "POST";
	
	/**
	 * Router constructor.
	 * @param Controller|null $default_controller Controller used if no route match and default() method is called
	 */
	public function __construct(Controller|null $default_controller = null){
		$this->uri = $_SERVER["REQUEST_URI"];
		$this->method = $_SERVER["REQUEST_METHOD"];
		$this->routed = false;
		$headers = getallheaders();
		$this->have_file = isset($headers['Content-type']) && $headers['Content-type'] === 'multipart/form-data';
		$this->default_controller = $default_controller;
		unset($headers);
	}
	
	/**
	 * Take a pattern and return the correspondent regex;
	 * @param string $pattern pattern to convert
	 * @return string
	 */
	private static function patternToRegex(string $pattern): string{
		$regex = "/^" . str_replace("\*", "([^\/]*)", preg_quote($pattern, "/")) . "$/";
		$regex = str_replace("\{", "(?:", $regex);
		$regex = str_replace("\}", ")?", $regex);
		if($regex[strlen($regex) - 3] === '_' && $regex[strlen($regex) - 4] !== '\\'){
			$regex = substr_replace($regex, "(.+)", strlen($regex) - 3, 1);
		}
		return $regex;
	}
	
	/**
	 * take router pattern and test it returning the matches if it match and false in the other case
	 * @param string $pattern
	 * @return array|bool
	 */
	private function match(string $pattern): array|bool{
		$regex = Router::patternToRegex($pattern);
		if(preg_match($regex, $this->uri, $matches) === 1){
			array_shift($matches);
			return $matches;
		}
		return false;
	}
	
	/**
	 * Prepare an args array with the uri args and if it exist, POST and FILES value
	 * @param array $uri_arg argument of uri
	 * @param mixed $additional_param additional param
	 * @return array[]
	 */
	private function prepareArgs(array $uri_arg, mixed $additional_param = null): array{
		$args = [
			'uri_args' => $uri_arg
		];
		if($this->method === Router::POST){
			$args['post_args'] = $_POST;
			if($this->have_file){
				$args['file_args'] = $_FILES;
			}
		}
		if($additional_param !== null){
			$args['additional'] = $additional_param;
		}
		return $args;
	}
	
	/**
	 * Route GET request with matching pattern (use * as wildcard character)
	 * @param string $pattern Pattern to match with
	 * @param string|null $controller_name Controller to use if pattern match
	 * @param mixed|null $additional_param
	 */
	public function get(string $pattern = "/", string|null $controller_name = null, mixed $additional_param = null){
		if($this->method == Router::GET){
			if(($matches = $this->match($pattern)) !== false){
				$controller = new $controller_name();
				$this->routed = true;
				$args = $this->prepareArgs($matches, $additional_param);
				if($controller !== null)
					$controller->get($args);
				else
					$this->default_controller->get($args);
			}
		}
	}
	
	/**
	 * Route POST request with matching pattern (use * as wildcard character)
	 * @param string $pattern Pattern to match with
	 * @param string|null $controller_name Controller used if pattern match
	 * @param mixed|null $additional_param
	 */
	public function post(string $pattern = "/", string|null $controller_name = null, mixed $additional_param = null){
		if($this->method == Router::POST){
			if(($matches = $this->match($pattern)) !== false){
				$controller = new $controller_name();
				$this->routed = true;
				$args = $this->prepareArgs($matches, $additional_param);
				if($controller !== null)
					$controller->post($args);
				else
					$this->default_controller->post($args);
			}
		}
	}
	
	/**
	 * Set all non matching route of method $method to the default controller
	 * @param string $method method where default controller is used
	 */
	public function default(string $method = ""){
		if(!($this->routed) && $this->default_controller !== null){
			if(($method !== "" && $method === $this->method) || $method === ""){
				if($method === Router::GET){
					$this->default_controller->get($this->prepareArgs([]));
				}elseif($method === Router::POST){
					$this->default_controller->post($this->prepareArgs([]));
				}
			}
		}
	}

	public function isRouted(){
		return $this->routed;
	}
}