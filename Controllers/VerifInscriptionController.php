<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class VerifInscriptionController extends Controller
{
	private function checkInscription($post_args):int {
		if(!isset($post_args['first_name'], $post_args['family_name'], $post_args['email'], $post_args['password_1'], $post_args['password_2'])){
			return 400;
		}
		if($post_args['password_1'] !== $post_args['password_2']){
			return 490;
		}
		if($post_args['password_1'] === strtoupper($post_args['password_1']) || $post_args['password_1'] === strtolower($post_args['password_1']) || !ctype_alnum($post_args['password_1'])){
			return 491;
		}
		$family_name = sanitize($post_args['family_name']);
		$first_name = sanitize($post_args['first_name']);
		$email = sanitize($post_args['email']);
		$hash = hash("sha256", $post_args['password_1']);
		if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
			return 480;
		}
		$credentials = read_conf("[API]");
		$token_info = API_request("/token/$credentials[1]/$credentials[2]", "GET");
		$param = [
			"name" => $family_name,
			"fname" => $first_name,
			"mail" => $email,
			"passwd" => $hash
		];
		$token = $token_info['content']['token'];
		$result = API_request("/inscription/$token", "POST", $param);
		if($result === false){
			return 500;
		}
		return $result['status']['code'];
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		header("Location: /405");
	}

	/**
     * @inheritDoc
     */
    public function post(array $args){
        switch($this->checkInscription($args['post_args'])){
			case 400: header("Location: /400");break;
			case 201: header("Location: /");break;
			case 490: header("Location: /inscription/password/notsame");break;
			case 491: header("Location: /inscription/password/policy");break;
			case 480: header("Location: /inscription/mail/notvalid");break;
			case 500: header("Location: /500");break;
			case 409: header("Location: /inscription/mail/exist");
		}
    }
}