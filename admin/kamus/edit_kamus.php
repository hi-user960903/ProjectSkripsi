<?php
error_reporting(0);
include "../config/koneksi.php";
echo "<h2><a  href='?page=edit_kerusakan'><i class='fa fa-edit'></i> Edit Kerusakan</a></h2><hr>";

$id=$_GET['id'];
if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=kamus'>";
} else {

$query=mysqli_query($con,"SELECT * FROM info WHERE id_info=$id");
$hasil=mysqli_fetch_array($query,MYSQLI_ASSOC);
$id  =$hasil['id_info'];
$nama=$hasil['nama'];
$gambar =$hasil['gambar'];
$keterangan=$hasil['ket'];


?>

<div class="jumbotron">
<center><h4>Beranda</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_edit_kamus" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?php echo $id; ?>">
<br>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Edit Beranda</label>
    <div class="col-sm-5">
      <p style="font-size:15px;"><?php echo $nama; ?></p>
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Judul</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Keterangan</label>
    <div class="col-sm-8">
      <textarea name="ket" rows="7" cols="70"><?php echo $keterangan; ?></textarea>
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Upload Gambar</label>
    <div class="col-sm-5">
      <input type="file" name="fupload" size="80">Nama File : <?php echo $gambar;?>, Kosongkan bila 
		File tidak diubah.
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Simpan</button>
    </div>
  </div>
</form>
<?php
}
?>
