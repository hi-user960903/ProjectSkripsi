<!DOCTYPE html>
<?php
session_start();
include "../config/fungsi2.php";
include "../config/koneksi.php";

function logout() {
	session_start();
	session_destroy();
	echo "<meta http-equiv='refresh' content='0; url=../index.php'>";
}
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "
 <center>Untuk mengakses sistem, Anda harus login <br>";
  echo "<a href=../index.php><b>LOGIN</b></a></center>";
}
else{

$utama='
            <div class="jumbotron" style="background-color:#033; color:#f90; border-radius: 20px;" >
			<div class="container">
                 <h1>Hello,'.$_SESSION['username'].'</h1>
					<p>Selamat Datang di Halaman Admin</p>
            </div>
			</div>

';

include "../theme/header.php";
?>


  <body>

  <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><img  src="" > <b>SiPPerS (Sistem Pengambilan Keputusan Persalinan)</b></a>
            <!--logo end-->
            
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
                    <li><a class="logout" href="../../logout.php">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
<?php

include "../theme/sidebar.php";

?>
      
      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
				
              <div class="row">
                  <div class="col-lg-12 main-chart">
                  
                  	<?php 
	$page	= isset($_GET['page']) ? $_GET['page'] : "";
			
	if(strstr($page,"gejala")) {
	$j="";
	} else if(strstr($page,"atribut_penyakit")) {
	$j="";
	} else if(strstr($page,"penyakit")) {
	$j="";
	} else if(strstr($page,"solusi")) {
	$j="";
	} else if(strstr($page,"kamus")) {
	$j="";
	} else if(strstr($page,"histori")) {
	$j="";
	} else if(strstr($page,"user")) {
	$j="";
	} else if(strstr($page,"pertanyaan")) {
	$j="";
	}  else if(strstr($page,"diagnosa")) {
	$j="";
	}
	else {
	$j="";
	} 
	echo $j;
	?>

    
    <?php 
	
	//menu kamus
	if($page=="kamus") {
	include "../kamus/lihat_kamus.php";
	} else if($page=="input_kamus") {
	include "../kamus/$page.php";
	} else if($page=="act_input_kamus") {
	include "../kamus/$page.php";
	} else if($page=="edit_kamus") {
	include "../kamus/$page.php";
	} else if($page=="act_edit_kamus") {
	include "../kamus/$page.php";
	} else if($page=="hapus_kamus") {
	include "../kamus/$page.php";
	
	//======== akhir menu kamus =========
	
	//menu gejala
	}else if($page=="gejala_penyakit") {
	include "../gejala/lihat_gejala_penyakit.php";
	} else if($page=="input_gejala_penyakit") {
	include "../gejala/$page.php";
	} else if($page=="act_input_gejala_penyakit") {
	include "../gejala/$page.php";
	} else if($page=="edit_gejala_penyakit") {
	include "../gejala/$page.php";
	} else if($page=="act_edit_gejala_penyakit") {
	include "../gejala/$page.php";
	} else if($page=="hapus_gejala_penyakit") {
	include "../gejala/$page.php";
	
	//======== akhir menu Rule =========
	
	
	//menu atribut gejala
	}else if($page=="atribut_penyakit") {
	include "../atribut/lihat_atribut_penyakit.php";
	} else if($page=="input_atribut_penyakit") {
	include "../atribut/$page.php";
	} else if($page=="act_input_atribut_penyakit") {
	include "../atribut/$page.php";
	} else if($page=="edit_atribut_penyakit") {
	include "../atribut/$page.php";
	} else if($page=="act_edit_atribut_penyakit") {
	include "../atribut/$page.php";
	} else if($page=="hapus_atribut_penyakit") {
	include "../atribut/$page.php";

	//======== akhir menu Rule =========

	}else if($page=="dataset") {
	include "../gejala/dataset.php";
	
	//======== akhir menu Rule =========
	
	//Forward chaining
	
	//menu gejala
	}else if($page=="gejala_penyakitfc") {
	include "../fc/gejala/lihat_gejala_penyakitfc.php";
	} else if($page=="input_gejala_penyakitfc") {
	include "../fc/gejala/$page.php";
	} else if($page=="act_input_gejala_penyakitfc") {
	include "../fc/gejala/$page.php";
	} else if($page=="edit_gejala_penyakitfc") {
	include "../fc/gejala/$page.php";
	} else if($page=="act_edit_gejala_penyakitfc") {
	include "../fc/gejala/$page.php";
	} else if($page=="hapus_gejala_penyakitfc") {
	include "../fc/gejala/$page.php";
	
	//======== akhir menu Rule =========
	
	//menu atribut gejala
	}else if($page=="atribut_penyakitfc") {
	include "../fc/atribut/lihat_atribut_penyakitfc.php";
	} else if($page=="input_atribut_penyakitfc") {
	include "../fc/atribut/$page.php";
	} else if($page=="act_input_atribut_penyakitfc") {
	include "../fc/atribut/$page.php";
	} else if($page=="edit_atribut_penyakitfc") {
	include "../fc/atribut/$page.php";
	} else if($page=="act_edit_atribut_penyakitfc") {
	include "../fc/atribut/$page.php";
	} else if($page=="hapus_atribut_penyakitfc") {
	include "../fc/atribut/$page.php";

	//======== akhir menu Rule =========
	
	//menu penyakit
	}else if($page=="penyakitfc") {
	include "../fc/penyakit/lihat_penyakitfc.php";
	} else if($page=="input_penyakitfc") {
	include "../fc/penyakit/input_penyakitfc.php";
	} else if($page=="act_input_penyakitfc") {
	include "../fc/penyakit/act_input_penyakitfc.php";
	} else if($page=="edit_penyakitfc") {
	include "../fc/penyakit/edit_penyakitfc.php";
	} else if($page=="act_edit_penyakitfc") {
	include "../fc/penyakit/act_edit_penyakitfc.php";
	} else if($page=="hapus_penyakitfc") {
	include "../fc/penyakit/hapus_penyakitfc.php";
	
	//======== akhir menu Rule =========
	
	//menu rule FC
	} else if($page=="rulefc") {
	include "../fc/rulefc/lihat_rulefc.php";
	} else if($page=="input_rulefc") {
	include "../fc/rulefc/$page.php";
	} else if($page=="act_input_rulefc") {
	include "../fc/rulefc/$page.php";
	} else if($page=="hapus_rulefc") {
	include "../fc/rulefc/$page.php";
	
	//menu modul
	} else if($page=="histori") {
	include "../histori/histori.php";
	} else if($page=="histori_nbc") {
	include "../histori/histori_nbc.php";
	} else if($page=="caridata_histori") {
	include "../histori/$page.php";
	} else if($page=="act_input_modul") {
	include "../modul/$page.php";
	} else if($page=="hapus_modul") {
	include "../modul/$page.php";
	} else if($page=="edit_modul") {
	include "../modul/$page.php";
	} else if($page=="act_edit_modul") {
	include "../modul/$page.php";
	//======== akhir menu histori/modul =========
	
	//menu user
	} else if($page=="user") {
	include "../user/lihat_user.php";
	} else if($page=="input_user") {
	include "../user/$page.php";
	} else if($page=="act_input_user") {
	include "../user/$page.php";
	} else if($page=="edit_user") {
	include "../user/$page.php";
	} else if($page=="act_edit_user") {
	include "../user/$page.php";
	} else if($page=="act_hapus_user") {
	include "../user/$page.php";
	}
	
	// Pengujian FC
	else if($page=="pengujian") {
		include "../user/$page.php";
	}
	else if($page=="act_pengujian") {
		include "../user/$page.php";
	}

	// Pengujian NBC
	else if($page=="pengujian_nbc") {
		include "../user/$page.php";
	}
	else if($page=="act_pengujian_nbc") {
		include "../user/$page.php";
	}
	//==========  akhir menu user  =================
	
	//======== akhir menu diagnosa =========
	
	
	
	
	
	//log out	
	else if($page=="logout") {
	logout();
	} else {
	echo $utama;
	//include 'coba.php';
	}
	}
	
	?>

                    
                    				
					
					
					

    </div><!-- /col-lg-12 END SECTION MIDDLE -->
                  
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
                  
              </div>    
              </div><! --/row -->
          </section>
      </section>
		<br><br><br>
      <!--main content end-->
<?php

include "../theme/footer.php";
?>