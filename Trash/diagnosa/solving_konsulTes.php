<script>
        function disp_confirm(){
          var r=confirm("Apakah Anda Akan Mengulangi Konsultasi...!!!")
          if (r==true){
            window.location = "index.php?page=konsul"
          }
        }      
      </script>
<?php
$id=$_GET['id'];
include("admin/library/koneksi.php");
    if(!isset($_POST['idtanya'])){
        //tampilkan pertanyaan pertama
        $sqlp = "select * from konsul_diagnosa where mulai='Y'";
        $rs=mysqli_query($con,$sqlp);
        $data=mysqli_fetch_array($rs);
        //bentuk pertanyaan
        echo "<form>";
        echo "<CENTER><h2> <font  color='white'>Pertanyaan </font></h2> </CENTER>"; 
		echo "<br/><br/><br/>";
        echo $data['gejala_dan_kerusakan']."<br>";
        echo "<input type='radio' name='idtanya' value='".$data['bila_benar']."'>Ya<br>";
        echo "<input type='radio' name='idtanya' value='".$data['bila_salah']."'>Tidak<br>";
        echo "<input type='submit' value='Lanjut >> ' >";
		echo '<input type="button" onclick="disp_confirm()" value="Batal">';
        echo "</form>";
		
		 }else{
		 //tampilkan pertanyaan pertama
			$idsolusi=$_POST['idtanya'];
			$sqlp = "select * from konsul_diagnosa where id_kd=$idsolusi";
			$rs=mysqli_query($con,$sqlp);
			$data=mysqli_fetch_array($rs);
			
			$NOIP= $_SERVER['REMOTE_ADDR'];
			$q=mysqli_fetch_array(mysqli_query($con,"select * from tamu order by id_tamu desc limit 1"));
			//bentuk pertanyaan
			
			echo "<form method='POST' action='?page=solving_konsulTes'>";
			echo "<CENTER><h2> <font  color='#19bc9c'>Pertanyaan</font></h2> </CENTER>"; 
			echo "<br/><br/><br/>";
			echo $data['gejala_dan_kerusakan']."<br>";
			if($data['selesai']!="Y"){
			echo "<input type='radio' name='idtanya' value='".$data['bila_benar']."'>Ya<br>";
			echo "<input type='radio' name='idtanya' value='".$data['bila_salah']."'>Tidak<br><br><br>";
			echo "<input type='submit' class='btn btn-danger'  value='Lanjut' > &nbsp&nbsp";
			echo '<input type="button" class="btn btn-danger" onclick="disp_confirm()" value="Batal">';
			
			}else{
			
			$query=mysqli_query($con,"insert into menganalisa values('','$q[id_tamu]','$data[id_kd]',NOW())");
			echo "<meta http-equiv='refresh' content='0; url=?page=analisa_diagnosa_konsul'>";
			
			
			//jika ingin menambah pertanyaan
			}
			
			echo "</form>";
			
			}
			
?>
