<?php

class Model_Gallery extends Model
{
	
	public function get_dat($dir)
	{	
		
		function excess($files) 
		{
			$result = array();
			for ($i = 0; $i < count($files); $i++) {
			  if ($files[$i] != "." && $files[$i] != "..") $result[] = $files[$i];
			}
			return $result;
		}
		$files = scandir($this -> dir); // Получаем список файлов из этой директории
		$files = excess($files); // Удаляем лишние файлы
		  
		// Вывод изображений на страницу
		for ($i = 0; $i < count($files); $i++) {
			echo "<div class='container'>
					<a href='#'>
						<img src=".$this -> dir."/".$files[$i]."></img>
						<h3>Gallery name</h3>
						<p>Description text</p>
					</a>
				</div>";
		}
	}
	
	public function get_data_gallery()
	{
		try 		{
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable("gallerys");
			return $db -> selectThreeValues("photo", "name", "comment");
			$db -> closeConnection();
		}
		catch (Exception $e) 		{
			 echo $e -> getMessage();
		}
	}
	
	public function get_data_album()
	{
		try {
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable("photos");
			$db -> setField("picture");
			return $db -> selectTwoValuesSpecial("name_galleries", "picture");
			$db -> closeConnection();
		}
		catch (Exception $e) {
			 echo $e -> getMessage();
		}
	}

}


		