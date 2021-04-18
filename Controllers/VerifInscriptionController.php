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
							
						}
					}
				}
			}
		}
		return 0;
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
        if($this->checkInscription($args['post_args']) === 0){
        	//header("Location: /");
		}
    }
}