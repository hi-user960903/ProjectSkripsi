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
          <div class="col-lg-12 col-sm-5">
            <div class="top_left_cont zoomIn wow animated">
			<div class="periksa">
				<center><h1 style="color:white;">Pengujian Naive Bayes</h1></center>
				<hr style="color:white;">
				
				<form class="form-horizontal" method="POST" action="periksa_nbc_act.php">
				<br>
					<div class="form-group">
					<label for="Gejala" class="col-md-3 col-md-offset-1 teks">Nama Pasien</label>
					<div class="col-sm-5">
					  <input type="text" class="form-control" name="nama">
					</div>
				  </div>
				  <?php
				  $query= mysqli_query($con,"SELECT * FROM nbc_atribut where id_atribut > 1 ORDER BY id_atribut");	
				  $a=0;
				  while ($hasil=mysqli_fetch_array($query)) {
					  echo " <div class='form-group'>
								<label class='col-md-3 col-md-offset-1 teks'>$hasil[atribut]</label>
								<div class='col-sm-5'>";

					  $param = mysqli_query($con,"SELECT * FROM nbc_parameter where id_atribut = ".$hasil['id_atribut']." ORDER BY nilai");

					  while($r_param=mysqli_fetch_array($param))
					  {
						  $id_atribut = $hasil['id_atribut'];
						  $nm_param = $r_param['parameter'];
						  $nilai = $r_param['nilai'];
						  echo "<label class='label'><input type='radio' name='atribut_$id_atribut' value='$nilai' required> $nm_param</label>
						  <br>";
					  }
					  echo "</div></div>";
					  $a++;
				  }
				  ?>
					
				  <div class="form-group">
					<div class="col-sm-offset-4 col-sm-5">
					  <button type="submit" class="button but1">Proses</button>
					</div>
				  </div>
				</form>
			
			</div>
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