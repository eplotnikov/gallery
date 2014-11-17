<?php

class Model_Page extends Model
{

	public function get_data_db($val, $val1, $val2, $val3, $val4, $val5, $val6)
	{	
		try {
			$db = DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable("users");
			return $db -> selectSixValues($val, $val1, $val2, $val3, $val4, $val5, $val6);
			$db -> closeConnection();
		}
		catch (Exception $e) {
			 echo $e -> getMessage();
		}
	}
	
	public function showPhotos()
	{
		try {
			$db = DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable("photos");
			return $db -> selectTwoValuesSpecial("name_user", "picture");
			$db -> closeConnection();
		}
		catch (Exception $e) {
			 echo $e -> getMessage();
		}
	}
	
	public function galleriesList($table, $field)
	{
		try 		{
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable($table);
			$db -> setField($field);
			return $db -> selectValues();
			$db -> closeConnection();
		}
		catch (Exception $e) {
			 echo $e -> getMessage();
		}
	
	}


}
