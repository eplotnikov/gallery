<?php

class Controller_Album extends Controller
{
	function __construct()
	{
		//$this -> model = new Model_Album();
		$this -> view = new View();
	}
	
	function action_index()
	{	
		$this -> view -> generate('album_view.php', 'template_view.php');
	}
}