<?php


namespace Hyperion\WebSite;
require_once "autoload.php";

class VerifInscriptionController extends Controller
{
	private function checkInscription($post_args):int {
		$number = ['0', '1', '2', '3', '4', '5', '6', '7', '8', '9'];
		if(isset($post_args, $post_args['family_name'], $post_args['first_name'], $post_args['email'], $post_args['password_1'], $post_args['password_2'])){
			$family_name = sanitize($post_args['family_name']);
			$first_name = sanitize($post_args['first_name']);
			$email = sanitize($post_args['email']);
			$hash = hash("sha256", $post_args['password_1']);
			if($post_args['password_1'] === $post_args['password_2']){
				if(strtoupper($post_args['password_1']) !== $post_args['password_1'] && strtolower($post_args['password_1']) !== $post_args['password_1']){
					if(array_intersect($number, str_split($post_args['password_1'])) !== []){
						//password OK
						if(filter_var($email, FILTER_VALIDATE_EMAIL)){
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
							if($result['status']['code'] === 201){
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
				}else{
					return 4;
				}
			}else{
				return 5;
			}
		}else{
			return 6;
		}
	}

	/**
	 * @inheritDoc
	 */
	public function get(array $args){
		// TODO: Implement get() method.
	}

	/**
     * @inheritDoc
     */
    public function post(array $args){
        switch($this->checkInscription($args['post_args'])){
			case 0: header("Location: /");break;
			case 1: header("Location: /1");break;
			case 2: header("Location: /2");break;
			case 3: header("Location: /3");break;
			case 4: header("Location: /4");break;
			case 5: header("Location: /5");break;
			case 6: header("Location: /6");break;
		}
    }
}