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
				<?php
					error_reporting(0);
					include "admin/config/koneksi.php"; //memanggil file koneksi_db.php
					include "admin/config/config.php"; //memanggil file fungsi.php
					include "admin/config/fungsi.php"; //memanggil file fungsi.php

					//-- koneksi ke database server dengan extension mysqli 
					$db = new mysqli($host,$user,$pass,$dbname);
					//-- hentikan program dan tampilkan pesan kesalahan jika koneksi gagal 
					if ($db->connect_error) { 
						die('Connect Error ('.$db->connect_errno.')'.$db->connect_error); 
					}

					//-- query untuk mendapatkan semua data atribut di tabel nbc_atribut 
					$sql = 'SELECT * FROM nbc_atribut'; 
					$result = $db->query($sql); 
					//-- menyiapkan variable penampung berupa array 
					$atribut=array(); 
					//-- melakukan iterasi pengisian array untuk tiap record data yang didapat 
					foreach ($result as $row) { 
						$atribut[$row['id_atribut']]=$row['atribut']; 
					}

					//-- query untuk mendapatkan semua data atribut di tabel nbc_atribut 
					$sql = 'SELECT * FROM nbc_parameter ORDER BY id_atribut,id_parameter'; 
					$result = $db->query($sql); 
					//-- menyiapkan variable penampung berupa array 
					$parameter=array(); 
					$id_atribut=0; 
					//-- melakukan iterasi pengisian array untuk tiap record data yang didapat 
					foreach ($result as $row) { 
						if($id_atribut!=$row['id_atribut']){ 
							$parameter[$row['id_atribut']]=array(); 
							$id_atribut=$row['id_atribut']; 
						} 
						$parameter[$row['id_atribut']][$row['nilai']]=$row['parameter']; 
					} 


					//-- query untuk mendapatkan semua data training di tabel nbc_responden dan nbc_data 
					$sql = 'SELECT * FROM nbc_data a JOIN nbc_responden b USING(id_responden) ORDER BY a.id_data'; 
					$result = $db->query($sql); 
					//-- menyiapkan variable penampung berupa array 
					$data=array(); 
					$responden=array(); 
					$id_responden=0; 
					//-- melakukan iterasi pengisian array untuk tiap record data yang didapat 
					foreach ($result as $row) { 
						if($id_responden!=$row['id_responden']){ 
							$responden[$row['id_responden']]=$row['responden']; 
							$data[$row['id_responden']]=array(); 
							$id_responden=$row['id_responden']; 
						} 
						$data[$row['id_responden']][$row['id_atribut']]=$row['id_parameter']; 
					} 

					//-- menampilkan data training dalam bentuk tabel 
					?> 
					<?php  
					$jml_atribut = sizeof($atribut);

					//-- menyiapkan variable penampung utk freq tiap atribut berupa array $freq 
					$freq=array(); 
					//-- inisialisasi data awal $freq 
					for($i=2;$i<=$jml_atribut;$i++){ 
						for($j=0;$j<3;$j++){ 
							for($k=0;$k<3;$k++){ 
								$freq[$i][$j][$k]=0; 
							} 
						} 
					} 
					//-- menyiapkan variable penampung utk freq prior berupa array $prior_freq 
					$prior_freq=array(); 
					//-- iterasi tiap data training 
					foreach($data as $i=>$v){ 
						//-- hitung freq tiap atribut 
						for($j=2;$j<=$jml_atribut;$j++){ 
							$freq[$j][$v[$j]][$v[1]]+=1; 
						} 
						//-- hitung feq prior/kelas 
						if(!isset($prior_freq[$v[1]])) $prior_freq[$v[1]]=0; 
						$prior_freq[$v[1]]+=1; 
					} 
					ksort($prior_freq); 

					//-- menyiapkan variable penampung untuk class probabilities $prior 
					$prior=array(); 
					//-- hitung nilai masing2 class probabilities 
					foreach($prior_freq as $p=>$v){ 
						$prior[$p]=$v/array_sum($prior_freq); 
					} 
					ksort($prior); 
					?> 

					<?php 
					//-- menyiapkan variable penampung utk conditional probabilities $likehood 
					$likehood=array(); 
					//-- iterasi mulai atribut ke-2 sampai terakhir 
					for($i=2;$i<=$jml_atribut;$i++){ 
						//-- iterasi nilai atribut 
						for($j=0;$j<3;$j++){ 
							//-- iterasi nilai kelas 
							for($k=0;$k<3;$k++){ 
								//-- tes kondisi jika terdapat freq yang 0(nol) utk kelas=$k 
								$t_nol=($freq[$i][0][$k]==0 || $freq[$i][1][$k]==0 || $freq[$i][2][$k]==0); 
								//-- lakukan laplace correction jika ditemukan freq 0(nol) $t_nol=true 
								$likehood[$i][$j][$k]=($freq[$i][$j][$k]+($t_nol?1:0))/($prior_freq[$k]+($t_nol?count($prior_freq):0)); 
							} 
						} 
					}


					//-- menyiapkan variabel penampung probabilitas per data training thd kelas 
					$prob=array(); 
					//-- inisialisasi jumlah kumulatif prediksi benar dari data training 
					$right=0; 
					//-- iterasi utk setiap data training 
					foreach($data as $n=>$v){ 
						$m=array(); 
						//-- iterasi utk setiap nilai kelas 
						for($i=0;$i<3;$i++){ 
							//-- inisialisasi probabilitas awal 
							$m[$i]=1; 
							//-- perkalian nilai probabilitas tiap atribut 
							for($j=2;$j<=$jml_atribut;$j++){ 
								$m[$i]*=$likehood[$j][$v[$j]][$i]; 
							} 
							//-- kalikan dengan prior probabilitasnya 
							$m[$i]*=$prior[$i]; 
						} 
						//-- menentukan nilai prediksi kelas per data training 
						$predict[$n]=array_search(max($m),$m); 
						$prob[$n]=$m; 
						//-- hitung kumulatif prediksi yang benar 
						$right+=($predict[$n]==$v[1]?1:0); 
					}

					//-- menyiapkan variabel penampung data inputan 
					$input=array();
					//-- membuat data input simulasi dengan fungsi random untuk masing2 atribut 
					for($i=2;$i<=$jml_atribut;$i++){
						$input[$i]=rand(0,1); 
					}

					$arr_gejala = array();
					//input user
					for ($i=2; $i < 10; $i++) { 
						$input[$i] = $_POST['atribut_'.$i];
						
						$q= mysqli_query($con, "SELECT * FROM nbc_parameter WHERE id_atribut='$i' AND nilai='".$_POST['atribut_'.$i]."' LIMIT 1");
						$h=mysqli_fetch_array($q,MYSQLI_ASSOC);
						$arr_gejala[] = $h['id_parameter'];
					}
					// $input = array(
					//     2 => 0,
					//     3 => 0,
					//     4 => 0,
					//     5 => 0,
					//     6 => 0,
					//     7 => 0,
					//     8 => 1,
					//     9 => 1
					// );
					$m=array(); 
					//-- iterasi utk setiap nilai kelas 
					for($i=0;$i<3;$i++){ 
						//-- inisialisasi probabilitas awal 
						$m[$i]=1; 
						//-- perkalian nilai probabilitas tiap atribut 
						for($j=2;$j<=$jml_atribut;$j++){ 
							$m[$i]*=$likehood[$j][$input[$j]][$i]; 
						} 
						//-- kalikan dengan prior probabilitasnya 
						$m[$i]*=$prior[$i]; 
					} 
					//-- menentukan prediksi nilai kelas, berdasar probabilitas terbesar 
					$result=array_search(max($m),$m);

					//-- menampilkan hasil prediksi nilai kelas 
					?>
					<table class="table table" id="tabel_user">
						<tbody>
						<?php
							echo "<tr>";
							echo "<td>Nama</td>";
							echo "<td>".$_POST['nama']."</td>";
							echo "</tr>";
							foreach($input as $i=>$n){ 
								echo "<tr>";
								echo "<td>{$atribut[$i]}</td>";
								echo "<td>{$parameter[$i][$n]}</td>";
								echo "</tr>";
							}
							echo "<tr>";
							echo "<td>Diagnosa</td>";
							echo "<td><b>";
							echo strtoupper("{$parameter[1][$result]}");
							echo "</b></td>";
							echo "</tr>";
							echo "<tr>";
							echo "<td colspan='2'>dengan probabilitas sebesar <b>{$m[$result]}</b></td>";
							echo "</tr>";
						?>
						</tbody>
					</table>
					<!--input ke database-->
					<?php
					$metode = 'nbc';
					$gejala = implode(',', $arr_gejala);
					$pasien = $_POST['nama'];
					$kesimpulan = ucwords(str_replace('_', ' ', $parameter[1][$result]));

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
						
					}
					else
					{
						echo "Gagal menyimpan ke database...";
					}

					?>			
					<!--input ke database-->
			 </div>
			 <div class="col-lg-4">
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