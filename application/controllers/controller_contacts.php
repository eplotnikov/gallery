<?php

class Controller_Contacts extends Controller
{
	function __construct()
	{
		$this -> model = new Model_Contacts();
		$this -> view = new View();
	}
	
	function action_index()
	{	
		$data[] = $this -> model -> get_data_db("name", "id", 1);
		$data[] = $this -> model -> get_data_db("surname", "id", 1);
		$data[] = $this -> model -> get_data_db("address", "id", 1);
		$data[] = $this -> model -> get_data_db("phone", "id", 1);
		$data[] = $this -> model -> get_data_db("skype", "id", 1);
		$data[] = $this -> model -> get_data_db("email", "id", 1);
		$data[] = $this -> model -> get_data_db("info", "id", 1);
		$this -> view -> generate('contacts_view.php', 'template_view.php', $data);
	}
}
