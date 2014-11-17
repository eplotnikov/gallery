<?php

class Model_Admin
{

	public function showPhotos($val1, $val2, $val3)
	{
		try {
			$db = DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable($val1);
			return $db -> selectTwoValuesSpecial($val2, $val3);  //"name_user", "picture"
			$db -> closeConnection();
		}
		catch (Exception $e) {
			 echo $e -> getMessage();
		}
	}

	public function delVal($table, $field, $val)
    {
        if (!empty($val)) {
            include_once '../core/DbAdapter.php';
            $db=DbAdapter::getInstance();
            if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
                throw new Exception("Not Connect!");
            }
            $db -> setTable($table);
            $db -> setIndexField($field);
            $db -> setIndexValue($val);
            $db -> deleteField($table, $field, $val);
            $db -> closeConnection();
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        }
    }
	
	public function addInfo($nameGallery, $commentGallery, $photoGallery, $table, $fields)
	{
		//add new galleries - ok!
		if (!empty($nameGallery) && !empty($commentGallery) && !empty($photoGallery)) {
			include_once '../core/DbAdapter.php';
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable($table);
			$db -> addRecords($fields, "'$nameGallery', '$commentGallery', '$photoGallery'");
			$db -> closeConnection();
			header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
		} else {
			echo "not found";
		}
	}

    public function addInfoT($nameGallery, $comment, $commentGallery, $photoGallery, $userName, $table, $fields)
	{
		//add new galleries - ok!
		if (!empty($nameGallery) && !empty($commentGallery) && !empty($photoGallery)) {
			include_once '../core/DbAdapter.php';
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable($table);
			$db -> addRecords($fields, "'$nameGallery', '$comment', '$commentGallery', '$photoGallery', '$userName'");
			$db -> closeConnection();
			header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
		} else {
			echo "not found";
		}
	}

    public function addPhotoInfo($namePhoto, $commentPhoto, $show, $galleryPhoto, $filePhoto, $userName, $table, $fields)
    {
        //add new galleries - ok!
        if (!empty($nameGallery) && !empty($commentGallery) && !empty($photoGallery)) {
            include_once '../core/DbAdapter.php';
            $db=DbAdapter::getInstance();
            if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
                throw new Exception("Not Connect!");
            }
            $db -> setTable($table);
            $db -> addRecords($fields, "'$namePhoto', '$commentPhoto', '$show', '$galleryPhoto', '$filePhoto', '$userName'");
            $db -> closeConnection();
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        } else {
            echo "not found";
        }
    }
	
	public function updateInfo($table, $field, $value, $index_field, $index_value)
	{
		include_once '../core/DbAdapter.php';
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable($table);
			$db -> setField($field);
            $db -> setValue($value);
			$db -> setIndexField($index_field);
            $db -> setIndexValue($index_value);
			$db -> updateInfo();
			$db -> closeConnection();
			header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
	}
	
	public function updateInfoS($table, $field, $value, $index_field, $index_value, $newGalleryComment)
	{
		include_once '../core/DbAdapter.php';
			$db=DbAdapter::getInstance();
			if ($db -> connectionDB("localhost", "gallery", "gallery", "gallery") == "false") {
				throw new Exception("Not Connect!");
			}
			$db -> setTable($table);
			$db -> setField($field);
            $db -> setValue($value);
			$db -> setIndexField($index_field);
            $db -> setIndexValue($index_value);
			$db -> updateInfoSpec($newGalleryComment);
			$db -> closeConnection();
			header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
	}

}
