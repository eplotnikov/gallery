<?php

class Controller_Authorization extends Controller
{
	function __construct()
	{
		$this -> model = new Model_authorization();
		$this -> view = new View();
	}
	
	function action_index()
	{	
		$this -> view -> generate('authorization_view.php', 'template_view.php');
	}
}