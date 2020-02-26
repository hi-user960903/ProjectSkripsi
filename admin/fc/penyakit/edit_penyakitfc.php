<?php
include "../config/koneksi.php";
echo "<h2><a  href=''><i class='fa fa-edit'></i> Edit Solusi</a></h2><hr>";

$id=$_GET['id'];
if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=penyakitfc'>";
} else {

$query=mysqli_query($con,"SELECT * FROM daftar_penyakit WHERE id_penyakit=$id");
$hasil=mysqli_fetch_array($query,MYSQLI_ASSOC);

$id_gejala		=$hasil['id_penyakit'];
$penyakit		=$hasil['penyakit'];



?>

<div class="jumbotron">
<center><h4>Solusi</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_edit_penyakitfc" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<br>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Solusi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="penyakit" value="<?php echo $penyakit; ?>">
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