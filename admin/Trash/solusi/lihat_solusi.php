<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";
echo"<h2><a  href='?page=solusi'><i class='fa fa-list-alt'></i> Data Solusi</a></h2><hr>";


$p      = new Paging;
$batas  = 10;
$posisi = $p->cariPosisi($batas);


$query=mysqlI_query($con,"SELECT * from solusi order by id_solusi  LIMIT $posisi,$batas");
?>
<form method="post" action="?page=input_rule_diagnosa">
<br> 
<br><table class="table table-bordered table-striped">
    <thead class="cf">
    <tr>
	<th>No</th>
	<th>Id Solusi</th>
	<th>Solusi</th>
	<th>Nama Penyakit</th>
	<th colspan='2'><center>Action</th>
	</tr>
	</thead>
    <tbody>
<?php
$no=$posisi+1;;
while ($hasil=mysqli_fetch_array($query,MYSQLI_ASSOC)) {

echo "<tr>
	  <td>$no</td>
	  <td>$hasil[id_solusi]</td>
	  <td>$hasil[solusi]</td>
	  <td></td>
	  <td>
		<center><a href='?page=edit_solusi&id=$hasil[id_solusi]'><button type='button' class='btn btn-theme'><i class='fa fa-edit'></i></button></a></center>
	  </td>
	  <td>
		<center><a href='?page=hapus_solusi&id=$hasil[id_solusi]' onclick='return confirm(\"Anda yakin ingin menghapus data ini ?\")'> <button type='button' class='btn btn-danger'> <i class='fa fa-trash-o'></i></button></a></center>
	  </td>
	  </tr>";
$no++;
}
echo' </tbody></table></form>
<center><button class="btn btn-theme" type="submit" >Tambah</button></center>
';
	$jmldata = mysqli_num_rows(mysqli_query($con,"SELECT * FROM solusi"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";

?>