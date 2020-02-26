<!doctype html>

<?php
	include_once 'config.php';
	unset ($_SESSION['keluhan']);
	unset ($_SESSION['jumlah_keluhan']);
	unset ($_SESSION['n_atas1']);
	unset ($_SESSION['n_atas2']);
	unset ($_SESSION['n_atas3']);
?>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, maximum-scale=1">
<title>SiPPerS</title>
<link rel="icon" href="img/favicon.png" type="image/png">
<link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="css/style.css" rel="stylesheet" type="text/css"> 
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

<!--Hero_Section-->
<section id="hero_section" class="top_cont_outer">
  <div class="hero_wrapper">
    	<?php
		if (isset($_GET['valid'])){
			echo "<div class=\"alert alert-danger\" style=\"position:fixed; width:100%;\">";
			echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
			echo "<strong>PERHATIAN!</strong> User ID atau Password Salah.Hanya User yang terdaftar yang dapat mengakses layanan.";
			echo "</div>";
		}
		
		$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=1");
		$home=mysqli_fetch_array($query);
		$nama  =$home['nama'];
		$gambar=$home['gambar'];
		$ket=$home['ket'];
	?>
	<div class="container">
      <div class="hero_section">
        <div class="row">
          <div class="col-lg-5 col-sm-7">
            <div class="top_left_cont zoomIn wow animated"> 
              <h2><?php echo $nama;?></h2>
              <p><?php echo $ket;?></p>
              <a href="#service" class="read_more2">Read more</a> </div>
          </div>
          <div>
			<img src="admin/gambar/<?php echo $gambar;?>" class="bannerImg zoomIn wow animated" alt="" />
		  </div>
        </div>
      </div>
    </div>
  </div>
</section>
<!--Hero_Section--> 

	<?php 
		$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=2");
		$home=mysqli_fetch_array($query);
		$nama  =$home['nama'];
		$gambar=$home['gambar'];
		$ket=$home['ket'];
	?>
<section id="aboutUs"><!--Aboutus-->
<div class="inner_wrapper">
  <div class="container">
    <h2>TENTANG PERSALINAN</h2>
    <div class="inner_section">
	<div class="row">
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right">
		<img src="admin/gambar/<?php echo $gambar;?>" class="img-circle delay-03s animated wow zoomIn" alt="">
	  </div>
      	<div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
        	<div class=" delay-01s animated fadeInDown wow animated">
				<h3><?php echo $nama;?></h3><br/> 
				<p><?php echo $ket;?></p>
			</div>
			<div class="work_bottom"> <span>Want to know more..</span> <a href="#contact" class="contact_btn1">Kerja Sistem</a> </div>       
	   </div>
      	
	</div>
	  
      
    </div>
  </div> 
  </div>
</section>
<!--Aboutus--> 

<!--Service-->
<section  id="service">
  <div class="container">
    <h2>LAYANAN</h2>
    <div class="service_wrapper">
      <div class="row">
        <div class="col-lg-6">
		<?php 
			$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=3");
			$home=mysqli_fetch_array($query);
			$nama  =$home['nama'];
			$gambar=$home['gambar'];
			$ket=$home['ket'];
		?>
          <div class="service_block">
            <div class="service_icon delay-03s animated wow  zoomIn"><img src="admin/gambar/<?php echo $gambar;?>"/></div>
            <h3 class="animated fadeInUp wow"><?php echo $nama;?></h3>
            <p class="animated fadeInDown wow"><?php echo $ket;?></p>
          </div>
        </div>
        <div class="col-lg-6 borderLeft">	
	<?php 
		$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=4");
		$home=mysqli_fetch_array($query);
		$nama  =$home['nama'];
		$gambar=$home['gambar'];
		$ket=$home['ket'];
	?>		
          <div class="service_block">
            <div class="service_icon icon  delay-03s animated wow zoomIn"><img src="admin/gambar/<?php echo $gambar;?>"/></div>
            <h3 class="animated fadeInUp wow"><?php echo $nama;?></h3>
            <p class="animated fadeInDown wow"><?php echo $ket;?></p>
          </div>
        </div>
<!--        
		<div class="col-lg-4 borderLeft">
          <div class="service_block">
            <div class="service_icon icon  delay-03s animated wow zoomIn"><img src="img/consultation.png"/></div>
            <h3 class="animated fadeInUp wow">Konsultasi</h3>
            <p class="animated fadeInDown wow">DiaperS menyediakan tempat untuk berkonsultasi dengan pakar kehamilan sehingga masyarakat lebih leluasa untuk melakukan tanya jawab terkait kehamilan.</p>
          </div>
        </div>
-->		
      </div>
	   </div>
  </div>
</section>
<!--Service-->
	<?php 
		$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=5");
		$home=mysqli_fetch_array($query);
		$nama  =$home['nama'];
		$gambar=$home['gambar'];
		$ket=$home['ket'];
	?>
<!--TesAsma-->
<section id="tes_asma">
<div class="inner_wrapper">
  <div class="container">
    <h2><strong>TES PERSALINAN<strong></h2>
    <div class="inner_section">
	<div class="row">
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"><img src="img/tes.png" class="img-circle delay-03s animated wow zoomIn" alt=""></div>
      	<div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
        	<div class=" delay-01s animated fadeInDown wow animated">
				<h3><?php echo $nama;?></h3><br/> 
				<p><?php echo $ket;?></p> <br/>
			</div>
			<?php
				if (!isset($_SESSION['username'])){
					echo "<div class=\"work_bottom\"><a href=\"login.php\" class=\"contact_btn\">MULAI</a> </div>";
				}
				else if (isset($_SESSION['username'])){
					echo "<div class=\"work_bottom\"><a href=\"periksa.php\" class=\"contact_btn\">MULAI</a> </div>";
				}
			?>
			<div class="work_bottom">	<a href="daftar.php" class="contact_btn">Daftar</a> </div>
	   </div>
	</div>
	   
    </div>
  </div> 
  </div>
</section>
<!--TesAsma----> 

<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    <h2>TEAM</h2>

<div class="member-area">
					<div class="row">
						<div class="col-md-6">
							<div class="member wow bounceInUp animated" >
								<div class="member-container" data-wow-delay=".5s">
									<div class="inner-container">
										<div class="author-avatar">									
											<img class="img-circle" src="img/team_pic3.jpg" alt="Team Menber">
										</div><!-- /.author-avatar -->
										<div class="member-details">
											<div class="member-top">									
												<h4 class="name">
													Willy Koesbandono
												</h4>
												<span class="designation">
													311210047
												</span>
											</div><!-- /.member-top -->
											<p>
												Lorem ipsum dolor sit amet, consectetur adipiscing elit. Proin consequat sollicitudin cursus. Dolor sit amet, consectetur adipiscing elit proin consequat.
											</p>
											<div class="member-social-link">
												<a href="#" class="twitter-btn"><i class="fa fa-twitter"></i></a>
												<a href="#" class="facebook-btn"><i class="fa fa-facebook"></i></a>
												<a href="#" class="dribbble-btn"><i class="fa fa-dribbble"></i></a>
												<a href="#" class="linkedin-btn"><i class="fa fa-linkedin"></i></a>
											</div><!-- /.member-social-link -->
										</div><!-- /.member-details -->
									</div><!-- /.inner-container -->
								</div><!-- /.member-container -->
							</div><!-- /.member -->
						</div>
					</div><!-- /.row -->
				</div>
				

</div>
</section>
<!--/Team-->
<!--Footer-->
<footer class="footer_wrapper" id="contact">
  <div class="container">
    <section class="page_section contact" id="contact">
      <div class="contact_section">
        <h2>METODE</h2>
        <div class="row">
          <div class="col-lg-3">
            <h2 style="font-size:17pt;">Pengetahuan</h2>
			<p style="text-align:justify;">Langkah paling awal untuk membuat sistem pakar adalah dengan menggali informasi tentang suatu masalah yang akan dipecahkan dengan bantuan seorang pakar maupun sumber pengetahuan lainya seperti buku.</p>
          </div>
          <div class="col-lg-3">
			 <h2 style="font-size:17pt;">Naive-Bayes</h2>
			 <p style="text-align:justify;">Data yang didaptakan dari pakar maupun buku berupa probabilitas tentang berapa orang pengidap penyakit asma akut, kronis, serta periodik. Data ini kemudian digunakan untuk menentukan aturan sistem dalam menentukan keputusan.</p>
          </div>
		  <div class="col-lg-3">
			 <h2 style="font-size:17pt;">Forward Chaining</h2>
			 <p style="text-align:justify;">Data yang didaptakan dari pakar maupun buku berupa probabilitas tentang berapa orang pengidap penyakit asma akut, kronis, serta periodik. Data ini kemudian digunakan untuk menentukan aturan sistem dalam menentukan keputusan.</p>
          </div>
          <div class="col-lg-3">
			 <h2 style="font-size:17pt;">Keakuratan</h2>
			 <p>Pada Sistem pakar ini (DiaperS), tingkat keakuratan masih belum maksimal karena data yang diperoleh masih sedikit sehingga masih belum dapat menggantikan pakar yang sesungguhnya.</p>
          </div>
        </div>
      </div>
    </section>
  </div>
  <div class="container">
    <div class="footer_bottom"><span>Copyright © 2014 <a href="index.php">DIAPERS</a>. </span> </div>
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