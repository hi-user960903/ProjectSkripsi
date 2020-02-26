<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
echo"<h2><a  href='?page=gejala_penyakit'><i class='fa fa-list-alt'></i> Gejala Penyakit</a></h2><hr>";

?>
<ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item">
    <a  class="btn btn-warning btn-md" id="gejala-tab" data-toggle="tab" href="#gejala" role="tab" aria-controls="gejala" aria-selected="false">Gejala Penyakit</a>
  </li>
  <li class="nav-item">
    <a class="btn btn-warning btn-md" class="nav-link" id="atribut-tab" data-toggle="tab" href="#atribut" role="tab" aria-controls="atribut" aria-selected="false">Atribut Gejala Penyakit</a>
  </li>
</ul>
<br/>	
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade" id="gejala" role="tabpanel" aria-labelledby="gejala-tab">
	<?php 
		require_once "../gejala/lihat_gejala_penyakit.php";
	?>
  </div>
  <div class="tab-pane fade" id="atribut" role="tabpanel" aria-labelledby="atribut-tab">
	  <?php 
		require_once "../gejala/lihat_atribut_penyakit.php";
	?>
  </div>
</div>

