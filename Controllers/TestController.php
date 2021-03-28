<?php

namespace Controller;
require_once "Controller.php";

class TestController extends Controller
{

	public function get($args)
	{
		var_dump($args);
	}

	public function post($args)
	{
		var_dump($args);
	}
}