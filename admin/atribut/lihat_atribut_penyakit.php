<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";

echo"<h2><a  href='?page=atribut_penyakit'><i class='fa fa-list-alt'></i> Data Atribut Gejala Penyakit</a></h2><hr>";

$p      = new Paging;
$batas  = 10;
$posisi = $p->cariPosisi($batas);


$query=mysqli_query( $con, "SELECT * FROM nbc_parameter as a INNER JOIN nbc_atribut as b ON a.id_atribut = b.id_atribut where b.id_atribut > 1 order by b.id_atribut asc LIMIT $posisi,$batas");

?>
 
<form method="post" action="?page=input_atribut_penyakit" class="col-md-10 col-md-offset-1">
<br><table class="table table-bordered table-striped">
    <thead class="cf">
    <tr>
	<th>No</th>
	<th>Nama Gejala </th>
	<th>Atribut Gejala</th>
	</tr>
	</thead>
    <tbody>
<?php
$no=$posisi+1;;
while ($hasil=mysqli_fetch_array($query)) {

echo "<tr>
	  <td> $no</td>
	  <td>$hasil[atribut]</td>
	  <td>$hasil[parameter]</td>
	  </tr>";
$no++;
}

echo'</table>';

	$jmldata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM nbc_parameter as a INNER JOIN nbc_atribut as b ON a.id_atribut = b.id_atribut where b.id_atribut > 1 order by b.id_atribut"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";



?>