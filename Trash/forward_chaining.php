<!doctype html>
<?php
	include 'config.php';
	
	if (!isset($_SESSION['username'])){
		header ('location:index.php?valid=0');
	}
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
			  <li><a href="index.php">Kembali</a></li>
			   <li><a href="logout.php">Logout</a></li>
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
	  	<?php
			if (isset($_GET['simpan'])){
				echo "<div class=\"alert alert-success\" style=\"position:fixed; width:100%;\">";
				echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
				echo "<strong>Penyimpanan Berhasil!</strong> Data berhasil disimpan.";
				echo "</div>";
			}
		?>
    <div class="container">
      <div class="hero_section">
        <div class="row">
          <div class="col-lg-7 col-sm-7">
            <div class="top_left_cont zoomIn wow animated">
				<?php
					include_once 'solving_konsul.php';
				?>
			 </div>
          </div>
          <div class="top_left_cont col-lg-5 col-sm-5">
			<h2>Data User</h2>
			<table class="table table" id="tabel_user">
				<tbody>
					<?php
						$ssql = "SELECT * FROM daftar_user WHERE username = '".$_SESSION['username']."'";
						$query = mysqli_query($con,$ssql);
						
						while ($record = mysqli_fetch_array($query)){
							
							$lahir = substr($record['tgl_lahir'], 0, 4);
							$now = date ('Y');
							$usia = $now - $lahir;
							
							echo "<tr>";
							echo "<td>Nama Lengkap</td>";
							echo "<td>".$record['nama']."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>Pekerjaan</td>";
							echo "<td>".$record['pekerjaan']."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>Usia</td>";
							echo "<td>$usia tahun</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<tr>";
							echo "<td>Alamat</td>";
							echo "<td>".$record['alamat']."</td>";
							echo "</tr>";
							echo "<td>Tanggal diagnosa terakhir</td>";
							echo "<td>".$record['tgl_diagnosa']."</td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td>Hasil</td>";
							echo "<td>".$record['keterangan']."</td>";
							echo "</tr>";
						}
					?>
				</tbody>
			</table>
			<img src="img/tesicon.png"/>
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