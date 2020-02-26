<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi_thumb.php";


$id         = $_POST['id'];
$nama	    = $_POST['nama'] ;
$ket		= $_POST['ket'] ;

$lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

 

 // Apabila gambar tidak diganti
  if (empty($lokasi_file)){
    $qt= mysqli_query($con,"UPDATE info SET nama     = '$nama',
												ket  = '$ket'
									  WHERE id_info  = '$id'");	
  }
  else{
    UploadImage($nama_file_unik);
     $qt = mysqli_query($con,"UPDATE info SET nama      = '$nama',
											gambar      = '$nama_file_unik',
												ket		= '$ket'
										WHERE id_info   = '$id'");
  if (!$qt) {
    printf("Error: %s\n", mysqli_error($con));
    exit();
}
		if ($qt) {
			echo "<script>alert('Proses BERHASIL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=kamus'>";
		} else {
			echo "<script>alert('Proses GAGAL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=kamus&id=$id'>";
		} 
		}
	
?>
