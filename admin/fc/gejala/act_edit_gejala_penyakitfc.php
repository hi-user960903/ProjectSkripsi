<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/config.php"; //memanggil file fungsi.php
include "../config/fungsi.php"; //memanggil file fungsi.php
include "../config/fungsi_thumb.php";


$id         			= $_POST['id'];
$kode_gejala			= ($_POST['kode_gejala']) ;
$gejala					= ($_POST['gejala']);


    $qt= mysqli_query($con,"UPDATE daftar_gejala SET 
								kode_gejala	    = '$kode_gejala',
								gejala  		= '$gejala'  
							WHERE id_gejala  	= '$id'");
 
		if ($qt) {
			echo "<script>alert('Proses BERHASIL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakitfc'>";
		} else {
			echo "<script>alert('Proses GAGAL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakitfc'>";
		}
		
	
?>
