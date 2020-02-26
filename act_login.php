<?php 
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'config.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$pass1	  = $_POST['password'];
$password = md5($pass1);


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($con,"select * from daftar_user where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);


// cek apakah username dan password di temukan pada database
if($cek > 0){

	$data = mysqli_fetch_assoc($login);

	// cek jika user login sebagai admin
	if($data['level']=="admin"){

		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "admin";
		// alihkan ke halaman dashboard admin
		header("location:admin/theme/index.php");

	// cek jika user login sebagai pengurus
	}else if($data['level']=="pasien"){
		// buat session login dan username
		$_SESSION['username'] = $username;
		$_SESSION['level'] = "pasien";
		// alihkan ke halaman dashboard pengurus
		header("location:periksa.php");

	}else{

		// alihkan ke halaman login kembali
		header("location:login.php?pesan=gagal");
	}	
}else{
	header("location:login.php?pesan=gagal");
}


?>