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
				<li><a href='index.php'>Kembali</a></li>
			</ul>
      </div>
	 </nav>
    </div>
  </div>
</header>
<!--Header_section--> 

<?php echo "<h2><a  href='?page=input_user'><i class='fa fa-code'></i> Pengujian Forward Chainning</a></h2><hr>";
 ?>

<div class="jumbotron">

<center><h4>Pengujian</h4></center>
<br>
<form class="form-horizontal" method="post" action="pengujian_fc_act.php">
<br>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-2 control-label">Nama Pengguna</label>
    <div class="col-sm-4    ">
      <input type="text" class="form-control" name="nama">
    </div>
  </div>
    <?php
  $query= mysqli_query($con,"SELECT * FROM daftar_gejala ORDER BY id_gejala");	
  $a=0;
  while ($hasil=mysqli_fetch_array($query)) {
        $quer1=mysqli_query($con,"select id_atribut, id_gejala, atribut from daftar_atribut where id_gejala=".$hasil['id_gejala']);
        echo " <div class='form-group'>
                    <label for='Gejala' class='col-md-3 col-md-offset-2 control-label'>$hasil[gejala]</label>
                    <div class='col-sm-5'>";
                        while($r=mysqli_fetch_array($quer1))
                        {
                            $id_gejala 	= $hasil['id_gejala'];
                            $atribut 	= $r['atribut'];     
                            $id_atribut = $r['id_atribut']; 
                        echo				
                            "<label><input type='radio' name='gejala[".$id_gejala."]' value='$id_atribut'> $atribut </label>
                            <br>";
                        }
                    echo "</div>
                </div>";
                $a++;
  }
  echo "<input type='hidden' name='count' value='$a'>";
  ?>  
	
  <div class="form-group">
    <div class="col-sm-offset-5 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>


<!--Hero_Section--> 
<?php
	include_once 'template/footer.php';
?>