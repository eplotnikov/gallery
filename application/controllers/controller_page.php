<?php

class Controller_Page extends Controller
{
	function __construct()
	{
        $this -> model = new Model_Page();
		$this -> view = new View();
	}
	
	function action_index()
	{
		if (isset($_SESSION['login']))
		{
			$login = $_SESSION['login'];	//доделать чтоб вместо id искало по login
			$data = $this -> model -> get_data_db($login, "login", "name", "surname", "email", "sex", "role");
			$this -> view -> generate('page_view.php', 'template_view.php', $data);
		} else {
			header('Location: http://gallery.dev/authorization');
            //header('Location: http://plov.dp.ua/authorization');
		}
	}
}