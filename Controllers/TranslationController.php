<?php


namespace Hyperion\WebSite;


class TranslationController extends Controller{

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		if(!is_dir($_SERVER['DOCUMENT_ROOT'] . "/Language/" . $args['uri_args'][0])){
			http_response_code(404);
			exit();
		}
		if(!is_file($_SERVER['DOCUMENT_ROOT'] . "/Language/" . $args['uri_args'][0] . "/" . $args['uri_args'][1] . ".yml")){
			http_response_code(404);
			exit();
		}
		$yaml = file_get_contents($_SERVER['DOCUMENT_ROOT'] . "/Language/" . $args['uri_args'][0] . "/" . $args['uri_args'][1] . ".yml");
		echo json_encode(yaml_parse($yaml));
	}

	/**
	 * @inheritDoc
	 */
	public function post(array $args){
		return false;
	}
}