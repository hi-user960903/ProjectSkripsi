<?php
	include_once 'config.php';
?>
<?php
	$valid = 0;
	
	$user = $_POST['username'];
	$nama = $_POST['nama'];
	$lahir = $_POST['tgl_lahir'];
	$pass = md5($_POST['password']);
	$pekerjaan = $_POST['pekerjaan'];
	$alamat = $_POST['alamat'];
	
	for ($counter = 0; $counter < 2; $counter++){
		
		if ($counter == 0){
			$comp = $user;
			$param = "nama";
		}
		else if ($counter > 0){
			$comp = $pass;
			$param = "password";
		}
		
		$ssql = "SELECT * FROM daftar_user WHERE $param = '$comp'";
		$query = mysqli_query ($con,$ssql);
		$result = mysqli_num_rows($query);
	
		if ($result > 0){
			$valid += 1;
		}
	}
	
	if ($valid >= 2){
		header ('location:daftar.php?berhasil=0');
	}
	else {
		$defdate = date ('Y-m-d');
		$ssql = "INSERT INTO daftar_user (id_user, username, nama, level, password, pekerjaan, alamat, tgl_lahir) VALUES ('','$user','$nama', 'pasien', '$pass', '$pekerjaan', '$alamat', '$lahir')";
		$query = mysqli_query($con,$ssql);
		header ('location:daftar.php?berhasil=1');
		
	}
?>