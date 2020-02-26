<?php

include "../config/koneksi.php";
include "../config/fungsi.php";
include "../config/class_paging.php";
echo"<h2><a  href='?page=histori'><i class='fa fa-list-alt'></i> Histori Pengujian Naive Bayes</a></h2><hr>";

$p      = new Paging;
$batas  = 10;
$posisi = $p->cariPosisi($batas);

$q_gejala	= 'SELECT * FROM nbc_atribut WHERE id_atribut > 1';
$r_gejala	= mysqli_query($con, $q_gejala);

?>
<div class="col-sm-12">
<table class="table table-bordered table-striped" >
    <thead class="cf">
    <tr>
	<th>No</th>
	<th width="150">Nama Pasien </th>
	<?php
	while($l_gejala = mysqli_fetch_array($r_gejala))
	{
		echo '<th>'.$l_gejala['atribut'].'</th>';
	}
	?>
	<th>Kesimpulan</th>
	</tr>
	</thead>
    <tbody>
<?php
$no=$posisi+1;
$query= mysqli_query($con,"SELECT * FROM riwayat_pengujian WHERE metode='nbc' order by id ASC limit $posisi,$batas");
while ($hasil=mysqli_fetch_array($query,MYSQLI_ASSOC)) {
	echo "<tr>
			<td>$no</td>
			<td>$hasil[pasien]</td>
	";
	$arr_gejala = explode(',',$hasil['gejala']);
	foreach ($arr_gejala as $value)
	{
		$q= mysqli_query($con, "SELECT * FROM nbc_parameter as a JOIN nbc_atribut as b ON  a.id_atribut=b.id_atribut WHERE a.id_parameter='$value' LIMIT 1");
		$h=mysqli_fetch_array($q,MYSQLI_ASSOC);
		echo "<td>$h[parameter]</td>";
	}
	echo "<td>$hasil[kesimpulan]</td>";
	echo "</tr>";
	$no++;
}
echo'</tbody></table></div>';
?>

<?php
	
	echo"<div class=\"col-sm-12\">";
	$jmldata = mysqli_num_rows(mysqli_query($con,"SELECT * FROM riwayat_pengujian WHERE metode='nbc' order by id ASC"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";
?>
</div>