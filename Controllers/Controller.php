<?php


namespace Controller;

/**
 * Class Controller
 * @package Controller
 * @author Macaron
 */
abstract class Controller
{
	/**
	 * Must be instanced for using the get() method and control POST request
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