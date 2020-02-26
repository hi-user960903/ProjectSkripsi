<?php
error_reporting(0);
echo"<h2><a  href='?page=input_kamus'><i class='fa fa-plus'></i> Tambah Informasi</a></h2><hr>";

$pinjam			= date("d-m-Y");
$tuju_hari		= mktime(0,0,0,date("n"),date("j")+7,date("Y"));
$kembali		= date("d-m-Y", $tuju_hari);

?>

<div class="container">
<div style=" border: 2px solid red;
							   border-left: 7px solid red;
							   padding: 30px;
							   font-size: 14px;
							   border-radius: 20px;">
<form class="form-horizontal" method="post" enctype="multipart/form-data" action="?page=act_input_kamus">
  <div class="form-group">
    <label for="Gejala" class="col-xs-3 control-label">Judul</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama">
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-xs-3 control-label">Keterangan</label>
    <div class="col-sm-5">
      <textarea name="ket" rows="5" cols="60"></textarea>
    </div>
  </div>
    <div class="form-group">
    <label for="Gejala" class="col-xs-3 control-label">Gambar</label>
    <div class="col-sm-5">
      <input type="file" name="fupload" size="80">
    </div>
  </div>
   <div class="form-group">
    <div class="col-sm-offset-3 col-sm-6">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>
</div>

