<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/config.php"; //memanggil file fungsi.php
include "../config/fungsi.php"; //memanggil file fungsi.php

$id				=$_POST['id'];
$gk				= isset($_POST['gk']) ? $_POST['gk'] : "";
$bila_benar		= isset($_POST['bila_benar']) ? $_POST['bila_benar'] : "";
$bila_salah		= isset($_POST['bila_salah']) ? $_POST['bila_salah'] : "";
$mulai			= isset($_POST['mulai']) ? $_POST['mulai'] : "";
$selesai		= isset($_POST['selesai']) ? $_POST['selesai'] : "";

if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=rule_diagnosa'>";
} else {

If ($gk==""||$bila_benar==""||$bila_salah==""||$mulai==""||$selesai=="") {
Echo "Pengisian form belum benar. Ulangi lagi";
echo "<meta http-equiv='refresh' content='0; url=?page=edit_rule_diagnosa&id=$id'>";
} else {
$query = mysqli_query($con,"UPDATE konsul_diagnosa SET gejala_dan_kerusakan='$gk', bila_benar='$bila_benar', bila_salah='$bila_salah', mulai='$mulai', selesai='$selesai'  
WHERE id_kd='$id'");

If ($query) {
Echo  "<script>alert('Data Anda Berhasil di Update ');</script>";
Echo "<meta http-equiv='refresh' content='0; url=?page=rule_diagnosa'>";
} else {
Echo "Data anda gagal diupdate. Ulangi sekali lagi";
echo "<meta http-equiv='refresh' content='0; url=?page=edit_rule_diagnosa&id=$id'>";
}
}
}

?>
