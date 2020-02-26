<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";
echo"<h2><a  href='?page=rule_diagnosa'><i class='fa fa-list-alt'></i> Data Rule Diagnosa</a></h2><hr>";


?>
<br> 
<br>
<table class="table table-bordered table-striped">
    <thead class="cf">
		<tr>
			<th>Rule</th>
			<th>Hasil</th>
			<th>Implikasi</th>
		</tr>
	</thead>
    <tbody>
		<tr>
			<td>Jika pernah <b>Melahirkan Sesar</b></td>
			<td>Persalinan Sesar</td>
			<td>Persalinan Normal</td>
		</tr>
	</tbody>
</table>