<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";
echo"<h2><a  href='?page=gejala'><i class='fa fa-list-alt'></i> Data Gejala Penyakit</a></h2><hr>";


$p      = new Paging;
$batas  = 10;
$posisi = $p->cariPosisi($batas);


$query=mysqli_query( $con, "SELECT * from nbc_atribut where id_atribut > 1 order by id_atribut asc LIMIT $posisi,$batas");

?>
 
<form method="post" action="?page=input_gejala_penyakit" class="col-md-6 col-md-offset-3">
<br><table class="table table-bordered table-striped">
    <thead class="cf">
    <tr>
	<th>No</th>
	<th>Kode Gejala </th>
	<th>Gejala</th>
	</tr>
	</thead>
    <tbody>
<?php
$no=$posisi+1;;
while ($hasil=mysqli_fetch_array($query)) {

echo "<tr>
	  <td> $no</td>
	  <td>G$hasil[id_atribut]</td>
	  <td>$hasil[atribut]</td>
	  </tr>";
$no++;
}

echo'</table>';

	$jmldata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM nbc_atribut where id_atribut > 1"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";



?>