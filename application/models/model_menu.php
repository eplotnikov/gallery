<?php

class Model_Menu extends Model
{

    /**
     * @return array
     */
    public function get_data_menu()
	{	
		try {
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable("pages");
			$db -> setField("name");
			return $db -> selectValues();
			$db -> closeConnection();
		}
        catch (Exception $e) {
			 echo $e -> getMessage();
		}
	}

    public function checkAdmin()
    {
        try {
            $db = DbAdapter::getInstance();
            if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
                throw new Exception("Not Connect!");
            }
            $db -> setTable("users");
            return $db -> selectTwoValuesSpecial("login", "role");
            $db -> closeConnection();
        }
        catch (Exception $e) {
            echo $e -> getMessage();
        }
    }
	
}
