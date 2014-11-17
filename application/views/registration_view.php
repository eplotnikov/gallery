
    <!-- страница "registration", страница отображения формы регистрации -->

        <div id="inform_block">

            <h1>Registration</h1>
            <hr>
            <form name="authorization" method="POST"  action="application/extra/registrationForm.php" >
			  <br>
			  <p><label for="login" style="margin-left: 10px;">Login (all latin characters and digits):</label></p>
			  <br>
              <p><input class="search1" type="text" name="login" style="width:400px;"></p>
              <br>
			  <p><label for="name" style="margin-left: 10px;">Name:</label></p>
			  <br>
              <p><input class="search1" type="text" name="name" style="width:400px;"></p>
              <br>
			  <p><label for="surname" style="margin-left: 10px;">Surname:</label></p>
			  <br>
              <p><input class="search1" type="text" name="surname" style="width:400px;"></p>
              <br>
			  <p><label for="password" style="margin-left: 10px;">Passwords (min 5 symbols, all latin characters and digits):</label></p>
			  <br>
              <p><input class="search1" type="password" name="password1" style="width:400px;"></p>
              <br>
              <p><input class="search1" type="password" name="password2" style="width:400px;"></p>
              <br>
			  <p><label for="email" style="margin-left: 10px;">E-mail:</label></p>
			  <br>
              <p><input class="search1" type="email" name="email" style="width:400px;"></p>
              <br>
			  <p><label for="sex" style="margin-left: 10px;">Sex:</label></p>
			  <br>
              <p>Men - <input type="radio" name="sex" value="men"> Women - <input type="radio" name="sex" value="women"> </p>
              <br>
              <p><label for="question" style="margin-left: 10px;">Question for new password:</label></p>
              <br>
              <p><select name="question" class="search1" style="width:400px;">
                  <option>Mother's maiden name</option>;
                  <option>Name of pet</option>;
                  <option>Favorite color</option>;
                  <option>Favorite car</option>;
                  <option>Favorite number</option>;
              </select></p>
              <br>
              <p><label for="answer" style="margin-left: 10px;">Answer:</label></p>
              <br>
              <p><input class="search1" type="text" name="answer" style="width:400px;"></p>
              <br>
              <p>* - All fields are required</p>
              <br>
              <p><input class="submit2" type="submit" value="go!"></p>

            </form>

        </div>