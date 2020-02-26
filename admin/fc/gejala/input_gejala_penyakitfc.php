<?php
echo"<h2><a  href='?page=input_gejala_penyakitfc'><i class='fa fa-plus'></i> Tambah Gejala Penyakit</a></h2><hr>";

?>
<div class="jumbotron">
<center><h4>Gejala Penyakit</h4></center>
<br/>
<form class="form-horizontal" method="post"  action="?page=act_input_gejala_penyakitfc">
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Kode Gejala</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="kode_gejala" >
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Gejala</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="gejala">
    </div>
  </div>
  
   <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>