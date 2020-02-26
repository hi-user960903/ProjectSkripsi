<?php echo "<h2><a  href='?page=input_user'><i class='fa fa-plus'></i> Tambah User</a></h2><hr>";
 ?>

<div class="jumbotron">

<center><h4>Pengguna</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_input_user">
<br>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Nama Pengguna</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="nama">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Username</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" name="user">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Password</label>
    <div class="col-sm-4">
      <input type="password" class="form-control" name="pass">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Tanggal Lahir</label>
    <div class="col-sm-4">
      <input type="text" class="form-control" id="inputField" name="tgl_lahir" >
    </div>
  </div> 
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>
