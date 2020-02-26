<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";
echo"<h2><a  href='?page=rulefc'><i class='fa fa-list-alt'></i> Data Rule Foward Chaining</a></h2><hr>";

$p      = new Paging;
$batas  = 10;
$posisi = $p->cariPosisi($batas);

$query=mysqli_query( $con, "SELECT a.*, b.penyakit from rule_base_fc as a
	join daftar_penyakit as b on a.id_penyakit = b.id_penyakit
	order by id asc LIMIT $posisi,$batas");
?>
 
<form method="post" action="?page=input_gejala_penyakitfc" class="col-md-12">
<br>
	<table class="table table-bordered table-striped">
		<thead class="cf">
			<tr>
				<th>No</th>
				<th>Solusi Persalinan </th>
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
				<td>$hasil[penyakit]</td>
				<td> <ol>";
			$arr_atribut = explode(';', $hasil['rule_base']);
			foreach ($arr_atribut as $value)
			{
				if($value && $value != '')
				{
					$q_atribut = mysqli_query($con,"SELECT * from daftar_atribut as a join daftar_gejala as b on a.id_gejala = b.id_gejala where id_atribut = '$value' LIMIT 1");
					$dt_atribut = mysqli_fetch_assoc($q_atribut);

					echo '<li>'.$dt_atribut['gejala'].' - '.$dt_atribut['atribut'].'</li>';
				}
			}
			echo "</ol></td>
				<td>
					<a href='?page=hapus_rulefc&id=$hasil[id]' onclick='return confirm(\"Anda yakin ingin menghapus data ini ?\")'> <button type='button' class='btn btn-danger'> <i class='fa fa-trash-o'></i></button></a>
				</td>
				</tr>";
			$no++;
		}
		?>
		</tbody>
	</table>
<?php

echo'<center><a href="index.php?page=input_rulefc" class="btn btn-theme" type="submit" >Tambah</a></center>';

	$jmldata = mysqli_num_rows(mysqli_query($con, "SELECT * from rule_base_fc as a
	join daftar_penyakit as b on a.id_penyakit = b.id_penyakit
	order by id"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";

?>