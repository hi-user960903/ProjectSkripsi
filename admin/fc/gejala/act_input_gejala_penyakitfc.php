<?php
include "../config/koneksi.php";
include "../config/fungsi_thumb.php";


$kode_gejala			= ($_POST['kode_gejala']) ;
$gejala					= ($_POST['gejala']);

    $qt= mysqli_query($con,"INSERT INTO daftar_gejala 
                            VALUES( '','$kode_gejala',
                                   '$gejala')");
	if ($qt) {
			echo "<script>alert('Proses BERHASIL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakitfc'>";
		} else {
			echo "<script>alert('Proses GAGAL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakitfc'>";
		}
								   
 
		
?>
