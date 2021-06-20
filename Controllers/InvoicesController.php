<?php


namespace Hyperion\WebSite;


class InvoicesController extends Controller
{

    protected function showInvoices(): string{
        ob_start();
        include "Views/invoices.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
        $root = get_text("root");
        $head = $this->prepareHead("Mes commandes");
        $header = $this->prepareHeader();
        $main = $this->showInvoices();
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