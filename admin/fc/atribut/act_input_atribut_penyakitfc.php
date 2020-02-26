<?php
include "../config/koneksi.php";
include "../config/fungsi_thumb.php";


$id_gejala			= ($_POST['id_gejala']) ;
$atribut			= ($_POST['atribut']);

    $qt= mysqli_query($con,"INSERT INTO daftar_atribut 
                            VALUES( '','$id_gejala',
                                   '$atribut')");
	if ($qt) {
			echo "<script>alert('Proses BERHASIL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=atribut_penyakitfc'>";
		} else {
			echo "<script>alert('Proses GAGAL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=atribut_penyakitfc'>";
		}
								   
 
		
?>
