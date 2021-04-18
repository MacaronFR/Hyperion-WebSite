<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class VerifConnectionController extends Controller{

	/**
	 * perform request to the API for connect user and retrieve token
	 * @param array $post_args argument of $_POST
	 * @return int return error code
	 */
	private function checkConnection(array $post_args): int{
		if(isset($post_args['form_connexion']) && !empty($post_args['id'] and !empty($post_args['password']))){
			$credentials = read_conf("[API]");
			$mail = $post_args['id'];
			$password = hash("sha256", $post_args['password']);
			$client_info = API_request("/connect/$credentials[1]/$credentials[2]/$mail/$password", "GET");
			if($client_info !== false && $client_info['status']['code'] === 302){
				$token_info = API_request($client_info['status']['message'], "GET");
				if($token_info !== false && $token_info['status']['code'] === 200){
					$_SESSION['id'] = $client_info['content']['id'];
					$_SESSION['mail'] = $client_info['content']['mail'];
					$_SESSION['level'] = $client_info['content']['type'];
					$_SESSION['name'] = $client_info['content']['name'];
					$_SESSION['token'] = $token_info['content']['token'];
					return 0;
				}else{
					return 1;
				}
			}else{
				return 2;
			}
		}else{
			return 3;
		}
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		return false;
	}

	/**
	 * @inheritDoc
	 */
	public function post(array $args){
		if($this->checkConnection($args['post_args']) === 0){
			header("Location: /");
		}
	}
}