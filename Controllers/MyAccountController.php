<?php


namespace Hyperion\WebSite;


class MyAccountController extends Controller
{
    protected function prepareMyAccount(): string{
    	$me = API_request("/me/".$_SESSION['token'], "GET");
    	if($me['status']['code'] === 200){
			$me = $me['content'];
		}else{
    		header("Location: /connect");
    		exit();
		}
        ob_start();
        include "Views/MyAccount.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
    	if(!isset($_SESSION['level'])){
    		header("Location: /connect");
		}
        $root = get_text("root");
        $head = $this->prepareHead("account");
        $header = $this->prepareHeader();
        $main = $this->prepareMyAccount();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

    /**
     * @inheritDoc
     */
    public function post(array $args)
    {
        return false;
    }
}