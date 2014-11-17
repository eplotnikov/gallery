<?php

class Model_Registration
{

	public function isset_login($table, $login, $email)
	{	
		try {
			require_once '../core/DbAdapter.php';
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable($table);
			return $db -> selectTwoValues($login, $email);
			$db -> closeConnection();
		}
		catch (Exception $e) {
			 echo $e -> getMessage();
		}
	}
}
