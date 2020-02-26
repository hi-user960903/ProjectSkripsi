<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
echo"<h2><a  href='?page=input_rulefc'><i class='fa fa-plus'></i> Tambah Gejala Penyakit</a></h2><hr>";

?>
<div class="jumbotron">
<center><h4>Rule Diagnosa Forward Chaining</h4></center>
<br/>
<form class="form-horizontal" method="post"  action="?page=act_input_rulefc">
  <div class="form-group">
    <label for="Gejala" class="col-md-2 control-label">Solusi</label>
    <div class="col-sm-5">
      <select class="form-control" name="id_penyakit">
	<?php 
			$qt= mysqli_query($con,"SELECT * from daftar_penyakit");
			while ($hasil=mysqli_fetch_array($qt)) {
			   echo "
						<option name value='$hasil[id_penyakit]'>$hasil[penyakit]</option>
					";
			}
	  ?>
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-2 control-label">Gejala</label>
    <div class="col-sm-5">
	<?php 
		$sql= mysqli_query($con,"SELECT A.*, B.* FROM daftar_gejala A JOIN daftar_atribut B ON A.id_gejala=B.id_gejala ORDER BY A.id_gejala DESC");
		while ($data=mysqli_fetch_array($sql)) {
	?>
			<input type="checkbox" value="<?=$data['id_atribut']?>" name="gejala[]"> <label for="gejala"> <?=$data['gejala']?> - <?=$data['atribut']?> </label><br>
	
	<?php
		}
	?>
	</div>
  </div>
  
   <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>