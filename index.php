<!doctype html>

<?php
	include_once 'config.php';
	include 'template/header.php';
?>

<!--Hero_Section-->
<section id="hero_section" class="top_cont_outer">
  <div class="hero_wrapper">
    	<?php
		if (isset($_GET['valid'])){
			echo "<div class=\"alert alert-danger\" style=\"position:fixed; width:100%;\">";
			echo "<a href=\"#\" class=\"close\" data-dismiss=\"alert\" aria-label=\"close\">&times;</a>";
			echo "<strong>PERHATIAN!</strong> User ID atau Password Salah.Hanya User yang terdaftar yang dapat mengakses layanan \"TES PERSALINAN\".";
			echo "</div>";
		}
	
	?>
	<?php 
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
	  <?php 
		$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=3");
		$home=mysqli_fetch_array($query);
		$nama  =$home['nama'];
		$gambar=$home['gambar'];
		$ket=$home['ket'];
	?>
        <div class="col-lg-6">
          <div class="service_block">
            <div class="service_icon delay-03s animated wow  zoomIn"><img src="admin/gambar/<?php echo $gambar;?>"/></div>
            <h3 class="animated fadeInUp wow"><?php echo $nama;?></h3>
            <p class="animated fadeInDown wow"><?php echo $ket;?></p>
          </div>
        </div>
	<?php 
		$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=4");
		$home=mysqli_fetch_array($query);
		$nama  =$home['nama'];
		$gambar=$home['gambar'];
		$ket=$home['ket'];
	?>
        <div class="col-lg-6 borderLeft">			
          <div class="service_block">
            <div class="service_icon icon  delay-03s animated wow zoomIn"><img src="admin/gambar/<?php echo $gambar;?>"/></div>
            <h3 class="animated fadeInUp wow"><?php echo $nama;?></h3>
            <p class="animated fadeInDown wow"><?php echo $ket;?></p>
          </div>
        </div>
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
      <div class=" col-lg-4 col-md-4 col-sm-4 col-xs-12 pull-right"><img src="admin/gambar/<?php echo $gambar;?>" class="img-circle delay-03s animated wow zoomIn" alt=""></div>
      	<div class=" col-lg-7 col-md-7 col-sm-7 col-xs-12 pull-left">
        	<div class=" delay-01s animated fadeInDown wow animated">
				<h3><?php echo $nama;?></h3><br/> 
				<p><?php echo $ket;?></p> <br/>
			</div>
			<?php
				echo "<div class=\"work_bottom\"><a href=\"periksa.php\" class=\"contact_btn\">MULAI</a> </div>";
			?>
	   </div>
	</div>
	   
    </div>
  </div> 
  </div>
</section>
<!--Tes Persalinan----> 

<?php 
		$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=6");
		$home=mysqli_fetch_array($query);
		$nama  =$home['nama'];
		$gambar=$home['gambar'];
		$ket=$home['ket'];
	?>

<section class="page_section team" id="team"><!--main-section team-start-->
  <div class="container">
    <h2>TEAM</h2>
    <h6></h6>

<div class="member-area">
					<div class="row">
						<div class="col-md-7 col-md-offset-3">
							<div class="member wow bounceInUp animated">
								<div class="member-container" data-wow-delay=".1s">
									<div class="inner-container">
										<div class="author-avatar">									
											<img class="img-circle" src="admin/gambar/<?php echo $gambar;?>" alt="Team Menber">
										</div><!-- /.author-avatar -->

										<div class="member-details">
											<div class="member-top">									
												<h4 class="name">
													<?php echo $nama;?>
												</h4>
											</div><!-- /.member-top -->

											<p>
											<?php echo $ket;?>
											</p>
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
		<?php 
			$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=7");
			$home=mysqli_fetch_array($query);
			$nama  =$home['nama'];
			$gambar=$home['gambar'];
			$ket=$home['ket'];	
		?>
          <div class="col-lg-3">
            <h2 style="font-size:18pt;"><?php echo $nama;?></h2>
			<p style="text-align:justify;"><?php echo $ket;?></p>
          </div>
        <?php 
			$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=8");
			$home=mysqli_fetch_array($query);
			$nama  =$home['nama'];
			$gambar=$home['gambar'];
			$ket=$home['ket'];
		?>
		<div class="col-lg-3">
			 <h2 style="font-size:18pt;"><?php echo $nama;?></h2>
			 <p style="text-align:justify;"><?php echo $ket;?></p>
          </div>
		<?php 
			$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=9");
			$home=mysqli_fetch_array($query);
			$nama  =$home['nama'];
			$gambar=$home['gambar'];
			$ket=$home['ket'];
		?>
		  <div class="col-lg-3">
			 <h2 style="font-size:18pt;"><?php echo $nama;?></h2>
			 <p style="text-align:justify;"><?php echo $ket;?></p>
          </div>
		<?php 
			$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=10");
			$home=mysqli_fetch_array($query);
			$nama  =$home['nama'];
			$gambar=$home['gambar'];
			$ket=$home['ket'];
		?>
          <div class="col-lg-3">
			 <h2 style="font-size:18pt;"><?php echo $nama;?></h2>
			 <p style="text-align:justify;"><?php echo $ket;?></p>
          </div>
        </div>
      </div>
    </section>
  </div>

<?php
	include_once 'template/footer.php';
?>