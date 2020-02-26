<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
echo"<h2><a  href='?page=input_atribut_penyakit'><i class='fa fa-plus'></i> Tambah Atribut Gejala Penyakit</a></h2><hr>";
?>
<div class="jumbotron">
<center><h4>Atribut Gejala Penyakit</h4></center>
<br/>
<form class="form-horizontal" method="post"  action="?page=act_input_atribut_penyakit">
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Gejala</label>
    <div class="col-sm-5">
	  <select class="form-control" name="id_gejala">
	<?php 
			$qt= mysqli_query($con,"SELECT * from daftar_gejala");
			while ($hasil=mysqli_fetch_array($qt)) {
			   echo "
						<option name value='$hasil[id_gejala]'>$hasil[gejala]</option>
					";
			}
	  ?>
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Atribut Gejala</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="atribut">
    </div>
  </div>
  
   <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>