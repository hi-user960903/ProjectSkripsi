<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/config.php"; //memanggil file fungsi.php
include "../config/fungsi.php"; //memanggil file fungsi.php
$id=$_GET['id'];
if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-hapus');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakitfc'>";
} else {

$query = mysqli_query($con,"DELETE FROM daftar_gejala WHERE id_gejala='$id'");

If ($query) {
Echo "<script>alert('Data berhasil dihapus')</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakitfc'>";
} else {
Echo "Data anda gagal dihapus. Ulangi sekali lagi";
echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakitfc'>";
}
}
?>
