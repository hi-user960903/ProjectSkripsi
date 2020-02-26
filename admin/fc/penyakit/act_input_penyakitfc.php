<?php
include "../config/koneksi.php";
include "../config/fungsi_thumb.php";


$penyakit		= ($_POST['penyakit']) ;


    $qt= mysqli_query($con,"INSERT INTO daftar_penyakit 
                            VALUES('',
                                   '$penyakit')");
 
		if ($qt) {
			echo "<script>alert('Proses BERHASIL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=penyakitfc'>";
		} else {
			echo "<script>alert('Proses GAGAL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=penyakitfc'>";
		}
	

?>
