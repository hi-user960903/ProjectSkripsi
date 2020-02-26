<?php
	$host = "localhost";
	$user = "root";
	$pass = "";
	$db = "putri";
	
	$con = mysqli_connect("$host","$user","$pass");
	$db = mysqli_select_db($con,$db);
	
	session_start();
?>