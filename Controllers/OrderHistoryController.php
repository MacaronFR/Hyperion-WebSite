<?php


namespace Hyperion\WebSite;


use http\Env\Response;

class OrderHistoryController extends Controller
{

    protected function OrdersHistory(): string{
        ob_start();
        include "Views/orderHistory.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
		if(!isset($args['additional'])){
			$this->getHistory($args);
		}elseif($args['additional'][0] === "one"){
			$this->getOne($args);
		}
		exit();
	}

	public function getHistory(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Mes commandes");
        $header = $this->prepareHeader_2($root['header'], "Mes commandes");
        $main = $this->OrdersHistory();
        $footer = $this->prepareFooter();
        $body = $this->prepareBody($header, $main, $footer);
        include "Views/root.php";
    }

	public function getOne(array $args){
		if(!is_numeric($args['uri_args'][0])){
			header("Location: /400");
		}
		$invoice = API_request("/credit/" . $_SESSION['token'] . "/" . $args['uri_args'][0], "GET");
		if($invoice === false){
			header("Location: /500");
		}
		if($invoice['status']['code'] !== 200){
			header("Location: /404");
		}
		header("Content-Type: application/pdf");
		echo base64_decode($invoice['content']['file']['content']);
	}

    /**
     * @inheritDoc
     */
    public function post(array $args)
    {
        return false;
    }
}