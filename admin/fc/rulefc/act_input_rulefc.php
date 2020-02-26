<?php
include "../config/koneksi.php";
include "../config/fungsi_thumb.php";

$id_penyakit			= $_POST['id_penyakit'];
$gejala					= ';'.implode(';',$_POST['gejala']).';';

if(sizeof($_POST['gejala']) < 1)
{
	echo "<script>alert('Data gejala kurang lengkap...');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=input_rulefc'>";
	return true;
}

$qt= mysqli_query($con,"INSERT INTO rule_base_fc 
						VALUES( NULL,'$id_penyakit',
								'$gejala')");
if ($qt) {
	echo "<script>alert('Proses BERHASIL...');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=rulefc'>";
} else {
	echo "<script>alert('Proses GAGAL...');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=input_rulefc'>";
}
		
?>