<?php
include "../config/koneksi.php";
echo "<h2><a  href='?page=edit_solusi'><i class='fa fa-edit'></i> Edit Solusi</a></h2><hr>";

$id=$_GET['id'];
if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=solusi'>";
} else {

$query=mysqli_query($con,"SELECT * FROM daftar_solusi WHERE id_solusi = $id");
$hasil=mysqli_fetch_array($query,MYSQLI_ASSOC);

$id=$hasil['id_solusi'];
$solusi=$hasil['solusi'];



?>

<div class="jumbotron">

<center><h4>Solusi</h4></center>
<br>
<form class="form-horizontal" method="post" action="">
   <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Id Solusi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="gk" value="<?php echo $id; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Solusi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="gk" value="<?php echo $solusi; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Nama Penyakit</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="bila_benar" value="">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Simpan</button>
    </div>
  </div>
</form>
</div>


<?php
}
?>
