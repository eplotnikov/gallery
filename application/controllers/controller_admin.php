<?php

class Controller_Admin extends Controller
{
	function __construct()
	{
		$this -> model = new Model_Admin();
		$this -> view = new View();
	}
	
	function action_index()
	{	
		if (isset($_SESSION['login']))
		{
			$this -> view -> generate('admin_view.php', 'template_view.php');
		} else {
			header('Location: http://gallery.dev/authorization');
			//header('Location: http://plov.dp.ua/authorization');
		}
	}
}