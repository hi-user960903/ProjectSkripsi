<!doctype html>
<?php
	include 'config.php';
?>
<html style="background:#000;">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>SiPPerS</title>
<link rel="icon" href="img/favicon.png" type="image/png">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
<link href="css/animate.css" rel="stylesheet" type="text/css">
 
<!--[if lt IE 9]>
    <script src="js/respond-1.1.0.min.js"></script>
    <script src="js/html5shiv.js"></script>
    <script src="js/html5element.js"></script>
<![endif]-->
 
</head>
<body>

<!--Header_section-->
<header id="header_wrapper">
  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="#"><img src="img/logo1.png" alt="logo" width="140"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">		
				<li><a href='index.php'>Kembali</a></li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<?php
error_reporting(E_ALL);
include "admin/config/koneksi.php"; //memanggil file koneksi_db.php
include "admin/config/config.php"; //memanggil file fungsi.php
include "admin/config/fungsi.php"; //memanggil file fungsi.php

$nama 		= $_POST['nama'];
$count 		= $_POST['count'];

function get_rule_base($con, $id_atribut, $in = null)
{
	$q_in = '';
	if(is_array($in))
	{
		$q_in = 'AND id in ('.implode(',', $in).')';
	}

	$q = "SELECT * from rule_base_fc WHERE rule_base LIKE '%;$id_atribut;%' ".$q_in;

	$r_base = mysqli_query($con, $q);

	$num = mysqli_num_rows($r_base);
	if($num == 0)
	{
		return false;
	}
	else
	{
		$rule_id = array();
		while ($gejala = mysqli_fetch_array($r_base)) {
			$rule_id[] = $gejala['id'];
		}
		return $rule_id;
	}
}

$in = 'start';
foreach ($_POST['gejala'] as $id => $atribut)
{
	if($in == false)
	{
		break;
	}
	$in = get_rule_base($con, $atribut, $in);
}

if($in == false)
{
	// Tidak ada yg kondisi yang sesuai
	$kesimpulan = 'Persalinan Sectio Caesarea';
}
else
{
	// Ada kondisi yang sesuai
	$kesimpulan = 'Persalinan Normal';
}

$metode = 'fc';
$gejala = implode(',', $_POST['gejala']);
$pasien = $nama;

$q_history = "INSERT INTO riwayat_pengujian (id,
						metode,
						gejala,
						pasien,
						kesimpulan)
					VALUE (NULL,
						'$metode',
						'$gejala',
						'$pasien',
						'$kesimpulan')
						";

if (mysqli_query($con, $q_history) === TRUE)
{	
	$last_id = $con->insert_id;

	$q_gejala	= 'SELECT * FROM daftar_gejala';
	$r_gejala	= mysqli_query($con, $q_gejala);

	$arr_gejala = array();
	?>
	<table border='1' class="table table-bordered table-striped"> 
		<thead>
			<tr>
				<td>Kode Gejala</td>
				<td>Gejala</td>
				<td>Gejala Pasien</td>
			</tr>
		</thead>
		<tbody>
	<?php
	//-- Header
	echo "<h2><i class='fa fa-list-alt'></i> Hasil Perhitungan Forward Chainning</h2><hr>";

	while($l_gejala = mysqli_fetch_array($r_gejala))
	{
		$k = $l_gejala['kode_gejala'].' - '.$l_gejala['gejala'];
		$q_gjl	= 'SELECT * FROM daftar_atribut WHERE id_atribut = '.$_POST['gejala'][$l_gejala['id_gejala']];
		$r_gjl	= mysqli_query($con, $q_gjl);
		echo "<tr>";
		while($gjl = mysqli_fetch_array($r_gjl))
		{
			echo "<td>".$l_gejala['kode_gejala']."</td>";
			echo "<td>".$l_gejala['gejala']."</td>";
			echo "<td>".$gjl['atribut']."</td>";
			$arr_gejala[$k] = $gjl['atribut'];
		}
		echo "</tr>";
	}
	?>
		</tbody>
	</table>
	<?php

	echo '<center>Hasil FC: <br><h4><b><i>'.$kesimpulan.'</i></b></h4></center>';
} else {
	echo "Gagal Menyimpan data di database...";
}
?>

<!--Hero_Section--> 
<?php
	include_once 'template/footer.php';
?>