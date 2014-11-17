<?php

class Model_Authorization
{
	
	
	public function isset_User($users, $login)
	{	
		try {
			require_once '../core/DbAdapter.php';
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable($users);
			$db -> setField($login);
			return $db -> selectValues();
			$db -> closeConnection();
		}
		catch (Exception $e) {
			 echo $e -> getMessage();
		}
	}
}
