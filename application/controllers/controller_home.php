<?php

class Controller_Home extends Controller
{
	function __construct()
	{
		$this -> view = new View();
	}
	
	function action_index()
	{	
		$this -> view -> generate('home_view.php', 'template_view.php');
	}
}