<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";

echo"<h2><a  href='?page=atribut_penyakitfc'><i class='fa fa-list-alt'></i> Data Atribut Gejala Penyakit</a></h2><hr>";

$p      = new Paging;
$batas  = 10;
$posisi = $p->cariPosisi($batas);


$query=mysqli_query( $con, "SELECT * FROM daftar_gejala INNER JOIN daftar_atribut ON daftar_gejala.id_gejala = daftar_atribut.id_gejala order by daftar_atribut.id_gejala asc LIMIT $posisi,$batas");

?>
 
<form method="post" action="?page=input_atribut_penyakitfc" class="col-md-10 col-md-offset-1">
<br><table class="table table-bordered table-striped">
    <thead class="cf">
    <tr>
	<th>No</th>
	<th>Nama Gejala </th>
	<th>Atribut Gejala</th>
	<th>Action</th>
	</tr>
	</thead>
    <tbody>
<?php
$no=$posisi+1;;
while ($hasil=mysqli_fetch_array($query)) {

echo "<tr>
	  <td> $no</td>
	  <td>$hasil[gejala]</td>
	  <td>$hasil[atribut]</td>	 
	  <td>
		<a href='?page=hapus_atribut_penyakitfc&id=$hasil[id_atribut]' onclick='return confirm(\"Anda yakin ingin menghapus data ini ?\")'> <button type='button' class='btn btn-danger'> <i class='fa fa-trash-o'></i></button></a>
	  </td>
	  </tr>";
$no++;
}

echo'</table>
<center><button class="btn btn-theme" type="submit" >Tambah</button></center>';

	$jmldata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM daftar_gejala INNER JOIN daftar_atribut ON daftar_gejala.id_gejala = daftar_atribut.id_gejala order by daftar_atribut.id_gejala"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";



?>