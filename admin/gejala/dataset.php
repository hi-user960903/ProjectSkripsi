<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/fungsi.php";
include "../config/class_paging.php";
echo "<h2><a  href='?page=aturan'><i class='fa fa-list-alt'></i> Tabel Dataset</a></h2><hr>";


$p      = new Paging;
$batas  = 20;
$posisi = $p->cariPosisi($batas);

$atribut =mysqli_query($con,"SELECT * FROM nbc_atribut where id_atribut > 1");
?>

<form method="post" action="" class="col-md-9 col-md-offset-1">
<br><table class="table table-bordered table-striped">
    <thead class="cf">
		<tr>
			<th>No</th>
            <th>Pasien </th>
            <?php
            while ($r_atr=mysqli_fetch_array($atribut)) {
                echo "<th>".$r_atr['atribut']."</th>";
            }
            ?>
			<th>Hasil Diagnosa</th>
		</tr>
	</thead>
<tbody>
<?php
    $dt_set = mysqli_query($con,"SELECT * FROM nbc_responden order by id_responden asc LIMIT $posisi,$batas");
    $no=$posisi+1;
    while($r_dtset = mysqli_fetch_array($dt_set))
    {
        echo "<tr>
            <td>$no</td>
            <td>$r_dtset[responden]</td>";
        
        $dt_gejala = mysqli_query($con,"SELECT * FROM nbc_data as a left join nbc_parameter as b on (a.id_atribut = b.id_atribut AND a.id_parameter = b.nilai) where a.id_responden=".$r_dtset['id_responden']." AND a.id_atribut > 1");
        $dt_hasil = mysqli_query($con,"SELECT * FROM nbc_data as a left join nbc_parameter as b on (a.id_atribut = b.id_atribut AND a.id_parameter = b.nilai) where a.id_responden=".$r_dtset['id_responden']." AND a.id_atribut = 1");

        while($r_gejala = mysqli_fetch_array($dt_gejala))
        {
            echo "<td>".$r_gejala['parameter']."</td>";
        }

        while($r_hasil = mysqli_fetch_array($dt_hasil))
        {
            echo "<td>".$r_hasil['parameter']."</td>";
        }
        
        echo "</tr>";
        $no++;
    }
?>
</tbody>
<?php
echo'</table>';

	$jmldata = mysqli_num_rows(mysqli_query($con, "SELECT * FROM nbc_responden"));
    $jmlhalaman  = $p->jumlahHalaman($jmldata, $batas);
    $linkHalaman = $p->navHalaman($_GET['halaman'], $jmlhalaman);

echo "<div id=paging>Hal: $linkHalaman</div><br>";

?>