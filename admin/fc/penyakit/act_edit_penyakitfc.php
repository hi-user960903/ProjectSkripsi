<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/config.php"; //memanggil file fungsi.php
include "../config/fungsi.php"; //memanggil file fungsi.php
include "../config/fungsi_thumb.php";


$id         	= $_POST['id'];
$penyakit		= $_POST['penyakit'];


    $qt= mysqli_query($con,"UPDATE daftar_penyakit SET 	penyakit	   = '$penyakit',
													WHERE id_penyakit  = '$id'"); 
		if ($qt) {
			echo "<script>alert('Proses BERHASIL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=penyakitfc'>";
		} else {
			echo "<script>alert('Proses GAGAL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=penyakitfc'>";
		}
		
	
?>
