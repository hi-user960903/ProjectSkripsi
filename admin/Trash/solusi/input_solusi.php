<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
echo"<h2><a  href='?page=input_solusi'><i class='fa fa-plus'></i> Tambah Solusi</a></h2><hr>";

$query=mysqli_query($con,"SELECT * from daftar_penyakit order by id_penyakit ");
?>

<div class="jumbotron">

<center><h4>Solusi</h4></center>
<br>
<form class="form-horizontal" method="post" action="">
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Id Solusi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="id_solusi">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Solusi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="solusi">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Penyakit</label>
    <div class="col-sm-5">
		<select class="form-control">
<?php
while ($hasil=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
    echo"
		  <option name='id_penyakit'>$hasil[nama_penyakit]</option>";
}
?>
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