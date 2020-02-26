<?php
error_reporting(0);
include "../config/koneksi.php"; //memanggil file koneksi_db.php
include "../config/config.php"; //memanggil file fungsi.php
include "../config/fungsi.php"; //memanggil file fungsi.php

//-- koneksi ke database server dengan extension mysqli 
$db = new mysqli($host,$user,$pass,$dbname);
//-- hentikan program dan tampilkan pesan kesalahan jika koneksi gagal 
if ($db->connect_error) { 
	die('Connect Error ('.$db->connect_errno.')'.$db->connect_error); 
}

//-- query untuk mendapatkan semua data atribut di tabel nbc_atribut 
$sql = 'SELECT * FROM nbc_atribut'; 
$result = $db->query($sql); 
//-- menyiapkan variable penampung berupa array 
$atribut=array(); 
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat 
foreach ($result as $row) { 
    $atribut[$row['id_atribut']]=$row['atribut']; 
}

//-- query untuk mendapatkan semua data atribut di tabel nbc_atribut 
$sql = 'SELECT * FROM nbc_parameter ORDER BY id_atribut,id_parameter'; 
$result = $db->query($sql); 
//-- menyiapkan variable penampung berupa array 
$parameter=array(); 
$id_atribut=0; 
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat 
foreach ($result as $row) { 
    if($id_atribut!=$row['id_atribut']){ 
        $parameter[$row['id_atribut']]=array(); 
        $id_atribut=$row['id_atribut']; 
    } 
    $parameter[$row['id_atribut']][$row['nilai']]=$row['parameter']; 
} 


//-- query untuk mendapatkan semua data training di tabel nbc_responden dan nbc_data 
$sql = 'SELECT * FROM nbc_data a JOIN nbc_responden b USING(id_responden) ORDER BY a.id_data'; 
$result = $db->query($sql); 
//-- menyiapkan variable penampung berupa array 
$data=array(); 
$responden=array(); 
$id_responden=0; 
//-- melakukan iterasi pengisian array untuk tiap record data yang didapat 
foreach ($result as $row) { 
    if($id_responden!=$row['id_responden']){ 
        $responden[$row['id_responden']]=$row['responden']; 
        $data[$row['id_responden']]=array(); 
        $id_responden=$row['id_responden']; 
    } 
    $data[$row['id_responden']][$row['id_atribut']]=$row['id_parameter']; 
} 
//-- Header
echo"<h2><i class='fa fa-list-alt'></i> Hasil Perhitungan Naive Bayes</h2><hr>";

//-- menampilkan data training dalam bentuk tabel 
?> 
<table border='1' class="table table-bordered table-striped"> 
<caption>TABEL 1 : Data Training</caption> 
<tr><th>Responden</th> 
<?php  
$jml_atribut = sizeof($atribut);
//-- menampilkan header table 
for($i=2;$i<=$jml_atribut;$i++){  
    echo "<th>{$atribut[$i]}</th>"; 
} 
?> 
<th><?php echo $atribut[1];?></th></tr> 
<?php 
//-- menampilkan data secara literal 
foreach($data as $id_responden=>$dt_atribut){ 
    echo "<tr><td>{$responden[$id_responden]}</td>"; 
    for($i=2;$i<=$jml_atribut;$i++){  
        echo "<td>{$parameter[$i][$dt_atribut[$i]]}</td>"; 
    } 
    echo "<td>{$parameter[1][$dt_atribut[1]]}</td></tr>"; 
} 
?> 
</table>


<?php 
//-- menyiapkan variable penampung utk freq tiap atribut berupa array $freq 
$freq=array(); 
//-- inisialisasi data awal $freq 
for($i=2;$i<=$jml_atribut;$i++){ 
    for($j=0;$j<3;$j++){ 
        for($k=0;$k<3;$k++){ 
            $freq[$i][$j][$k]=0; 
        } 
    } 
} 
//-- menyiapkan variable penampung utk freq prior berupa array $prior_freq 
$prior_freq=array(); 
//-- iterasi tiap data training 
foreach($data as $i=>$v){ 
    //-- hitung freq tiap atribut 
    for($j=2;$j<=$jml_atribut;$j++){ 
        $freq[$j][$v[$j]][$v[1]]+=1; 
    } 
    //-- hitung feq prior/kelas 
    if(!isset($prior_freq[$v[1]])) $prior_freq[$v[1]]=0; 
    $prior_freq[$v[1]]+=1; 
} 
ksort($prior_freq); 
//-- menampilkan tabel frekuensi/jumlah data kelas 
?> 
<table border='1' class="table table-bordered table-striped"> 
<caption>TABEL 2 : Jumlah Data Kelas <?php echo $atribut[1];?></caption> 
<tr><?php foreach($parameter[1] as $nilai=>$param){ echo "<th>{$param}</th>"; }?></tr> 
<tr><?php foreach($prior_freq as $nilai=>$nfreq){ echo "<td>{$nfreq}</td>"; }?></tr> 
</table> 
<?php  
//-- menampilkan tabel frekuensi/jumlah data tiap atribut 
for($i=2;$i<=$jml_atribut;$i++){ 
    echo "<table border='1' class='table table-bordered table-striped'>"; 
    //-- caption tabel utk masing-masing atribut 
    echo "<caption>TABEL ".($i+1)." : Jumlah Data Atribut {$atribut[$i]}</caption>"; 
    echo "<tr><th rowspan='2'>{$atribut[1]}</th><th colspan='3'>{$atribut[$i]}</th></tr><tr>";  
    //-- item nilai literal tiap atribut 
    foreach($parameter[$i] as $nilai=>$param){  
        echo "<th>{$param}</th>";  
    } 
    echo "</tr>"; 
    //-- iterasi utk tiap nilai kelas 
    foreach($parameter[1] as $n=>$p){ 
        echo "<tr><td>{$p}</td>"; 
        //-- iterasi jumlah data/freq tiap nilai atribut 
        for($j=0;$j<=2;$j++){ 
        echo "<td>{$freq[$i][$j][$n]}</td>"; 
        } 
        echo "</tr>"; 
    } 
    echo "</table>"; 
} 


//-- menyiapkan variable penampung untuk class probabilities $prior 
$prior=array(); 
//-- hitung nilai masing2 class probabilities 
foreach($prior_freq as $p=>$v){ 
    $prior[$p]=$v/array_sum($prior_freq); 
} 
ksort($prior); 
?> 
<table border='1' class="table table-bordered table-striped">  
<caption>TABEL 8 : Probabilitas Kelas <?php echo $atribut[1];?></caption>  
<tr><?php foreach($parameter[1] as $nilai=>$param){ echo "<th>{$param}</th>"; }?></tr>  
<tr><?php foreach($prior as $nilai=>$nprior){ echo "<td>{$nprior}</td>"; }?></tr>  
</table> 


<?php 
//-- menyiapkan variable penampung utk conditional probabilities $likehood 
$likehood=array(); 
//-- iterasi mulai atribut ke-2 sampai terakhir 
for($i=2;$i<=$jml_atribut;$i++){ 
    //-- iterasi nilai atribut 
    for($j=0;$j<3;$j++){ 
        //-- iterasi nilai kelas 
        for($k=0;$k<3;$k++){ 
            //-- tes kondisi jika terdapat freq yang 0(nol) utk kelas=$k 
            $t_nol=($freq[$i][0][$k]==0 || $freq[$i][1][$k]==0 || $freq[$i][2][$k]==0); 
            //-- lakukan laplace correction jika ditemukan freq 0(nol) $t_nol=true 
            $likehood[$i][$j][$k]=($freq[$i][$j][$k]+($t_nol?1:0))/($prior_freq[$k]+($t_nol?count($prior_freq):0)); 
        } 
    } 
} 
//-- menampilkan tabel probabilitas tiap atribut  
for($i=2;$i<=$jml_atribut;$i++){  
    echo "<table border='1' class='table table-bordered table-striped'>";  
    //-- caption tabel utk masing-masing atribut  
    echo "<caption>TABEL ".($i+7)." : Probabilitas Atribut {$atribut[$i]}</caption>";  
    echo "<tr><th rowspan='2'>{$atribut[1]}</th><th colspan='3'>{$atribut[$i]}</th></tr><tr>";  
    //-- item nilai literal tiap atribut  
    foreach($parameter[$i] as $nilai=>$param){   
        echo "<th>{$param}</th>";   
    }  
    echo "</tr>";  
    //-- iterasi utk tiap nilai kelas  
    foreach($parameter[1] as $n=>$p){  
        echo "<tr><td>{$p}</td>";  
        //-- iterasi probabilitas tiap nilai atribut  
        for($j=0;$j<=2;$j++){  
            echo "<td>{$likehood[$i][$j][$n]}</td>";  
        }  
        echo "</tr>";  
    }  
    echo "</table>";  
} 


//-- menyiapkan variabel penampung probabilitas per data training thd kelas 
$prob=array(); 
//-- inisialisasi jumlah kumulatif prediksi benar dari data training 
$right=0; 
//-- iterasi utk setiap data training 
foreach($data as $n=>$v){ 
    $m=array(); 
    //-- iterasi utk setiap nilai kelas 
    for($i=0;$i<3;$i++){ 
        //-- inisialisasi probabilitas awal 
        $m[$i]=1; 
        //-- perkalian nilai probabilitas tiap atribut 
        for($j=2;$j<=$jml_atribut;$j++){ 
            $m[$i]*=$likehood[$j][$v[$j]][$i]; 
        } 
        //-- kalikan dengan prior probabilitasnya 
        $m[$i]*=$prior[$i]; 
    } 
    //-- menentukan nilai prediksi kelas per data training 
    $predict[$n]=array_search(max($m),$m); 
    $prob[$n]=$m; 
    //-- hitung kumulatif prediksi yang benar 
    $right+=($predict[$n]==$v[1]?1:0); 
} 
//-- menampilkan prosentase data training yg diprediksi benar 
echo "Correctly Classified Instance = ".($right/count($data)*100)."% <br>"; 
//-- menampilkan prosentase data training yg diprediksi tidak benar 
echo "Incorrectly Classified Instance = ".((1-$right/count($data))*100)."% <br>"; 



//-- menyiapkan variabel penampung data inputan 
$input=array();
//-- membuat data input simulasi dengan fungsi random untuk masing2 atribut 
for($i=2;$i<=$jml_atribut;$i++){
    $input[$i]=rand(0,1); 
}

$arr_gejala = array();
//input user
for ($i=2; $i < 10; $i++) { 
    $input[$i] = $_POST['atribut_'.$i];
    
    $q= mysqli_query($con, "SELECT * FROM nbc_parameter WHERE id_atribut='$i' AND nilai='".$_POST['atribut_'.$i]."' LIMIT 1");
    $h=mysqli_fetch_array($q,MYSQLI_ASSOC);
    $arr_gejala[] = $h['id_parameter'];
}
// $input = array(
//     2 => 0,
//     3 => 0,
//     4 => 0,
//     5 => 0,
//     6 => 0,
//     7 => 0,
//     8 => 1,
//     9 => 1
// );
$m=array(); 
//-- iterasi utk setiap nilai kelas 
for($i=0;$i<3;$i++){ 
    //-- inisialisasi probabilitas awal 
    $m[$i]=1; 
    //-- perkalian nilai probabilitas tiap atribut 
    for($j=2;$j<=$jml_atribut;$j++){ 
        $m[$i]*=$likehood[$j][$input[$j]][$i]; 
    } 
    //-- kalikan dengan prior probabilitasnya 
    $m[$i]*=$prior[$i]; 
} 
//-- menentukan prediksi nilai kelas, berdasar probabilitas terbesar 
$result=array_search(max($m),$m);

//-- menampilkan hasil prediksi nilai kelas 
$s_list=array(); 
foreach($input as $i=>$n){ 
    $s_list[]="<b>{$atribut[$i]}</b>=<i>{$parameter[$i][$n]}</i>"; 
} 
echo "Untuk ".implode(' , ',$s_list).". Terdiagnosa: <br> <center><h4><b><i>{$parameter[1][$result]}</i></b></h4></center>"; 
echo "<center>dengan probabilitas sebesar <b>{$m[$result]}</b> </center>";

$metode = 'nbc';
$gejala = implode(',', $arr_gejala);
$pasien = $_POST['nama'];
$kesimpulan = ucwords(str_replace('_', ' ', $parameter[1][$result]));

$q_history = "INSERT INTO riwayat_pengujian (id,
						metode,
						gejala,
						pasien,
						kesimpulan)
					VALUE (NULL,
						'$metode',
						'$gejala',
						'$pasien',
						'$kesimpulan')
						";

if (mysqli_query($con, $q_history) === TRUE)
{
    
}
else
{
    echo "Gagal menyimpan ke database...";
}

?>