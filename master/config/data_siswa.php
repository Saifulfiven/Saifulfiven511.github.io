<!DOCTYPE html>
    <html>
        <head>            
      <link rel="stylesheet" href="../style/datepicker/css/datepicker.css">
      <script src="../style/datepicker/js/bootstrap.js"></script>
      <script src="../style/datepicker/js/jquery.js"></script>
<script type="text/javascript">
function confirm() {
var msg;
msg = alert('Yakin Ingin Menghapus Data ? ');
var agree=confirm(msg);
if (agree){
	return true ;
}else{
	return false ;
}
</script>
<script>
      function formatCurrency(num) {
num = num.toString().replace(/\$|\,/g,'');
if(isNaN(num))
num = "0";
sign = (num == (num = Math.abs(num)));
num = Math.floor(num*100+0.50000000001);
cents = num%100;
num = Math.floor(num/100).toString();
if(cents<10)
cents = "0" + cents;
for (var i = 0; i < Math.floor((num.length-(1+i))/3); i++)
num = num.substring(0,num.length-(4*i+3))+'.'+
num.substring(num.length-(4*i+3));
return (((sign)?'':'-') + 'Rp. ' + num + ',' + cents);
}
      </script>
      
  <style>
         .feli{
             background:#078cd8;
             padding:2px 5px 2px 5px;
             margin-right:5px;
             color:#fff;
             border-radius:3px;
        }
        .feli:hover{
             background:#33aef4;
             padding:2px 5px 2px 5px;
             margin-right:5px;
             color:#000;
             line:none;
             border-radius:3px;
        }
        </style>
        </head><body>
<?php
include "config/koneksi.php";


  $que = "SELECT * FROM data_siswa,data_kelas where data_siswa.id_kelas = data_kelas.id_kelas";
  $fey = mysqli_query($con,$que);
  $cie = mysqli_fetch_array($fey);
 echo "<a href='#myModal4' role='button' data-toggle='modal' class='btn btn-primary'>Tambah</a>

<div id='myModal4' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                            <h3 class='judul'>Data Siswa</h3>
                    </div>
                    <div class='modal-body'>
                        <form method='POST' action='file/proses.php'>
	                    <table>
	                    	
                        <tr> <td>NIS</td>		<td><input type='text' name='nis' required></td></tr>
                        <tr> <td>Nama</td>   <td><input type='text' name='nama'></td></tr>
                        <tr> <td>Alamat</td>   <td><textarea name='alamat'></textarea></td></tr>
                        <tr> <td>Jenis Kelamin</td>   <td><select name='jkel'>
                                                  <option value='L'>Laki-laki</option>
                                                  <option value='P'>Perempuan</option>
                                                  </select>
                                                  </td></tr>
                        <tr> <td>Pendapat Orang tua</td>   <td><input type='text' autocomplete='off' name='p_ortu' id='num' onkeyup=document.getElementById('format').innerHTML=formatCurrency(this.value); required></td></tr>
                        
                        <tr><td>&nbsp;</td><td><span id='format'> </span></td></tr>
                        <tr> <td>Jumlah Saudara</td>   <td><input type='text' name='jml_saudara'></td></tr>
                        <tr> <td>Nilai</td>   <td><input type='text' name='nilai'></td></tr>
                        <tr> <td>Kelakuan</td>   <td><select name='kelakuan'>
                                                        <option value='Sangat Buruk'>Sangat Buruk</option>
                                                        <option value='Buruk'>Buruk</option>
                                                        <option value='Cukup'>Cukup</option>
                                                        <option value='Baik'>Baik</option>
                                                        <option value='Sangat Baik'>Sangat Baik</option>
                                                      </select></td></tr>

                        <tr> <td>Kelas</td>   <td>
                                <select name='id_kelas'>
                                ";
                                $perintah = "SELECT * FROM data_kelas";
                                $eks = mysqli_query($con,$perintah);
                                while($kelas = mysqli_fetch_array($eks)){
                                  echo "<option value='$kelas[id_kelas]'>$kelas[nama_kelas]</option>";
                                }
                                echo "<select></td></tr>
      
                      	<tr><td colspan='2'><input type='submit' class='btn btn-primary' value='Tambah' name='siswa'></td></tr>
                        </table>
                        </form>
                    </div>
                    
                </div>
  <table cellpadding=0 cellspacing=0 border=0 class='table table-striped table-bordered' id=example>
  <thead>
   <tr>
     <th>No</th>
     <th>Nis</th>
     <th>Nama</th>
     <th>Alamat</th>
     <th>Jkel</th>
     <th>Pendapatan Ortu</th>
     <th>Saudara</th>
     <th>Nilai</th>
     <th>Kelakuan</th>
    <th>Kelas</th>
     <th>Aksi</th>
     </tr>
   </thead><tbody>
        ";
        
        $run1 = mysqli_query($con,$que);
        $no = 1;
        while($ha = mysqli_fetch_array($run1)){
        echo "<tr>
              <td>$no</td>
              <td>$ha[nis]</td>
              <td>$ha[nama]</td>          
              <td>$ha[alamat]</td>
              <td>$ha[jkel]</td>        
              <td>$ha[p_ortu]</td>
              <td>$ha[jml_saudara]</td>
              <td>$ha[nilai]</td>
              <td>$ha[kelakuan]</td>
              <td>$ha[nama_kelas]</td>
              <td>
              <a href='file/proses.php?siswa=hapus&id_siswa=$ha[id_siswa]' class='btn btn-danger btn-big'><i class='icon-remove icon-white'></i>Hapus</a>
              <a href='#myModal7$ha[id_siswa]' role='button' data-toggle='modal' class='btn btn-primary'>
              <i class='icon-pencil icon-white'></i>&nbsp;Update</a>
              </td>
      <div id='myModal7$ha[id_siswa]' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                            <h3 class='judul'>Update Data Siswa</h3>
                    </div>
                    <div class='modal-body'>
                      
                        <form method='POST' action='file/proses.php'>
                        	<input type='hidden' name='id_siswa' value='$ha[id_siswa]'>
	                      	NIS		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='nis' value='$ha[nis]'><br>
                          Nama   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='nama' value='$ha[nama]'><br>
                          Alamat   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name='alamat'>$ha[alamat]</textarea><br>
                          Jenis Kelamin   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<select name='jkel'>";
                                  if ($ha['jkel'] == "L"){
                                      echo "<option value='L' selected>Laki-laki</option>";
                                      echo "<option value='P'>Perempuan</option>";
                                  }else{
                                      echo "<option value='L'>Laki-laki</option>";
                                      echo "<option value='P' selected>Perempuan</option>";
                                  }
                          echo "</select><br>

                          Pendapatan Orang tua   &nbsp;&nbsp;&nbsp;<input type='text' name='p_ortu' value='$ha[p_ortu]'><br>
                          Jumlah Saudara   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='jml_saudara' value='$ha[jml_saudara]'><br>
                          Nilai   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='nilai' value='$ha[nilai]'><br>
                          Kelakuan   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <select name='kelakuan'>";
                      		if ($ha['kelakuan'] == "Sangat Buruk"){
                                   echo "<option value='Sangat Buruk' selected>Sangat Buruk</option>
                                        <option value='Buruk'>Buruk</option>
                                        <option value='Cukup'>Cukup</option>
                                        <option value='Baik'>Baik</option>
                                        <option value='Sangat Baik'>Sangat Baik</option>";
                                  }elseif ($ha['kelakuan'] == "Buruk"){
                                   echo "<option value='Sangat Buruk'>Sangat Buruk</option>
                                        <option value='Buruk' selected>Buruk</option>
                                        <option value='Cukup'>Cukup</option>
                                        <option value='Baik'>Baik</option>
                                        <option value='Sangat Baik'>Sangat Baik</option>";
                                  }elseif ($ha['kelakuan'] == "Cukup"){
                                   echo "<option value='Sangat Buruk'>Sangat Buruk</option>
                                        <option value='Buruk'>Buruk</option>
                                        <option value='Cukup' selected>Cukup</option>
                                        <option value='Baik'>Baik</option>
                                        <option value='Sangat Baik'>Sangat Baik</option>";
                                  }elseif ($ha['kelakuan'] == "Baik"){
                                   echo "<option value='Sangat Buruk'>Sangat Buruk</option>
                                        <option value='Buruk'>Buruk</option>
                                        <option value='Cukup'>Cukup</option>
                                        <option value='Baik' selected>Baik</option>
                                        <option value='Sangat Baik'>Sangat Baik</option>";
                                  }elseif ($ha['kelakuan'] == "Sangat Baik"){
                                   echo "<option value='Sangat Buruk'>Sangat Buruk</option>
                                        <option value='Buruk'>Buruk</option>
                                        <option value='Cukup'>Cukup</option>
                                        <option value='Baik'>Baik</option>
                                        <option value='Sangat Baik' selected>Sangat Baik</option>";
                                  }
                                  echo "</select><br>Kelas &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name='id_kelas'>";
                                  $per = "SELECT * FROM data_kelas";
                                  $jal = mysqli_query($con,$per);
                                  while($kel = mysqli_fetch_array($jal)){
                                    if ($ha['id_kelas'] == $kel['id_kelas']){
                                        echo "<option value='$kel[id_kelas]' selected>$kel[nama_kelas]</option>";
                                    }else{
                                        echo "<option value='$kel[id_kelas]'>$kel[nama_kelas]</option>";
                                    }
                                  }
                                  echo "</select><br>
                        	<input type='submit' class='btn btn-primary' value='Update' name='siswaup'>                        
                        </form>
                    
                    </div>
          </div>
          </tr>
          ";
        $no++;

      }
      echo "
        </body>
  </table>";
 
?>

<div class="container-fluid">
                
            </div>
            
            <!--javascript here-->
            <script src="../style/datepicker/js/bootstrap-modal.js"></script>
            <script src="../style/datepicker/js/bootstrap-transition.js"></script>
            <script src="../style/datepicker/js/bootstrap-datepicker.js"></script> 


