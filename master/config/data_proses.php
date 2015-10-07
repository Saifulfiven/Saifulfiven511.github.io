
<!DOCTYPE html>
    <html>
        <head>            
      <link rel="stylesheet" href="../style/datepicker/css/datepicker.css">
      <script src="../style/datepicker/js/bootstrap.js"></script>
      
      <script src="js/jquery.js"></script>
      
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
        .kucing{
          width:100px;
          text-align:center;
        }
        </style>
        </head>

<body>
<?php
include "config/koneksi.php";


  
 echo "<a href='#myModal4' role='button' data-toggle='modal' class='btn btn-primary'>Tambah</a>

<div id='myModal4' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                            <h3 class='judul'>Data Kriteria</h3>
                    </div>
                    <div class='modal-body'>
                        <form method='POST' action='file/proses.php'>
	                    <table>
                        <thead>
                          <th>NIS</th>
                          <th>Ekonomi</th>
                          <th>Akademik</th>
                          
                        </thead><tbody>
	                    	";
                        $cek = "SELECT * FROM kriteria,data_siswa,data_kelas where kriteria.id_siswa = data_siswa.id_siswa and data_siswa.id_kelas = data_kelas.id_kelas";
                        $kode = mysqli_query($con,$cek);
                            while($ap = mysqli_fetch_array($kode)){

                              $select = "SELECT * FROM rangking where id_siswa=$ap[id_siswa]";
                              $select1 = mysqli_query($con,$select);
                              $coba = mysqli_fetch_array($select1);
                              if ($coba['id_siswa'] == ""){
                                $ekonomi  = (60*$ap[x1]/100)+(40*$ap[x2]/100);
                                $akademik = (60*$ap[y1]/100)+(40*$ap[y2]/100);
                                $hasil    = $ekonomi + $akademik;
                                
                                echo "
                                <input type='hidden' name='id_siswa[]' value='$ap[id_siswa]'>
                                <input type='hidden' name='n_ekonomi[]' value='$ekonomi'>
                                <input type='hidden' name='n_akademik[]' value='$akademik'>
                                <input type='hidden' name='hasil[]' value='$hasil'>
                                <tr>
                                <td><input type='text' name='nis' value='$ap[nis]' class='kucing' disabled></td>
                                <td><input type='text' value='$ekonomi'  class='kucing' disabled></td>
                                <td><input type='text' value='$akademik' class='kucing' disabled></td>
                                </tr>";

                              }else{
                                echo "";
                              }
                              
                            }

                    echo "
                      	<tr><td colspan='2'><input type='submit' class='btn btn-primary' value='Kirim' name='kelulusan'></td></tr>
                        </tbody>
                        </table>
                        </form>
                    </div>
                    
                </div>
  <table cellpadding=0 cellspacing=0 border=0 class='table table-striped table-bordered' id=example>
  <thead>
   <tr>
     <th>No</th>
     <th>NIS</th>
     <th>Nama</th>
     <th>Aspek Ekonomi</th>
     <th>Aspek Akademik</th>
     <th>Total</th>
     
     <th>Aksi</th>
     </tr>
   </thead><tbody>
        ";
        $que = "SELECT DISTINCT rangking.id_siswa,rangking.id_ranking,rangking.n_ekonomi,rangking.n_akademik,rangking.n_total,data_siswa.nis,data_siswa.nama FROM rangking,data_siswa 
                WHERE rangking.id_siswa = data_siswa.id_siswa";
        $jalan = mysqli_query($con,$que);
        $no = 1;
        while($ha = mysqli_fetch_array($jalan)){
        echo "<tr>
              <td>$no</td>
              <td>$ha[nis]</td>
              <td>$ha[nama]</td>
              <td>$ha[n_ekonomi]</td>
              <td>$ha[n_akademik]</td>        
              <td>$ha[n_total]</td>
              
              <td>
              <a href='file/proses.php?kelulusan=hapus&id_rangking=$ha[id_ranking]' class='btn btn-danger btn-big'><i class='icon-remove icon-white'></i>Hapus</a>
              </td>
              
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


