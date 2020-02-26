<?php
include "../config/koneksi.php";
echo "<h2><a  href='?page=edit_memilikifc'><i class='fa fa-edit'></i> Edit Gejala Penyakit</a></h2><hr>";

$id=$_GET['id'];
if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakitfc'>";
} else {

$query=mysqli_query($con,"SELECT * FROM daftar_gejala WHERE id_gejala=$id");
$hasil=mysqli_fetch_array($query,MYSQLI_ASSOC);

$id_gejala=$hasil['id_gejala'];
$kode_gejala=$hasil['kode_gejala'];
$gejala =$hasil['gejala'];

?>

<div class="jumbotron">
<center><h4>Gejala Penyakit</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_edit_gejala_penyakitfc" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<br>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Kode Gejala Penyakit</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="kode_gejala" value="<?php echo $kode_gejala; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Gejala</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="gejala" value="<?php echo $gejala; ?>">
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