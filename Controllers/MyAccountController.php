<?php


namespace Hyperion\WebSite;


class MyAccountController extends Controller
{
    protected function prepareMyAccount(): string{
        ob_start();
        include "Views/MyAccount.php";
        return ob_get_clean();
    }

    /**
     * @inheritDoc
     */
    public function get(array $args){
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