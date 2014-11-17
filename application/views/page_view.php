
	<!-- "page", личная страница юзера -->
	<!--
		нужно добавить
		- вывод инфы о пользователе с возможностью редактировать
		- возможность закачать фотки
		- превью всех фоток данного пользователя
		- возможность сокрытия фотографии
		- возможность удаления фотографии
	-->


		<div id="inform_block">
		
			<h3>My Page</h3>
			<hr>
			<h3><?php echo $_SESSION['login']; ?></h3>

			<?php
				foreach ($data as $key => $value) {
					foreach ($value as $k => $val) {
						if ($k == "name") {
							echo "<p>Name: ".$val."</p>";
						}
						if ($k == "surname") {
							echo "<p>Surame: ".$val."</p>";
						}
						if ($k == "email") {
							echo "<p>E-mail: ".$val."</p>";
						}
						if ($k == "sex") {
							echo "<p>Sex: ".$val."</p>";
						}
						if ($k == "role") {
							echo "<p>Role: ".$val."</p>";
						}
					}
				}
			?>

            <hr>
            <p>Users photos:</p>
			
			<?php 
			include_once 'application/models/model_page.php'; 
			$photos = new Model_Page();
			foreach ($photos -> showPhotos() as $key => $value) {
				foreach ($value as $k => $val) {
					if ($k == $_SESSION['login']) {
						echo "<img style='width:80px; margin-top:20px; margin-right:20px;' src='../../img/albums/".$val."'></img>";
					}
				}
			}
			?>

            <hr>
            <p>Add photos:</p><br>
			<form class="formsearch1" name="addPhotoToUser" method="POST" enctype="multipart/form-data" action="application/extra/administrationForm.php">
				<p><input class="search1" type="text" name="nameAddPhoto" style="width:400px;"> Name</p>
				<br>
				<p><input class="search1" type="text" name="CommentAddPhoto" style="width:400px;"> Comment</p>
				<br>
				<p><select name="GalleryAddPhoto" class="search1" style="width:400px;">
					<?php
					foreach($photos -> galleriesList("gallerys", "name") as $kay => $value) {
						echo "<option>".$value."</option>";
					}
					?>
				</select> Gallery</p>
				<br>
				<p><input type="file" name="fileAddPhoto"></p>
				<br>
				<p><input class="submit2" type="submit" value="add!"></p>
			</form>
						
            <hr>
            <p>Edit photos:</p>
			<br>
			<form class="formsearch1" name="editPhotoInfoName" method="POST"  action="application/extra/administrationForm.php">
				<p><input class="search1" type="text" name="namePhotoForEdit" style="width:400px;" value="text"> Name</p>
				<br>
                <p><select class="search1" name="NamePhotoForId" style="width:400px;">
                        <?php
                        foreach ($photos -> showPhotos() as $key => $value) {
                            foreach ($value as $k => $val) {
                                if ($k == $_SESSION['login']) {
									echo "<option>".$val."</option>";
								}
                            }
                        }
                        ?>
                    </select> Photo</p>
				<br>
				<p><input class="submit2" type="submit" value="edit!"></p>
			</form>
			<form class="formsearch1" name="editPhotoInfoComment" method="POST"  action="application/extra/administrationForm.php">
				<br>
				<p><input class="search1" type="text" name="commentPhotoForEdit" style="width:400px;" value="text"> Comment</p>
				<br>
                <p><select class="search1" name="NamePhotoForId" style="width:400px;">
                        <?php
                        foreach ($photos -> showPhotos() as $key => $value) {
                            foreach ($value as $k => $val) {
                                if ($k == $_SESSION['login']) {
									echo "<option>".$val."</option>";
								}
                            }
                        }
                        ?>
                    </select> Photo</p>
				<br>
				<p><input class="submit2" type="submit" value="edit!"></p>
			</form>
			<form class="formsearch1" name="editPhotoInfoShow" method="POST"  action="application/extra/administrationForm.php">
				<br>
				<p>Yes - <input type="radio" name="ShowPhotoForEdit" value="yes"> No - <input type="radio" name="ShowPhotoForEdit" value="no"> Show</p>
				<br>
                <p><select class="search1" name="NamePhotoForId" style="width:400px;">
                        <?php
                        foreach ($photos -> showPhotos() as $key => $value) {
                            foreach ($value as $k => $val) {
                                if ($k == $_SESSION['login']) {
									echo "<option>".$val."</option>";
								}
                            }
                        }
                        ?>
                    </select> Photo</p>
				<br>
				<p><input class="submit2" type="submit" value="edit!"></p>
			</form>
			<form class="formsearch1" name="editPhotoInfoGallery" method="POST"  action="application/extra/administrationForm.php">
				<br>
				<p><select class="search1" name="NameGalleryPhotoForEdit" style="width:400px;">
					<?php
					foreach($photos -> galleriesList("gallerys", "name") as $kay => $value) {
						echo "<option>".$value."</option>";
					}
					?>
				</select> Gallery</p>
				<br>
                <p><select class="search1" name="NamePhotoForId" style="width:400px;">
                        <?php
                        foreach ($photos -> showPhotos() as $key => $value) {
                            foreach ($value as $k => $val) {
                                if ($k == $_SESSION['login']) {
									echo "<option>".$val."</option>";
								}
                            }
                        }
                        ?>
                    </select> Photo</p>
				<br>
				<p><input class="submit2" type="submit" value="edit!"></p>
			</form>

            <hr>
            <p>Delete photos:</p>
			<form class="formsearch1" name="deletePhoto" method="POST"  action="application/extra/administrationForm.php">
				<br>
				<p><select class="search1" style="width:400px;" name="deleteUserPhoto">
					<?php
					foreach ($photos -> showPhotos() as $key => $value)	{
						foreach ($value as $k => $val) {
							if ($k == $_SESSION['login']) {
								echo "<option>".$val."</option>";
							}
						}
					}
					?>
				</select> Photo</p>
				<br>
				<p><input class="submit2" type="submit" value="del!"></p>
			</form>

		</div>