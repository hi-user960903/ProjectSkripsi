<?php	
	$sstring = "SELECT * FROM daftar_gejala WHERE id_gejala = '2'";
	$q = mysqli_query($con,$sstring);
	
	while ($record = mysqli_fetch_array($q)){
	$pertanyaan = $record['gejala'];
	}
echo "<div class=\"periksa\">";
echo "<h2><strong>Pertanyaan</strong></h2>";
echo "<h2>$pertanyaan</h2>";	
echo"<div class=\"row\">";

echo"<div class=\"col-lg-4 col-sm-7\">";
echo"<a href=\"proses_periksa.php?jawaban=benar&rute=\" class=\"read_more2\">Benar</a> ";
echo"</div>";
echo"<div class=\"col-lg-5 col-sm-7\">";
echo"<a href=\"proses_periksa.php?jawaban=tidak&rute=\" class=\"read_more2\">Tidak</a> ";
echo"</div>";
echo"</div>";
echo "</div>";
?>