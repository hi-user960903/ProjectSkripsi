<?php
	include_once 'config.php';
?>
<?php
	if (isset($_GET['aksi'])){
		$aksi = $_GET['aksi'];
		$sakit = $_GET['sakit'];
		
		switch ($aksi){
			
			case 'simpan':
			$now = date ('Y-m-d');
			$ssql = "UPDATE daftar_user SET tgl_diagnosa = '$now', keterangan = '$sakit' WHERE id_user ='". $_SESSION['user']."'";
			$query = mysqli_query($con,$ssql);
			
			unset ($_SESSION['keluhan']);
			unset ($_SESSION['jumlah_keluhan']);
			header ('location:periksa.php?simpan=1');
			break;
			
			case 'buang':
			unset ($_SESSION['keluhan']);
			unset ($_SESSION['jumlah_keluhan']);
			unset ($_SESSION['n_atas1']);
			unset ($_SESSION['n_atas2']);
			unset ($_SESSION['n_atas3']);
			echo "sukses";
			header ('location:periksa.php');
			break;
		}
	}
?>