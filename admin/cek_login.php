<?php
session_start();
include "config/koneksi.php";
	
	if (isset($_POST['username']) && isset($_POST['password']) ){
		$valid = 0;
		
		$name = $_POST['username'];
		$pass = $_POST['password'];
		
		$ssql = "SELECT * FROM admin WHERE username = '$name'";
		$query = mysqli_query($con,$ssql);
		$result = mysqli_num_rows($query);
		
		echo "$ssql <br/>";
		
		if ($result > 0) {
			$valid += 1;
		}
		
		$ssql = "SELECT * FROM admin WHERE password = '$pass'";
		$query = mysqli_query($con,$ssql);
		$result = mysqli_num_rows($query);
		
		echo "$ssql <br/>";
		
		if ($result > 0) {
			$valid += 1;
		}
		
		if ($valid >= 2){
			$ssql = "SELECT * FROM admin WHERE username = '$name' AND password = '$pass'";
			$query = mysqli_query($con,$ssql);
			
			while ($record = mysqli_fetch_array($query)){
				$_SESSION['id_admin'] = $record['id_admin'];
				$_SESSION['password'] = $record['password'];
				$_SESSION['username'] = $record['username'];
	
			}
			header ('location:theme/index.php');
		}
		else{
			header ('location:index.php');
		}
	}
?>


