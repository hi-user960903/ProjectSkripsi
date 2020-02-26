<?php
include "../config/koneksi.php";

$gk				= isset($_POST['gk']) ? $_POST['gk'] : "";
$bila_benar		= isset($_POST['bila_benar']) ? $_POST['bila_benar'] : "";
$bila_salah		= isset($_POST['bila_salah']) ? $_POST['bila_salah'] : "";
$mulai			= isset($_POST['mulai']) ? $_POST['mulai'] : "";
$selesai		= isset($_POST['selesai']) ? $_POST['selesai'] : "";


if ($gk==""||$bila_benar==""||$bila_salah==""||$mulai==""||$selesai==""){
echo "<script>alert('Isilah form isian dengan lengkap')</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=input_rule_diagnosa'>";
} else {
$qt	= mysqli_query($con,"INSERT INTO konsul_diagnosa VALUES ('','$gk', '$bila_benar', '$bila_salah', '$mulai', '$selesai')") or die ("Gagal Masuk".mysql_error());;

		if ($qt) {
			echo "<script>alert('Proses BERHASIL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=rule_diagnosa'>";
		} else {
			echo "<script>alert('Proses GAGAL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=rule_diagnosa'>";
		}
		}
	

?>
