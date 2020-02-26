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
<style>
.but1 {
    font-family: 'Raleway', sans-serif;
    display: block;
    font-size: 16px;
    width: 178px;
    height: 46px;
    line-height: 46px;
    border-radius: 3px;
    text-align: center;
    text-transform: uppercase;
    font-weight: 600;
    transition: all 0.2s ease-in-out;
    -moz-transition: all 0.2s ease-in-out;
    -webkit-transition: all 0.2s ease-in-out;
    background: transparent;
    color: #fff;
    border: 1px solid #fff;
}

.but1:hover {
    background: #fff;
    color: #4caf50;
    border: 1px solid #fff;
}

.teks {
    font-size: 15px;
    color: white;
    font-family: 'Raleway', times new roman;
    font-weight: normal;
    text-align: right; 
}
.label {
    font-size: 15px;
    color: white;
    font-family: times new roman;
}
</style>
 
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
				<li><a href='periksa.php'>Kembali</a></li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<!--Hero_Section-->
<section id="hero_section" class="top_cont_outer">
  <div class="hero_wrapper" id="hero_periksa">
    <div class="container">
      <div class="hero_section">
        <div class="row">
          <div class="col-lg-7">
				<h1 style="color:white;">Hasil Pengujian</h1>
				<hr style="color:white;">
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
						<table class="table table" id="tabel_user">
							<thead>
								<tr>
									<td>Nama Pengguna</td>
									<td><?php echo strtoupper("$pasien"); ?></td>
								</tr>
							</thead>
							<tbody>
						<?php

						while($l_gejala = mysqli_fetch_array($r_gejala))
						{
							$k = $l_gejala['kode_gejala'].' - '.$l_gejala['gejala'];
							$q_gjl	= 'SELECT * FROM daftar_atribut WHERE id_atribut = '.$_POST['gejala'][$l_gejala['id_gejala']];
							$r_gjl	= mysqli_query($con, $q_gjl);
							echo "<tr>";
							while($gjl = mysqli_fetch_array($r_gjl))
							{
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

						echo '<label class="label"><center>Hasil Forward Chaining: <br><h4><b><i>';
						echo strtoupper("$kesimpulan");
						echo '</i></b></h4></center></label>';
					} else {
						echo "Gagal Menyimpan data di database...";
					}
					?>
				
				
			 </div>
			 <div class="col-lg-4 col-sm-offset-1">
			 <br> <br> <br> <br> <br>
				<img src="img/tesicon.png"/>
			 </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Hero_Section--> 
<?php
	include_once 'template/footer.php';
?>