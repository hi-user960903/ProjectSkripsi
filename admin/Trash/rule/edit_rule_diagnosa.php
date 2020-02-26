<?php
include "../config/koneksi.php";
echo "<h2><a  href='?page=edit_kerusakan'><i class='fa fa-edit'></i> Edit Rule Diagnosa</a></h2><hr>";

$id=$_GET['id'];
if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=rule_diagnosa'>";
} else {

$query=mysqli_query($con,"SELECT * FROM konsul_diagnosa WHERE id_kd=$id");
$hasil=mysqli_fetch_array($query,MYSQLI_ASSOC);

$id=$hasil['id_kd'];
$gk=$hasil['gejala_dan_kerusakan'];
$bila_benar =$hasil['bila_benar'];
$bila_salah=$hasil['bila_salah'];
$mulai =$hasil['mulai'];
$selesai=$hasil['selesai'];


?>

<div class="jumbotron">

<center><h4>Rule Diagnosa</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_edit_rule_diagnosa">
<input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Gejala</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="gk" value="<?php echo $gk; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Bila Benar</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="bila_benar" value="<?php echo $bila_benar; ?>">
    </div>
  </div>
   <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Bila Salah</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="bila_salah" value="<?php echo $bila_salah; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Mulai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="mulai" value="<?php echo $mulai; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Selesai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="selesai" value="<?php echo $selesai; ?>">
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
