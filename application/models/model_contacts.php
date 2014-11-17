<?php

class Model_Contacts extends Model
{
	
	public function get_data()
	{	
	}
	
	public function get_data_db($field, $index_field, $index_value)
	{	
		try {
			$db = DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable("contacts");
			$db -> setField($field);
			$db -> setIndexField($index_field);
			$db -> setIndexValue($index_value);
			return $db -> selectValue();
			$db -> closeConnection();
		}
		catch (Exception $e) {
			 echo $e -> getMessage();
		}
	}

}
