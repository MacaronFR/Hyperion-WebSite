<?php


namespace Hyperion\WebSite;


class ExpertPendingOfferController extends Controller
{
    protected function prepareExpertPendingOffer(array $expertPendingOfferText): string{
		$spec = get_text("spec");
		$expertPendingOfferText['specification'] = $spec['specification'];
    	$categories = API_request("/category", "GET");
    	if(isset($categories['status']['code']) && $categories['status']['code'] === 200){
    		$categories = $categories['content'];
    		unset($categories['total'], $categories['totalNotFiltered']);
		}else{
    		$categories = [];
		}
		$states = API_request("/state", "GET");
    	if(isset($states['status']['code']) && $states['status']['code'] === 200){
			$states = $states['content'];
    	}else{
    		$states = [];
		}
        ob_start();
        include "Views/expertPendingOffer.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
		$expertPendingOfferText = get_text("/expert/offer/pending");
        $root = get_text("root");
        $head = $this->prepareHead($expertPendingOfferText['expert']['title']);
        $header = $this->prepareHeader_2($root['header'], "expert:pending");
        $main = $this->prepareExpertPendingOffer($expertPendingOfferText);
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