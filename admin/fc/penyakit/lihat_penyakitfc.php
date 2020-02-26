<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";
echo"<h2><a  href='?page=penyakitfc'><i class='fa fa-list-alt'></i> Data Solusi</a></h2><hr>";


$p      = new Paging;
$batas  = 10;
$posisi = $p->cariPosisi($batas);


$query=mysqli_query($con,"SELECT * from daftar_penyakit order by id_penyakit  LIMIT $posisi,$batas");
?>

<form method="post" action="?page=input_penyakitfc" class="col-md-6 col-md-offset-3">
<br><table class="table table-bordered table-striped">
    <thead class="cf">
    <tr>
	<th>No</th>
	<th>Id Solusi </th>
	<th>Solusi</th>
	<th colspan='2'>Action</th>
	</tr>
	</thead>
    <tbody>
<?php
$no=$posisi+1;;
while ($hasil=mysqli_fetch_array($query)) {

echo "<tr>
	  <td> $no</td>
	  <td>$hasil[id_penyakit]</td>
	  <td>$hasil[penyakit]</td>
	  <td>
		<a href='?page=hapus_penyakitfc&id=$hasil[id_penyakit]' onclick='return confirm(\"Anda yakin ingin menghapus data ini ?\")'> <button type='button' class='btn btn-danger'> <i class='fa fa-trash-o'></i></button></a>
	  </td>
	  </tr>";
$no++;
}

echo'</table>
<center><button class="btn btn-theme" type="submit" >Tambah</button></center>';

	$jmldata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM daftar_penyakit"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";



?>