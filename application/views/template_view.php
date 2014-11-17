<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<title>PhotoGallery</title>
		<link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
		<link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
		<link rel="stylesheet" type="text/css" href="/css/style.css" />
		
		<link href="favicon.ico" rel="shortcut icon" type="img/x-icon" />
		<script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
        <script src="/js/required_fields.js" type="text/javascript"></script>

        <script type="text/javascript">
			<!-- Include Main jQuery library -->
			<script type="text/Javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4/jquery.min.js"></script>
			<!-- Include Main Easy Slides library & default css file-->
			<script type="text/Javascript" src="jQuery.easySlides/js/jquery.easyslides.min.v1.1.js"></script>
			<link rel="stylesheet" type="text/css" href="jQuery.easySlides/css/easySlides.default.min.css" />
			<!-- Include own Javascript/jQuery & CSS file for Example 1 -->
			<script type="text/Javascript" src="Examples/Example 1/example_1.js"></script>
			<link rel="stylesheet" type="text/css" href="Examples/Example 1/styles.css" />
		</script>
		

		<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
		<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.3/jquery-ui.min.js"></script>
		<script src="src/jqcarousel.js"></script>

			<script type="text/javascript">
				$(window).load(function () {
					$('#gallery').jqcarousel();
				});
			</script>
			
			
			
		<link href="/todo/gallery.css" rel="stylesheet" type="text/css" />
		<script type="text/javascript" src="/todo/todo.js"></script>
		<script type="text/javascript">
		todo.onload(function(){
			todo.gallery('gallery');
		});
		</script>
			
	</head>
	<body>
	
		<div id="general">

<!-- HEADER -->
		
			<header>
				
				<div id="inheader">
					
					<div id="inheaderleft">
						
						<p>In social networks: </p>
						<a href="https://www.facebook.com/"><img class="network" src="<?php echo Route::$baseUrl;?>/img/f.png"></img></a>
						<a href="https://vk.com/"><img class="network" src="<?php echo Route::$baseUrl;?>/img/v.png"></img></a>
						
					</div>
						
					<div id="inheaderright">
						
						<?php
							if (!isset($_SESSION['login']))
							{
								echo "<p>You can: <a href='/authorization'>authorization</a> or <a href='/registration'>registration</a></p>";
							} else {
								echo "<p>Hello, <b><i>".$_SESSION['login']."</i></b>, <a href='application/extra/exit.php'>exit</a></p>";
							}
                        ?>
						
					</div>
					
				</div>
					
			</header>
			
<!-- LOGO, MENU, SEARCH -->
				
			<div id="top">
				
				<div id="logo">
				
					<a href="/"><img class="logo" src="<?php echo Route::$baseUrl;?>/img/logo.png"></img></a>
				
				</div>

				<menu>
				
					<ul>
						
						<?php
							
							require_once 'application/models/model_menu.php';
							$menu = new Model_Menu();
							
								foreach ($menu -> get_data_menu() as $key => $value)
								{
									echo "<li><a class='bottomMenu' href='/$value'>".$value."</a></li>";
								}
								if (isset($_SESSION['login']))
								{
									echo "<li><a class='bottomMenu' href='/Page'>My page</a></li>";

                                    foreach ($menu -> checkAdmin() as $key => $value)
                                    {
                                        foreach ($value as $k => $val)
                                        {
                                            if ($_SESSION['login'] == $k && $val == "admin")
                                            {
                                                echo "<li><a class='bottomMenu' href='/Admin'>Admin</a></li>";
                                            }
                                        }
                                    }
                                    /*if ($_SESSION['login'] == "admin")
                                    {
                                        echo "<li><a class='bottomMenu' href='/Admin'>Admin</a></li>";
                                    }*/
								}

						?>
					
					</ul>
					
					<form id="formsearch" action="index.php" method="POST">
					
						<input id="search" type="search" name="search">
						
						<input id="submit" type="submit" value="go!">
					
					</form>
					
				</menu>
				
			</div>
			
<!-- CONTENT -->
					
			<div id="main">
			
				<div id="content">
					<div class="box">
						<?php include 'application/views/'.$content_view; ?>
					</div>
				</div>
	
			</div>
			
<!-- FOOTER -->
		
			<footer>
			
				<div id="footertop">
				
					<div class="footertop">
						<img id="footerlogo" src="<?php echo Route::$baseUrl;?>/img/logoblue.png"></img>
					</div>
				
				</div>
				
				<div id="footerbottom">
				
					<div id="footermenu">
				
						<ul>
						
							<li id="footertext">© Jenya Plotnikov, 2014. </li>

							<?php
						
								foreach ($menu -> get_data_menu() as $key => $value)
								{
									echo "<li><a class='footerbottom' href='/$value'>".$value."</a></li>";
								}

							?>	

						</ul>
					
					</div>
				
				</div>		
				
			</footer>
			
		</div>

	</body>
</html>