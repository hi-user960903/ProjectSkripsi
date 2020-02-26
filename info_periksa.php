			<?php
				$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=11");
				$home=mysqli_fetch_array($query);
				$nama  =$home['nama'];
				$gambar=$home['gambar'];
				$ket=$home['ket'];
				
				echo "<h2><strong>$nama</strong></h2>";		
				echo"<div class=\"row\">";
				echo"<div class=\"col-lg-4 col-sm-7\">";
				echo"<img src=\"admin/gambar/$gambar\"> ";
				echo"</div>";
				echo"<div class=\"col-lg-7 col-sm-7\">";
				echo "<p>$ket</p>";
					echo"<div class=\"row\">";
					echo"<div class=\"col-lg-6\">";
					echo"<a href='periksa_nbc.php' class=\"read_more2\">Naive Bayes</a> ";
					echo"</div>";
					echo"<div class=\"col-lg-6\">";
					echo"<a href='periksa_fc.php' class=\"read_more2\">Forward Chaining</a> ";
					echo"</div>";
					echo"</div>";
				echo"</div>";
				echo"</div>";
			?>