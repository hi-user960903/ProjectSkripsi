<?php
echo"<h2><a  href='?page=input_penyakitfc'><i class='fa fa-plus'></i> Tambah Solusi</a></h2><hr>";
?>

<div class="jumbotron">

<center><h4>Solusi</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_input_penyakitfc">
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Solusi</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="penyakit">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>