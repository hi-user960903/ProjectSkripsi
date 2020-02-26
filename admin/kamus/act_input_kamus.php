<?php
error_reporting(0);
include "../config/koneksi.php";
include "../config/fungsi_thumb.php";


$nama	    = ($_POST['nama']) ;
$ket		= ($_POST['ket']) ;

$lokasi_file    = $_FILES['fupload']['tmp_name'];
  $tipe_file      = $_FILES['fupload']['type'];
  $nama_file      = $_FILES['fupload']['name'];
  $acak           = rand(1,99);
  $nama_file_unik = $acak.$nama_file; 

 

  //  // Apabila ada gambar yang diupload
  if (!empty($lokasi_file)){
    UploadImage($nama_file_unik);

    $qt= mysqli_query($con,"INSERT INTO info 
                            VALUES('',
                                   '$nama',
                                   '$nama_file_unik',
                                   '$ket')");
  }
  else{
    $qt= mysqli_query($con,"INSERT INTO info 
                            VALUES('',
                                   '$nama',
                                   '$nama_file',
                                   '$ket')");
  }
  
		if ($qt) {
			echo "<script>alert('Proses BERHASIL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=kamus'>";
		} else {
			echo "<script>alert('Proses GAGAL...');</script>";
			echo "<meta http-equiv='refresh' content='0; url=?page=kamus'>";
		}
		
	

?>
