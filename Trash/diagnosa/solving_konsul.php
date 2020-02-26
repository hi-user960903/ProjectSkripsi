<script>
        function disp_confirm(){
          var r=confirm("Apakah Anda Akan Mengulangi Konsultasi...!!!")
          if (r==true){
            window.location = "index.php?page=konsul"
          }
        }      
      </script>
<?php
include "admin/config/koneksi.php"; //memanggil file koneksi_db.php
echo "<div class='periksa'>";
echo "<center><u><h2><font  color='white'><strong>Pertanyaan</strong></font></h2></u></center>";
    if(!isset($_GET['idtanya'])){
        //tampilkan pertanyaan pertama
        $sqlp = "select * from konsul_diagnosa where mulai='Y'";
        $rs=mysqli_query($con,$sqlp);
        $data=mysqli_fetch_array($rs);
        //bentuk pertanyaan		
        echo "<form>";
        echo "<p><font color='white'>".$data['gejala_dan_kerusakan']."</font></p>";
        echo " <div class='col-md-1'>
				<div class='radio'>
				<label>
					<font color='white'><input type='radio' name='idtanya' value='".$data['bila_benar']."'>Ya</font>
				</label>
				</div>
			  </div>";
        echo "<div class='col-md-12'>
				<div class='radio'>
				<label>
					<font color='white'><input type='radio' name='idtanya' value='".$data['bila_salah']."'>Tidak</font>
				</label>
				</div>
			  </div> 
			  <br>";
        echo "<button class='btn btn-success'>Selanjutnya</button>";
        echo "</form>";

		 }else{
		 //tampilkan pertanyaan pertama
			$idsolusi=$_GET['idtanya'];
			$sqlp = "select * from konsul_diagnosa where id_kd=$idsolusi";
			$rs=mysqli_query($con,$sqlp);
			$data=mysqli_fetch_array($rs);
			
			$NOIP= $_SERVER['REMOTE_ADDR'];
			$q=mysqli_fetch_array(mysqli_query($con,"select * from daftar_user order by id_user desc limit 1"));
			//bentuk pertanyaan
			
			echo "<form action ='?page=solving_konsultes' method='POST'>";
			echo "<CENTER><h2> <font  color='white'>Pertanyaan </font></h2> </CENTER>"; 
			echo "<br/><br/><br/>";
			
			echo $data['gejala_dan_kerusakan']."<br>";
			if($data['selesai']!="Y"){
			echo "<input type='radio' name='idtanya' value='".$data['bila_benar']."'>Ya<br>";
			echo "<input type='radio' name='idtanya' value='".$data['bila_salah']."'>Tidak<br><br><br>";
			echo "<input type='submit' class='btn btn-danger' value='Lanjut  ' > &nbsp&nbsp";
			echo '<input type="button" class="btn btn-danger" onclick="disp_confirm()" value="Batal">';
			
			
			}else{
			
			$query=mysqli_query("insert into menganalisa values('','$id','$data[id_kd]',NOW())");
			
			echo "<meta http-equiv='refresh' content='0; url=?page=analisa_diagnosa_konsul?id=$id'>";
			
			
			//jika ingin menambah pertanyaan
			}
			
			echo "</form>";
			
			}
echo "</div>";
?>
