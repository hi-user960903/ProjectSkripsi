<?php echo "<h2><a  href='?page=input_user'><i class='fa fa-code'></i> Pengujian Forward Chainning</a></h2><hr>";
 ?>

<div class="jumbotron">

<center><h4>Pengujian</h4></center>
<br>
<form class="form-horizontal" method="post" action="?page=act_pengujian">
<br>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Nama Pengguna</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama">
    </div>
  </div>
    <?php
  $query= mysqli_query($con,"SELECT * FROM daftar_gejala ORDER BY id_gejala");	
  $a=0;
  while ($hasil=mysqli_fetch_array($query)) {
        $quer1=mysqli_query($con,"select id_atribut, id_gejala, atribut from daftar_atribut where id_gejala=".$hasil['id_gejala']);
        echo " <div class='form-group'>
                    <label for='Gejala' class='col-md-3 col-md-offset-1 control-label'>$hasil[gejala]</label>
                    <div class='col-sm-5'>";
                        while($r=mysqli_fetch_array($quer1))
                        {
                            $id_gejala 	= $hasil['id_gejala'];
                            $atribut 	= $r['atribut'];     
                            $id_atribut = $r['id_atribut']; 
                        echo				
                            "<label><input type='radio' name='gejala[".$id_gejala."]' value='$id_atribut'> $atribut </label>
                            <br>";
                        }
                    echo "</div>
                </div>";
                $a++;
  }
  echo "<input type='hidden' name='count' value='$a'>";
  ?>  
	
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Tambah</button>
    </div>
  </div>
</form>
</div>
