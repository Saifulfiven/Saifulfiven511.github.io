
<!DOCTYPE html>
    <html>
        <head>            
      <link rel="stylesheet" href="../style/datepicker/css/datepicker.css">
      <script src="../style/datepicker/js/bootstrap.js"></script>
      
      <script src="js/jquery.js"></script>
      <script>
                       //mengidentifikasikan variabel yang kita gunakan
                var nis;
                var nama;
                var alamat;
                
              $(function(){
                    //$("#nis").load("file/proses.php","op=nis");
                    
                    
                    //jika ada perubahan di kode barang
                    $("#nis").change(function(){
                        nis=$("#nis").val();
                        
                        //tampilkan status loading dan animasinya
                        $("#status").html("loading. . .");
                        $("#loading").show();
                        
                        //lakukan pengiriman data
                        $.ajax({
                            url:"file/proses.php",
                            data:"op=ambildata&nis="+nis,
                            cache:false,
                            success:function(msg){
                                data=msg.split("|");
                                
                                //masukan isi data ke masing - masing field
                                
                                  $("#nama").val(data[0]);
                                  $("#alamat").val(data[1]);
                                  $("#p_ortu").val(data[2]);
                                  $("#jml_saudara").val(data[3]);
                                  $("#nilai").val(data[4]);
                                  $("#kelakuan").val(data[5]);
                                  $("#id_siswa").val(data[6]);
                                                                  
                                //hilangkan status animasi dan loading
                                
                            }
                        });
                    });
    });
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
        </head>

<body>
<?php
include "config/koneksi.php";


  $que = "SELECT * FROM kriteria,data_siswa,data_kelas
          where kriteria.id_siswa = data_siswa.id_siswa and data_kelas.id_kelas = data_siswa.id_kelas
          ORDER BY data_siswa.nis";
  $fey = mysqli_query($con,$que);
  $cie = mysqli_fetch_array($fey);
 echo "<a href='#myModal4' role='button' data-toggle='modal' class='btn btn-primary'>Tambah</a>

<div id='myModal4' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                            <h3 class='judul'>Data Kriteria</h3>
                    </div>
                    <div class='modal-body'>
                        <form method='POST' action='file/proses.php'>
	                    <table>
	                    	";

                        echo "
                        <input type='hidden' name='id_siswa' id='id_siswa'>
                        <tr><td>Nis</td><td><input type='text' name='nis' id='nis'></td><tr>
                        <tr> <td>Nama</td>   <td><input type='text' name='nama' id='nama' readonly></td></tr>
                        <tr> <td>Alamat</td>   <td><textarea name='alamat' id='alamat'  readonly></textarea></td></tr>
                        <tr> <td>Pendapat Orang tua</td>   <td><input type='text' id='p_ortu' name='p_ortu' readonly></td></tr>
                        <tr> <td>Jumlah Saudara</td>   <td><input type='text' name='jml_saudara' id='jml_saudara' readonly></td></tr>
                        <tr> <td>Nilai</td>   <td><input type='text' name='nilai' id='nilai' readonly></td></tr>
                        <tr> <td>Kelakuan</td>   <td><input type='text' name='kelakuan' id='kelakuan' readonly></td></tr>
                        
      
                      	<tr><td colspan='2'><input type='submit' class='btn btn-primary' value='Seleksi' name='kriterianya'></td></tr>
                        </table>
                        </form>
                    </div>";
                    echo '
                </div>
  <table cellpadding=0 cellspacing=0 border=0 class="table table-striped table-bordered" id=example>
  <thead>
   <tr>
     <th>No</th>
     <th>Nis</th>
     <th>Nama</th>
     <th>Kelas</th>
     <th>X1</th>
     <th>X2</th>
     <th>Y1</th>
     <th>Y2</th>
     <th>Aksi</th>
     </tr>
   </thead><tbody>
        ';
        
        $run1 = mysqli_query($con,$que);
        $no = 1;
        while($ha = mysqli_fetch_array($run1)){
          $apa = "SELECT * FROM data_siswa WHERE id_siswa = '$ha[id_siswa]'";
          $ya = mysqli_query($con,$apa);
          $hu = mysqli_fetch_array($ya);
        echo "<tr>
              <td>$no</td>
              <td>$ha[nis]</td>
              <td>$ha[nama]</td>
              <td>$ha[nama_kelas]</td>
              <td>$ha[x1]</td>
              <td>$ha[x2]</td>        
              <td>$ha[y1]</td>
              <td>$ha[y2]</td>
              <td>
              <a href='file/proses.php?kriteria=hapus&id_kriteria=$ha[id_kriteria]' class='btn btn-danger btn-big'><i class='icon-remove icon-white'></i>Hapus</a>
              <a href='#myModal7$ha[id_kriteria]' role='button' data-toggle='modal' class='btn btn-primary'>
              <i class='icon-pencil icon-white'></i>&nbsp;Update</a>
              </td>
      <div id='myModal7$ha[id_kriteria]' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                            <h3 class='judul'>Update Data Siswa</h3>
                    </div>
                    <div class='modal-body'>
                      
                        <form method='POST' action='file/proses.php'>
                          <input type='hidden' name='id_kriteria' value='$ha[id_kriteria]'>
                          NIS    &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='nis' value='$hu[nis]' readonly><br>
                          Nama   &nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='nama' value='$hu[nama]' readonly><br>
                          Alamat   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<textarea name='alamat' readonly>$hu[alamat]</textarea><br>
                          
                          Pendapatan Orang tua   &nbsp;&nbsp;&nbsp;<input type='text' name='p_ortu' value='$hu[p_ortu]' readonly><br>
                          Jumlah Saudara   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='jml_saudara' value='$hu[jml_saudara]' readonly><br>
                          Nilai   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='nilai' value='$hu[nilai]' readonly><br>
                          Kelakuan   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type='text' name='kelakuan' value='$hu[kelakuan]' readonly><br>
                          <input type='submit' class='btn btn-primary' value='Update' name='kriteriaupdate'></td></tr>
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


