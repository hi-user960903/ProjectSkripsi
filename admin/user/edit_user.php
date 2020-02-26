<?php
include "../config/koneksi.php";
echo "<h2><a  href='?page=edit_user'><i class='fa fa-edit'></i> Edit User</a></h2><hr>";


$id=$_GET['id'];
if ($id=="") {
echo "<script>alert('Pilih dulu data yang akan di-update');</script>";
echo "<meta http-equiv='refresh' content='0; url=?page=user'>";
} else {

$query=mysqli_query($con,"SELECT * FROM daftar_user WHERE id_user=$id");
$hasil=mysqli_fetch_array($query);
$id  =$hasil['id_user'];
$user=$hasil['username'];
$pass=$hasil['password'];
$nama = $hasil['nama'];
$tgl_lahir = $hasil['tgl_lahir'];
$level = $hasil['level'];

?>

<div class="jumbotron">

<center><h4>Pengguna</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_edit_user">
<input type="hidden" name="id" value="<?php echo $id; ?>">
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Username</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="user" value="<?php echo $user; ?>">
    </div>
  </div>
      <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Nama Pengguna</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama" value="<?php echo $nama; ?>">
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Tanggal Lahir</label>
    <div class="col-sm-5">
		<input type="text" class="form-control" id="inputField" name="tgl_lahir" value="<?php echo $tgl_lahir; ?>">
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
