
    <!-- страница "authorization", выводит форму авторизации -->
	
		<div id="inform_block">

			<h1>Authorization</h1>
			<hr>
			<form id="authorization" class="formsearch1" name="authorization" method="POST" action="application/extra/authorizationForm.php">
			  <br>
			  <p><label for="login" style="margin-left: 10px;">Login:</label></p>
			  <br>
			  <p><input id="login" class="search1" type="text" name="login" style="width:400px;"></p>
			  <br>
			  <p><label for="password" style="margin-left: 10px;">Password:</label></p>
			  <br>
			  <p><input id="password" class="search1" type="password" name="password" style="width:400px;"></p>
			  <br>
              <p>* - All fields are required</p>
              <br>
			  <p><input id="myElement" class="submit2" type="submit" value="go!"></p>
			  <br>
                <script>
                    var submit = document.getElementById('myElement');
                    submit.onclick = function()
                    {
                        if(document.authorization.login.value.length == 0) {
                            //document.getElementById(login).style.color='red';
                            alert('login is empty!');
                        }
                        if(document.authorization.password.value.length == 0) {
                            alert('password is empty!');
                        }
                    }

                </script>
			</form>
			
		</div>