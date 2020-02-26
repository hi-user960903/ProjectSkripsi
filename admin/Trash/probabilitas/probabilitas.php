<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";
echo"<h2><a  href='?page=aturan'><i class='fa fa-list-alt'></i> Tabel Probabilitas</a></h2><hr>";


$p      = new Paging;
$batas  = 20;
$posisi = $p->cariPosisi($batas);
?>

<form method="post" action="" class="col-md-9 col-md-offset-1">
<br><table class="table table-bordered table-striped">
    <thead class="cf">
		<tr>
			<th>No</th>
			<th>Gajala </th>
			<th>Atribut Gejala</th>
			<th>Jumlah</th>
			<th>Persalinan Normal</th>
			<th>Persalinan Sectio Caesarea</th>
			<th>P(Xi|C) Persalinan Normal</th>
			<th>P(Xi|C) Persalinan Sectio Caesarea</th>
		</tr>
	</thead>
 <tbody>
	<tr>
		<td></td>
		<td></td>
		<td></td>
<?php   
$a =mysqli_num_rows(mysqli_query($con,"SELECT hasil FROM daftar_user where daftar_user.level='pasien'"));
$b = mysqli_num_rows(mysqli_query($con,"SELECT hasil FROM daftar_user where hasil='Persalinan Normal'"));
$c = mysqli_num_rows(mysqli_query($con,"SELECT hasil FROM daftar_user where hasil='Persalinan Sectio Caesarea'"));
$ab =@($b / $a);
$ab_format=number_format($ab,4);
$ac =@($c / $a);
$ac_format=number_format($ac,4);
echo "  <td>$a</td>
		<td>$b</td>
		<td>$c</td>
		<td>$ab_format</td>
		<td>$ac_format</td>
	</tr>";
?>	
<?php
$query=mysqli_query($con,"SELECT * FROM daftar_gejala INNER JOIN daftar_atribut ON daftar_gejala.id_gejala = daftar_atribut.id_gejala order by daftar_atribut.id_gejala asc LIMIT $posisi,$batas");
$no=$posisi+1;;
while ($hasil=mysqli_fetch_array($query)) {

echo "<tr>
	  <td> $no</td>
	  <td>$hasil[gejala]</td>
	  <td>$hasil[atribut]</td>";
$data = mysqli_num_rows(mysqli_query($con,"SELECT * FROM daftar_memiliki where id_atribut=".$hasil['id_atribut']));
echo "<td>$data</td>";
$dpn = mysqli_num_rows(mysqli_query($con,"SELECT a.*,b.* FROM daftar_memiliki a, daftar_user b where a.id_user=b.id_user AND b.hasil='Persalinan Normal' AND a.id_atribut=".$hasil['id_atribut']));
echo "<td>$dpn</td>";
$dpc = mysqli_num_rows(mysqli_query($con,"SELECT a.*,b.* FROM daftar_memiliki a, daftar_user b where a.id_user=b.id_user AND b.hasil='Persalinan Sectio Caesarea' AND a.id_atribut=".$hasil['id_atribut']));
echo "<td>$dpc</td>";
$htgnor =@($dpn / $data);
echo "<td>$htgnor</td>";
$htgsec =@($dpc / $data);
echo "<td>$htgsec</td>
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