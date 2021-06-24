<?php


namespace Hyperion\WebSite;


class InvoicesVendorsController extends Controller
{

    /**
     * @inheritDoc
     */
    public function get(array $args){
        ob_start();
        include "Views/invoicesVendors.php";
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