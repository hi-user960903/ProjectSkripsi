<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";
echo"<h2><a  href='?page=gejalafc'><i class='fa fa-list-alt'></i> Data Gejala Penyakit</a></h2><hr>";

$p      = new Paging;
$batas  = 10;
$posisi = $p->cariPosisi($batas);

$query=mysqli_query( $con, "SELECT * from daftar_gejala order by id_gejala asc LIMIT $posisi,$batas");

?>
 
<form method="post" action="?page=input_gejala_penyakitfc" class="col-md-6 col-md-offset-3">
<br><table class="table table-bordered table-striped">
    <thead class="cf">
    <tr>
	<th>No</th>
	<th>Kode Gejala </th>
	<th>Gejala</th>
	<th colspan='2'>Action</th>
	</tr>
	</thead>
    <tbody>
<?php
$no=$posisi+1;;
while ($hasil=mysqli_fetch_array($query)) {

echo "<tr>
	  <td> $no</td>
	  <td>$hasil[kode_gejala]</td>
	  <td>$hasil[gejala]</td>
	  <td>
		<a href='?page=edit_gejala_penyakitfc&id=$hasil[id_gejala]'> <button type='button' class='btn btn-theme'><i class='fa fa-edit'></i></button></a>
	  </td>
	  <td>
		<a href='?page=hapus_gejala_penyakitfc&id=$hasil[id_gejala]' onclick='return confirm(\"Anda yakin ingin menghapus data ini ?\")'> <button type='button' class='btn btn-danger'> <i class='fa fa-trash-o'></i></button></a>
	  </td>
	  </tr>";
$no++;
}

echo'</table>
<center><button class="btn btn-theme" type="submit" >Tambah</button></center>';

	$jmldata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM daftar_gejala"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";

?></form> 