<?php echo "<h2><a  href='?page=input_user'><i class='fa fa-code'></i> Pengujian Naive Bayes</a></h2><hr>";
 ?>

<div class="jumbotron">

<center><h4>Pengujian</h4></center>
<br>
<form class="form-horizontal" method="POST" action="?page=act_pengujian_nbc">
<br>
    <div class="form-group">
    <label for="Gejala" class="col-md-3 col-md-offset-1 control-label">Nama Pasien</label>
    <div class="col-sm-5">
      <input type="text" class="form-control" name="nama">
    </div>
  </div>
  <?php
  $query= mysqli_query($con,"SELECT * FROM nbc_atribut where id_atribut > 1 ORDER BY id_atribut");	
  $a=0;
  while ($hasil=mysqli_fetch_array($query)) {
      echo " <div class='form-group'>
                <label class='col-md-3 col-md-offset-1 control-label'>$hasil[atribut]</label>
                <div class='col-sm-5'>";

      $param = mysqli_query($con,"SELECT * FROM nbc_parameter where id_atribut = ".$hasil['id_atribut']." ORDER BY nilai");

      while($r_param=mysqli_fetch_array($param))
      {
          $id_atribut = $hasil['id_atribut'];
          $nm_param = $r_param['parameter'];
          $nilai = $r_param['nilai'];
          echo "<label><input type='radio' name='atribut_$id_atribut' value='$nilai' required> $nm_param</label>
          <br>";
      }
      echo "</div></div>";
      $a++;
  }
  ?>
	
  <div class="form-group">
    <div class="col-sm-offset-4 col-sm-5">
      <button type="submit" class="btn btn-theme">Proses</button>
    </div>
  </div>
</form>
</div>
