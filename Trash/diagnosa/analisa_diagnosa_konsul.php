<?php
include "library/koneksi.php";

$z= mysqli_query($con,"select a.nama as nama, a.kelamin as kelamin, a.alamat as alamat, 
	   a.pekerjaan as pekerjaan, b.nama_kerusakan as nama_kerusakan,  b.penyebab as penyebab, b.solusi as solusi, b.perawatan as perawatan,
	   c.tanggal as tanggal, c.id_ahd as id_ahd
	   from tamu a, solusi b, menganalisa c , memiliki d where a.id_tamu = c.id_tamu and b.id_solusi=d.id_solusi and d.id_kd=c.id_kd  order by c.id_ahd desc limit 1");
	   
$query= mysqli_query($con,"select * from tamu");
$q = mysqli_fetch_array($z);
$id=$q['id_ahd'];
?>
<form  method='post' action='diagnosa/cetak.php'>
<table class="table table-striped table-bordered">	
<thead>
<tbody>
<tr>
<td>Tanggal Kunjung</td>
<td><?php   echo $q['tanggal'];?></td>
<td>
	   <a href="?page=histori"><span>Histori</span> </a>

    </td>
</tr>
<tr>
<td> Nama </td>
<td><?php echo $q['nama']; ?></td>
</tr>
<tr>
<td> Kelamin</td>
<td><?php echo $q['kelamin']; ?></td>
</tr>
<tr>
<td> Alamat</td>
<td> <?php echo $q['alamat']; ?></td>
</tr>
<td> Pekerjaan</td>
<td> <?php echo $q['pekerjaan']; ?> </td>
</tr>
<tr>
<td> Penyakit</td>
<td><?php echo $q['nama_kerusakan']; ?></td>
</tr>
<tr>
<td> Penyebab</td>
<td><?php echo $q['penyebab']; ?></td>
</tr>
<tr>
<td> Solusi</td>
<td><?php echo $q['solusi']; ?></td>
</tr>
<tr>
<td> Perawatan</td>
<td><?php echo $q['perawatan']; ?></td>
</tr>
 <tr>
    
	<td colspan="2">
	 <script>
        function disp_confirm(){
          var r=confirm("Apakah Anda Akan Mengulangi Konsultasi...!!!")
          if (r==true){
            window.location = "index.php?page=solving_konsul&idtanya=2"
          }
        }      
      </script>
      <input type="button" class="btn btn-danger" onclick="disp_confirm()" value="kembali" &nbsp;&nbsp;>
	  
      
	  </td>
	  <td>
	   <input type='hidden' name='id' value='<?php echo $id ;?>'>
	   <button class="btn btn-danger"type='submit'>Print</button>

    </td>
  </tr>
  </thead>
</tbody>
</table>
</form>


