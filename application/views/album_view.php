	
	<!-- страница "album", которая показывает на странице фотографии запрашиваемого альбома -->
		
		<div id="container">
			
		<?php	
			//получаем гет ссылкой массив, переданный из gallery_viuw, для того чтоб вытащить имя выбранного альбома
			$get = $_GET['arr'];
			$get = unserialize($get);
				foreach ($get as $key => $value)
				{
					if ($key == "name")
					{
						$name = $value;
					}
				}
        echo "<h3>".$name."</h3>";
			// выводим фотографии альбома на страницу
			foreach ($data as $key => $value)
			{

				foreach ($value as $k => $val)
				{
					if ($k == $name)
					{
					echo "<div class='container'>
							<a href='../../img/photo/".$val."' rel='gallery[1]' title='".$k."'>
								<img src='../../img/photo/".$val."'></img>
							</a>
							<p>name: ".$name."</p>
							<p><img src='../../img/heart.jpg' style='width:20px; margin-top:0;'></img> 125</p>
						</div>";
					}
				}
			}
			
			
		?>


		
		</div>
