<?php
include "../config/koneksi.php";
echo "<h2><a  href='?page=edit_memiliki'><i class='fa fa-edit'></i> Edit Gejala Penyakit</a></h2><hr>";

$id=$_GET['id'];
if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=gejala_penyakit'>";
} else {

$query=mysqli_query($con,"SELECT * FROM daftar_gejala INNER JOIN daftar_atribut ON daftar_gejala.id_gejala=daftar_atribut.id_gejala WHERE id_atribut=$id");
$hasil=mysqli_fetch_array($query,MYSQLI_ASSOC);

$id_gejala=$hasil['id_gejala'];
$gejala =$hasil['gejala'];
$atribut=$hasil['atribut'];



?>

<div class="jumbotron">
<center><h4>Gejala Penyakit</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_edit_gejala_penyakit" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<br>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Gejala Penyakit</label>
    <div class="col-sm-5">
	  <select class="form-control" name="id_gejala">
	<?php 
			$qt= mysqli_query($con,"SELECT * from daftar_gejala");
			while ($hasil=mysqli_fetch_array($qt)) {
			   echo "
						<option value='$hasil[id_gejala]'>$hasil[gejala]</option>
					";
			}
	  ?>
	  </select>
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Atribut Gejala</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="atribut" value="<?php echo $atribut; ?>">
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