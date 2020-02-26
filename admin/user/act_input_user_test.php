<?php echo "<h2><a  href='?page=input_user'><i class='fa fa-plus'></i> Tambah User</a></h2><hr>";
 ?>

<div class="jumbotron">

<center><h4>Pengguna</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_input_user">
<br>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="user">
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Nama Pengguna</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama">
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Password</label>
    <div class="col-sm-5">
      <input type="password" class="form-control" name="pass">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Tanggal Lahir</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" id="inputField" name="tgl_lahir" >
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Pekerjaan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="pekerjaan">
    </div>
  </div>
   <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Alamat</label>
    <div class="col-sm-5">
      <textarea class="form-control" rows="5" cols="8" name="alamat"></textarea>
    </div>
  </div> 
  <?php
  $query= mysqli_query($con,"SELECT * FROM daftar_gejala ORDER BY id_gejala");			
  while ($hasil=mysqli_fetch_array($query)) {
  $quer1=mysqli_query($con,"select id_atribut, id_gejala, atribut from daftar_atribut where id_gejala=".$hasil['id_gejala']);
   echo " <div class='form-group'>
			<label for='Gejala' class='col-md-3 col-md-offset-1 control-label'>$hasil[gejala]</label>
			<div class='col-sm-5'>";
				while($r=mysqli_fetch_array($quer1))
				{
				echo				
					  "<input type='hidden' name='gejala' value='$hasil[id_gejala]'>
					  <input type='radio' name='jawab' value='$r[id_atribut]'> $r[atribut]  
					  <br>";
				}
			  echo "</div>
		 </div>";
  }
  ?>
	<div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Hasil Persalinan</label>
    <div class="col-sm-5">
      <select class="form-control" name="hasil_persalinan">
	  <?php
	  $query = mysqli_query($con,"select id_penyakit, penyakit from daftar_penyakit");
	  while ($hasil=mysqli_fetch_array($query))
	  {
		  echo
		  "
			<option value='$hasil[penyakit]'>$hasil[penyakit]</option>
		  ";
	  }
	  ?>
		</select>
    </div>
  </div>
      <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Level</label>
    <div class="col-sm-5">
	    <select class="form-control" name="level">
		  <option value="pasien">Pasien</option>
		  <option value="admin">Admin</option>
		</select>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>
