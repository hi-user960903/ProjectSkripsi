<?php
error_reporting(0);
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";
echo"<h2><a  href='?page=kamus'><i class='fa fa-list-alt'></i> Data Informasi</a></h2><hr>";
?>
 
<form method="post" action="?page=input_kamus">
<br><table class="table table-bordered table-striped ">
    <thead class="cf">
    <tr>
	<th>ID </th>
	<th>JUDUL </th>
	<th>GAMBAR</th>
	<th>KETERANGAN </th>
	<th>Action</th>
	</tr>
	</thead>
    <tbody>
<?php
$no=1;
$query=mysqli_query($con,"SELECT * from info order by id_info ");
while ($hasil=mysqli_fetch_assoc($query)) {

echo "<tr>
	  <td>$hasil[id_info]</td>
	  <td>$hasil[nama]</td>
	  <td><img src='../gambar/$hasil[gambar]' height='50' width='50'></td>
	  <td>$hasil[ket]</td>
	  <td><a href='?page=edit_kamus&id=$hasil[id_info]'> <button type='button' class='btn btn-theme'><i class='fa fa-edit'></i></button></a>
	  </td>
	  </tr>";
$no++;
}
	$jmldata = mysqli_num_rows(mysqli_query($con,"SELECT * FROM info"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";
?></form>