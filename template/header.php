<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>SiPPerS</title>
<link rel="icon" href="img/favicon.png" type="image/png">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css"> 
<link href="css/style1.css" rel="stylesheet" type="text/css"> 
<link href="css/font-awesome.css" rel="stylesheet" type="text/css"> 
<link href="css/animate.css" rel="stylesheet" type="text/css">
<script href="js/datepicker.js"></script>

 
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
      <div class="logo"><a href="index.php"><img src="img/logo1.png" alt="logo" width="140"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle">
			<ul class="nav navbar-nav" id="mainNav">
			  <?php
				if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
					echo "
						<li class='active'><a href='#hero_section' class='scroll-link'>Home</a></li>
						<li><a href='#aboutUs' class='scroll-link'>Tentang Persalinan</a></li>
						<li><a href='#service' class='scroll-link'>Layanan Kami</a></li>
						<li><a href='#tes_asma' class='scroll-link'>Tes Persalinan</a></li>
						<li><a href='#team' class='scroll-link'>Team</a></li>
						<li><a href='#contact' class='scroll-link'>Metode</a></li>
						<li><a href='login.php' class='scroll-link'>Pakar</a></li>
					";
					}
					elseif($_SESSION['level']== 'admin'){
					echo "
						<li class='active'><a href='#hero_section' class='scroll-link'>Home</a></li>
						<li><a href='#aboutUs' class='scroll-link'>Tentang Persalinan</a></li>
						<li><a href='#service' class='scroll-link'>Layanan Kami</a></li>
						<li><a href='#tes_asma' class='scroll-link'>Tes Persalinan</a></li>
						<li><a href='#team' class='scroll-link'>Team</a></li>
						<li><a href='#contact' class='scroll-link'>Metode</a></li>
						<li><a href='admin/theme/index.php' class='scroll-link'>Admin</a></li>
					";

					}elseif($_SESSION['level']== 'pasien'){
					echo "
						<li class='active'><a href='#hero_section' class='scroll-link'>Home</a></li>
						<li><a href='#aboutUs' class='scroll-link'>Tentang Persalinan</a></li>
						<li><a href='#service' class='scroll-link'>Layanan Kami</a></li>
						<li><a href='#tes_asma' class='scroll-link'>Tes Persalinan</a></li>
						<li><a href='#team' class='scroll-link'>Team</a></li>
						<li><a href='#contact' class='scroll-link'>Metode</a></li>
						<li><a href='logout.php' class='scroll-link'>[$_SESSION[username]] Logout</a></li>
					";
					}
			  ?>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 
