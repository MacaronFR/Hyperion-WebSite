<?php


namespace Hyperion\WebSite;


class InvoicesController extends Controller
{

    /**
     * @inheritDoc
     */
    public function get(array $args){
		ob_start();
		include "Views/invoices.php";
		return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function post(array $args)
    {
        return false;
    }
}