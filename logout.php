<?php
	include_once 'config.php';
?>
<?php
	unset ($_SESSION['username']);
	header ('location:index.php');
?>