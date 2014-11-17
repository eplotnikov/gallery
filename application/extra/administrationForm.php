<?php

	include_once '../models/model_admin.php';

    //delete user
    if (isset($_POST['deleteUser'])) {
        $deleteUser = $_POST['deleteUser'];
        include_once '../models/model_admin.php';
        $delUser = new Model_Admin();
        $delUser -> delVal("users", "name", $deleteUser);
    }

    //add new galleries wiht pic
    if (isset($_POST['nameGallery'])) {
        if (empty($_FILES['photoGallery']['name'])) {
            $avatar = "img/albums/img0001.jpg";
            $photoGallery = "img0001.jpg";
        } else {
            $path_directory = '../../img/albums/';
            $photoGallery = $_FILES['photoGallery']['name'];
        }
        if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/', $_FILES['photoGallery']['name'])) {
            $filename = $_FILES['photoGallery']['name'];
            $source = $_FILES['photoGallery']['tmp_name'];
            $target = $path_directory . $filename;
            move_uploaded_file($source, $target);
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        }
        $nameGallery = $_POST['nameGallery'];
        $commentGallery = $_POST['commentGallery'];
        $addGallery = new Model_Admin();
        $addGallery -> addInfo($nameGallery, $commentGallery, $photoGallery, "gallerys", "name, comment, photo");
    }


    if (isset($_POST['nameAddPhoto'])) {
        if (empty($_FILES['fileAddPhoto']['name'])) {
            $avatar = "img/albums/img0001.jpg";
            $photoGallery = "img0001.jpg";
        } else {
            $path_directory = '../../img/photo/';
            $photoGallery = $_FILES['fileAddPhoto']['name'];
        }

        if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/', $_FILES['fileAddPhoto']['name'])) {
            $filename = $_FILES['fileAddPhoto']['name'];
            $source = $_FILES['fileAddPhoto']['tmp_name'];
            $target = $path_directory . $filename;
            move_uploaded_file($source, $target);
            header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
        }

        $namePhoto = $_POST['nameAddPhoto'];
        $commentPhoto = $_POST['CommentAddPhoto'];
        $showPhoto = "yes";
        $galleryPhoto = $_POST['GalleryAddPhoto'];
        $filename;
        $userName = $_SESSION['login'];
        //exit();
        $addGallery = new Model_Admin();
        $addGallery -> addInfoT($namePhoto, $commentPhoto, $filename, $galleryPhoto, $userName, "photos", "name, comment, picture, name_galleries, name_user");
			header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
    }
	
	//delete gallery
	if (isset($_POST['deleteGallery'])) {
        $deleteGallery = $_POST['deleteGallery'];
        include_once '../models/model_admin.php';
        $delGallery = new Model_Admin();
        $delGallery -> delVal("gallerys", "name", $deleteGallery);
    }
	
	//deleteUserPhoto
	if (isset($_POST['deleteUserPhoto'])) {
		echo $_POST['deleteUserPhoto'];
        $deletePhoto = $_POST['deleteUserPhoto'];
        include_once '../models/model_admin.php';
        $delPhoto = new Model_Admin();
        $delPhoto -> delVal("photos", "picture", $deletePhoto);
		unlink ("../../img/photo/".$deletePhoto);
    }

	//deletePhotoAdmin
	if (isset($_POST['deletePhotoAdmin'])) {
		echo $_POST['deletePhotoAdmin'];
        $deletePhoto = $_POST['deletePhotoAdmin'];
        include_once '../models/model_admin.php';
        $delPhoto = new Model_Admin();
        $delPhoto -> delVal("photos", "picture", $deletePhoto);
		unlink ("../../img/photo/".$deletePhoto);
    }
	
	//update role
    if (isset($_POST['UserForRole'])) {
        $user = $_POST['UserForRole'];
		$role = $_POST['RoleForUser'];
        include_once '../models/model_admin.php';
        $delUser = new Model_Admin();
        $delUser -> updateInfo("users", "role", $role, "login", $user);
    }
	
	//update gallery
    if (isset($_POST['editGalleryName'])) {
        $galleryName = $_POST['editGalleryName'];
		$newGalleryName = $_POST['nameForEditGallery'];
		$nField = "comment";
		$newGalleryComment = $_POST['commentForEditGallery'];
        include_once '../models/model_admin.php';
        $delUser = new Model_Admin();
		$delUser -> updateInfoS("gallerys", "name", $newGalleryName, "name", $galleryName, $newGalleryComment);
    }
	if (isset($_FILES['photoForEditGallery']['name'])) {
		$path_directory = '../../img/albums/';
		$galleryName = $_POST['editGalleryNewPhoto'];
        $photoGallery = $_FILES['photoForEditGallery']['name'];
			
		if (preg_match('/[.](JPG)|(jpg)|(jpeg)|(JPEG)|(gif)|(GIF)|(png)|(PNG)$/', $_FILES['photoForEditGallery']['name'])) {
			$filename = $_FILES['photoForEditGallery']['name'];
			$source = $_FILES['photoForEditGallery']['tmp_name'];
			$target = $path_directory . $filename;
			move_uploaded_file($source, $target);
			header('Location: http://gallery.dev/');
            //header('Location: http://plov.dp.ua/');
		}
		include_once '../models/model_admin.php';
		$delUser = new Model_Admin();
		$delUser -> updateInfo("gallerys", "photo", $photoGallery, "name", $galleryName);
	}
	
	if (isset($_POST['namePhotoForEdit'])) {
		$newPhotoName = $_POST['namePhotoForEdit'];
		$newGalleryForPhoto = $_POST['NameGalleryPhotoForEdit'];
		$namePhotoForId = $_POST['NamePhotoForId'];
		include_once '../models/model_admin.php';
		$delUser = new Model_Admin();
		$delUser -> updateInfo("photos", "name", $newPhotoName, "picture", $namePhotoForId);
	}
	
	if (isset($_POST['commentPhotoForEdit'])) {
		$newCommentName = $_POST['commentPhotoForEdit'];
		$namePhotoForId = $_POST['NamePhotoForId'];
		include_once '../models/model_admin.php';
		$delUser = new Model_Admin();
		$delUser -> updateInfo("photos", "comment", $newCommentName, "picture", $namePhotoForId);
	}
	
	if (isset($_POST['ShowPhotoForEdit'])) {
		echo $showPhoto = $_POST['ShowPhotoForEdit'];
		$namePhotoForId = $_POST['NamePhotoForId'];
		include_once '../models/model_admin.php';
		$delUser = new Model_Admin();
		$delUser -> updateInfo("photos", "show", $showPhoto, "picture", $namePhotoForId);
	}
	
	if (isset($_POST['editPhotoInfoGallery'])) {
		$newGallery = $_POST['editPhotoInfoGallery'];
		$namePhotoForId = $_POST['NamePhotoForId'];
		include_once '../models/model_admin.php';
		$delUser = new Model_Admin();
		$delUser -> updateInfo("photos", "name_galleries", $newGallery, "picture", $namePhotoForId);
	}
?>



