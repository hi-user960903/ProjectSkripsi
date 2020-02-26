<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/config.php"; //memanggil file fungsi.php
include "../config/fungsi.php"; //memanggil file fungsi.php

$user = $_POST['user'];
$nama = $_POST['nama'];
$tgl_lahir = $_POST['tgl_lahir'];
$id	  = $_POST['id'];


if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
} else {

If ($user==""&&$nama==""&&$pekerjaan==""&&$alamat==""&&$tgl_lahir==""&&$level=="") {
Echo "Pengisian form belum benar. Ulangi lagi";
echo "<meta http-equiv='refresh' content='0; url=?page=edit_user&id=$id'>";
} else {
$query = mysqli_query($con,"UPDATE daftar_user SET username='$user', nama='$nama', tgl_lahir='$tgl_lahir' WHERE id_user='$id'");

If ($query) {
Echo  "<script>alert('Data Anda Berhasil di Update ');</script>";
Echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
} else {
Echo "Data anda gagal diupdate. Ulangi sekali lagi";
echo "<meta http-equiv='refresh' content='0; url=?page=edit_user&id=$id'>";
}
}
}

?>
