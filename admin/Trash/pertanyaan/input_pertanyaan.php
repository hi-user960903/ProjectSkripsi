<?php
echo"<h2><a  href='?page=input_pertanyaan'><i class='fa fa-plus'></i> Tambah Pertanyaan</a></h2><hr>";

?>
<div class="jumbotron">
<center><h4>Pertanyaan</h4></center>
<br/>
<form class="form-horizontal" method="post"  action="">
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Id Pertanyaan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="id_pert"  disabled>
    </div>
  </div>
  <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Pertanyaan</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="pertanyaan">
    </div>
  </div>
  
   <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>