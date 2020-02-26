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

</head>
<body>

<!--Header_section-->
<header id="header_wrapper" style="width:1517;">
  <div class="container">
    <div class="header_box">
      <div class="logo"><a href="index.php"><img src="img/logo1.png" alt="logo" width="140"></a></div>
	  <nav class="navbar navbar-inverse" role="navigation">
      <div class="navbar-header">
        <button type="button" id="nav-toggle" class="navbar-toggle" data-toggle="collapse" data-target="#main-nav"> <span class="sr-only">Toggle navigation</span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
        </div>
	    <div id="main-nav" class="collapse navbar-collapse navStyle" >
			<ul class="nav navbar-nav" id="mainNav">
			  <li><a href="index.php" class="scroll-link">Kembali</a></li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 
<?php 
	if(isset($_GET['pesan'])){
		if($_GET['pesan']=="gagal"){
			echo "<div class='alert' style='width:1517;'>Username dan Password tidak sesuai !</div>";
		}
	}
?>
 
	<div class="kotak_login" style="height:386.8;">
		<center><h4 class="form-login-heading" style="color:green; font-size:22px;">
				Log in SiPPerS</h4><center>
				<hr style="color:blue;">
		<br/><br/>
		<form action="act_login.php" method="post">
			<input type="text" name="username" class="form-control" placeholder="Username" required="required">
			<br> 
			<input type="password" name="password" class="form-control" placeholder="Password" required="required">
 
			<br> <br> <br>
		     <button class="btn btn-info btn-block"  type="submit"><i class="fa fa-lock"></i> SIGN IN</button>
		    <hr>
 
			<br/>
			<br/>
		</form>
	</div>
 

<!--Footer-->
<footer class="footer_wrapper" id="contact_periksa" style="width:1517;">
  <div class="container">
    <section class="page_section contact" id="contact_periksa">
    </section>
  </div>
  <div class="container">
    <div class="footer_bottom"><span>Copyright © 2014 <a href="#">SiPPerS</a>. </span> </div>
  </div>
</footer>

<script type="text/javascript" src="js/jquery-1.11.0.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/jquery-scrolltofixed.js"></script>
<script type="text/javascript" src="js/jquery.nav.js"></script> 
<script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
<script type="text/javascript" src="js/jquery.isotope.js"></script>
<script type="text/javascript" src="js/wow.js"></script> 
<script type="text/javascript" src="js/custom.js"></script>

</body>
</html>
