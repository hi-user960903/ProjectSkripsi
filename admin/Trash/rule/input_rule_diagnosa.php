<?php
echo"<h2><a  href='?page=input_rule_diagnosa'><i class='fa fa-plus'></i> Tambah Rule Diagnosa</a></h2><hr>";


?>

<div class="jumbotron">

<center><h4>Rule Diagnosa</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_input_rule_diagnosa">
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Gejala</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="gk">
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Bila Benar</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="bila_benar">
    </div>
  </div>
   <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Bila Salah</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="bila_salah">
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Mulai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="mulai">
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Selesai</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="selesai">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>