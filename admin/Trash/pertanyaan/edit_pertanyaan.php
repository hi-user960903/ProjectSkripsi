<?php
include "../config/koneksi.php";
echo "<h2><a  href='?page=edit_memiliki'><i class='fa fa-edit'></i> Edit Gejala Penyakit</a></h2><hr>";

$id=$_GET['id'];
if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakit'>";
} else {

$query=mysqli_query($con,"SELECT * FROM memiliki WHERE id_kd=$id");
$hasil=mysqli_fetch_array($query,MYSQLI_ASSOC);

$id_kd=$hasil['id_kd'];
$id_solusi =$hasil['id_solusi'];



?>

<div class="jumbotron">
<center><h4>Rule Diagnosa</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_edit_memiliki" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<br>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Id Gejala Penyakit</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="id_kd" value="<?php echo $id_kd; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Id Solusi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="id_solusi" value="<?php echo $id_solusi; ?>">
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