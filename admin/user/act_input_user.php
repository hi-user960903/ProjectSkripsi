<?php

include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/config.php"; //memanggil file fungsi.php
include "../config/fungsi.php"; //memanggil file fungsi.php

$user 		= $_POST['user'];
$pass 		= md5($_POST['pass']);
$nama 		= $_POST['nama'];
$tgl_lahir 	= $_POST['tgl_lahir'];

    $qt= mysqli_query($con,"INSERT INTO daftar_user( id_user,
													 username,
													 nama,
													 level,
													 password,
													 tgl_lahir)
                            VALUES					( '',
													  '$user',
													  '$nama',
													  'admin',
													  '$pass',
													  '$tgl_lahir')");
if ($qt) {
	echo "<script>alert('Proses BERHASIL');</script>";
	Echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
	} else {
	Echo "<script>alert('Data anda gagal dimasukkan. Ulangi sekali lagi');</script>";
	echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
 }

?>
