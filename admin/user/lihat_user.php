<?php
include "../config/koneksi.php"; //memanggil file koneksi_db.php
echo"<h2><a  href='?page=user'><i class='fa fa-list-alt'></i> User Admin</a></h2><hr>";

?>
	<form method="post" action="?page=input_user" class="col-md-8 col-md-offset-2">
		<table class="table table-bordered table-striped" >
		<thead class="cf">
		<tr>
			<th style="width:30px;" >No</th>
			<th >Username</th>
			<th >Level</th>
			<th >Nama</th>
			<th style="width:100px;">tgl_lahir</th>
			<th colspan="2" class="col-md-1"><center>Action</center></th></tr>
		</thead>
		<tbody>
		<?php
		$query=mysqli_query($con,"SELECT * FROM daftar_user WHERE level='admin' ORDER BY id_user");
		$no=0;
		while ($hasil=mysqli_fetch_array($query)) {
		$no++;
		echo "<tr><td>$no</td>
			  <td>$hasil[username]</td>
			  <td>$hasil[level]</td>
			  <td>$hasil[nama]</td>
			  <td>$hasil[tgl_lahir]</td>
			  <td><a href='?page=edit_user&id=$hasil[id_user]'> <button type='button' class='btn btn-theme'><i class='fa fa-edit'></i></button></a></td>
			  <td><a href='?page=act_hapus_user&id=$hasil[id_user]' onclick='return confirm(\"Anda yakin ingin menghapus data ini ?\")'> <button type='button' class='btn btn-danger'> <i class='fa fa-trash-o'></i></button></a></td></tr>";
		}
		?>
		</tbody>
		</table>
	
	<center><button class="btn btn-theme" type="submit" >Tambah</button></center>
</form> 