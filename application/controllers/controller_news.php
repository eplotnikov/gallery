﻿<?php

class Controller_News extends Controller
{
	function __construct()
	{
		$this -> model = new Model_News();
		$this -> view = new View();
	}
	
	function action_index()
	{	
		//$data[] = $this -> model -> get_data_newsName();
		//$data[] = $this -> model -> get_data_newsDate();
		//$data[] = $this -> model -> get_data_newsText();
		$data = $this -> model -> get_data_allDate();
		$this -> view -> generate('news_view.php', 'template_view.php', $data);
	}
}