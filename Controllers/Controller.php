<?php


namespace Hyperion\WebSite;

/**
 * Class Controller
 * @package Controller
 * @author Macaron
 */
abstract class Controller {
	/**
	 * Return the default head with $title as <title>
	 * @param string $title Title of the page
	 * @return string Return the default head
	 */
	protected function prepareHead(string $title): string{
		ob_start();
		include "Views/head.php";
		return ob_get_clean();
	}

	/**
	 * Return the default header
	 * @return string Default header
	 */
	protected function prepareHeader(): string{
		ob_start();
		include "Views/header.php";
		return ob_get_clean();
	}

	/**
	 * Return the default footer
	 * @return string Default footer
	 */
	protected function prepareFooter(): string{
		ob_start();
		include "Views/footer.php";
		return ob_get_clean();
	}

	/**
	 * Return the default body of the page
	 * @param string $header Header of the page
	 * @param string $main Main content of the page
	 * @param string $footer Footer of the page
	 * @return string Body of the page
	 */
	protected function prepareBody(string $header, string $main, string $footer): string{
		ob_start();
		include "Views/body.php";
		return ob_get_clean();
	}

    protected function prepareConnection(): string{
        ob_start();
        include "Views/connection.php";
        return ob_get_clean();
    }

    protected function prepareInscription(): string{
        ob_start();
        include "Views/inscription.php";
        return ob_get_clean();
    }

    protected function prepareShop(): string{
        ob_start();
        include "Views/shop.php";
        return ob_get_clean();
    }

	/**
	 * Must be instanced for using the get() method and control GET request
	 * @param array $args Argument passed to the controller by the router
	 * @return mixed
	 */
	abstract public function get(array $args);
	
	/**
	 * Must be instanced for using the post() method and control POST request
	 * @param array $args Argument passed to the controller by the router
	 * @return mixed
	 */
	abstract public function post(array $args);
}