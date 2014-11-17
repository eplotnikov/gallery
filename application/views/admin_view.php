
   <!-- страница "content_admin", отображение контента вкладки администрирования -->

        <div id="inform_block">



            <h3>Admin Page</h3>

            <hr>
            <p>delete users:</p>
            <form class="formsearch1" name="deleteUser" method="POST"  action="application/extra/administrationForm.php">
                <p><select class="search1" name="deleteUser" style="width:400px;">
                    <?php

                        include_once 'application/models/model_admin.php';
                        $adm = new Model_Admin();

                        foreach ($adm -> showPhotos("users", "id", "name") as $key => $value)
                        {
                            foreach ($value as $k => $val)
                            {
                                echo "<option>".$val."</option>";
                            }
                        }
                    ?>
                </select> User</p>
				<br>
                <p><input class="submit2" type="submit" value="del!"></p>
            </form>

            <hr>
            <p>edit users roles:</p>
            <form class="formsearch1" name="editUserRole" method="POST"  action="application/extra/administrationForm.php">
                <br>
                <p><select class="search1" name="UserForRole" style="width:400px;">
                        <?php
                        foreach ($adm -> showPhotos("users", "id", "name") as $key => $value)
                        {
                            foreach ($value as $k => $val)
                            {
                                echo "<option>".$val."</option>";
                            }
                        }
                        ?>
                    </select> User</p>
                <br>
				<p><select class="search1" name="RoleForUser" style="width:400px;">
                        <option>user</option>
						<option>admin</option>
                    </select> Role</p>
                <br>
                <p><input class="submit2" type="submit" value="edit!"></p>
            </form>

            <hr>
            <p>add galleries:</p>
            <br>
            <form class="formsearch1" name="addGallery" method="POST" enctype="multipart/form-data" action="application/extra/administrationForm.php">
                <p><input class="search1" type="text" name="nameGallery" style="width:400px;"> Name</p>
                <br>
                <p><input class="search1" type="text" name="commentGallery" style="width:400px;"> Comment</p>
                <br>
                <p><input type="file" name="photoGallery"> Photo</p>
                <br>
                <p><input class="submit2" type="submit" value="add!"></p>
            </form>

            <hr>
            <p>edit galleries:</p>
            <br>
            <form class="formsearch1" name="editGallery" method="POST" enctype="multipart/form-data" action="application/extra/administrationForm.php">
				<p><select class="search1" name="editGalleryName" style="width:400px;">
                    <?php
                        foreach ($adm -> showPhotos("gallerys", "id", "name") as $key => $value)
                        {
                            foreach ($value as $k => $val)
                            {
                                echo "<option>".$val."</option>";
                            }
                        }
                    ?>
                    </select> Gallery</p>
                <br>
                <p><input class="search1" type="text" name="nameForEditGallery" value="name" style="width:400px;"> New name</p>
                <br>
                <p><input class="search1" type="text" name="commentForEditGallery" value="comment" style="width:400px;"> New comment</p>
                <br>
                <p><input class="submit2" type="submit" value="edit!"></p>
            </form>
			<form class="formsearch1" name="editGalleryNewPhoto" method="POST" enctype="multipart/form-data" action="application/extra/administrationForm.php">
				<br>
				<p><select class="search1" name="editGalleryNewPhoto" style="width:400px;">
                    <?php
                        foreach ($adm -> showPhotos("gallerys", "id", "name") as $key => $value)
                        {
                            foreach ($value as $k => $val)
                            {
                                echo "<option>".$val."</option>";
                            }
                        }
                    ?>
                    </select> Gallery</p>
                <br>
                <p><input type="file" name="photoForEditGallery"> New photo</p>
                <br>
                <p><input class="submit2" type="submit" value="edit!"></p>
            </form>

            <hr>
            <p>delete galleries:</p>
            <br>
            <form class="formsearch1" name="deleteGallery" method="POST"  action="application/extra/administrationForm.php">
                <p><select class="search1" name="deleteGallery" style="width:400px;">
                        <?php
                        foreach ($adm -> showPhotos("gallerys", "id", "name") as $key => $value)
                        {
                            foreach ($value as $k => $val)
                            {
                                echo "<option>".$val."</option>";
                            }
                        }
                        ?>
                    </select> Photo</p>
                <br>
                <p><input class="submit2" type="submit" value="del!"></p>
            </form>

            <hr>
            <p>delete photo:</p>
            <form class="formsearch1" name="deletePhoto" method="POST"  action="application/extra/administrationForm.php">
                <br>
                <p><select class="search1" name="deletePhotoAdmin" style="width:400px;">
                    <?php
                    foreach ($adm -> showPhotos("photos", "name_user", "picture") as $key => $value)
                    {
                        foreach ($value as $k => $val)
                        {
                            echo "<option>".$val."</option>";
                        }
                    }
                    ?>
                </select> Photo</p>
                <br>
                <p><input class="submit2" type="submit" value="del!"></p>
            </form>

        </div>


