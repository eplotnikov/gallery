
	<!-- "gallery", выводит ссылки-превьюшки всех альбомов -->
		
		<div id="container">
				
		<?php
			
			// выводим фотографии информацию галлерей
			foreach ($data as $key => $value) {
            $arr = serialize($value);
                //print_r($value);
			echo "<div class='container'>
						<a href='Gallery/Album/?arr=".$arr."'>";
				foreach ($value as $k => $val) {
					if ($k == "photo") {
						echo "<img src='img/albums/".$val."'></img>";
					}
					if ($k == "name") {
						echo "<h3>".$val."</h3>";
					}
					if ($k == "comment") {
						echo "<p>".$val."</p>";
					}
				}
			echo "</a></div>";
			}
		
		?>
		
		</div>
		
		
