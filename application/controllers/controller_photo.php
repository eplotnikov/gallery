<?php

class Controller_Photo extends Controller
{
	function __construct()
	{
		//$this -> model = new Model_Gallery();
		$this -> view = new View();
	}
	
	function action_index()
	{	
		//$data = $this -> model -> get_data_gallery();
		$this -> view -> generate('photo_view.php', 'template_view.php');
	}

}