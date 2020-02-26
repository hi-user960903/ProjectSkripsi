<!doctype html>
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
<link rel="stylesheet" type="text/css" media="all" href="css/jsDatePick_ltr.min.css">
<script type="text/javascript" src="js/jsDatePick.min.1.3.js"></script>
<script type="text/javascript">
	window.onload = function(){
		new JsDatePick({
			useMode:2,
			target:"inputField",
			dateFormat:"%Y-%m-%d",
		});
	};
</script>
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
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<!--daftar-->
<section id="daftar">
	 	<?php
		if (isset($_GET['berhasil'])){
			
			$berhasil = $_GET['berhasil'];
			
			switch ($berhasil){
				case '0':
				echo "<div class=\"alert alert-danger\" style=\"position:fixed; width:100%;\">";
				echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
				echo "<strong>GAGAL INPUT!</strong> User ID atau Password mungkin sudah pernah dipakai \"TES PERSALINAN\".";
				echo "</div>";
				break;
				
				case '1':
				echo "<div class=\"alert alert-success\" style=\"position:fixed; width:100%;\">";
				echo "<a href=\"location:index.php\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
				echo "<strong>BERHASIL!</strong> Selamat anda sudah terdaftar menjadi member \"TES PERSALINAN\".";
				echo "</div>";
				break;
				
			}
		}
	?>
	 <div class="container">
    <section class="page_section contact" id="contact">
      <div class="contact_section">
        <h2>DAFTAR</h2>
      </div>
	  <br/>
	<form class="form-horizontal" method="POST" action="signup.php">
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label"><h4 style="color:black;"><b>Username</b></h4></label>
		<div class="col-sm-10">
		  <input type="text" class="input-text" name="username" placeholder="Username" required>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label"><h4 style="color:black;"><b>Nama Lengkap</b></h4></label>
		<div class="col-sm-10">
		  <input type="text" class="input-text" name="nama" placeholder="Nama Lengkap" required>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputPassword3" class="col-sm-2 control-label"><h4 style="color:black;"><b>Password</b></h4></label>
		<div class="col-sm-10">
		  <input type="password" class="input-text" name="password" placeholder="Password" required>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label"><h4 style="color:black;"><b>Tanggal Lahir</b></h4></label>
		<div class="col-sm-2">
		  <input class="input-text demo_ranged" id="inputField" name="tgl_lahir" required>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label"><h4 style="color:black;"><b>Pekerjaan</b></h4></label>
		<div class="col-sm-10">
		  <input type="text" class="input-text" name="pekerjaan" placeholder="Pekerjaan" required>
		</div>
	  </div>
	  <div class="form-group">
		<label for="inputEmail3" class="col-sm-2 control-label"><h4 style="color:black;"><b>Alamat</b></h4></label>
		<div class="col-sm-10">
		  <textarea rows="5" cols="10" class="form-control" name="alamat"></textarea>
		</div>
	  </div>
	  <div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
		  <input class="input-btn" type="submit" value="DAFTAR">
		</div>
	  </div>
	</form>
    </section>
  </div>
</section>
<!--daftar-->


<?php
	include_once 'template/footer.php';
?>