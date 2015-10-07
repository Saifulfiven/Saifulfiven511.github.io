
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

echo "
  <a href='../style/tampilkan/tarikdata/laporan.php' target='_blank' class='btn btn-primary'>Laporan</a>
  <table cellpadding=0 cellspacing=0 border=0 class='table table-striped table-bordered' id=example>
  <thead>
   <tr>
     <th>No</th>
     <th>NIS</th>
     <th>Nama</th>
     <th>Kelas</th>
     <th>Aspek Ekonomi</th>
     <th>Aspek Akademik</th>
     <th>Total</th>
     
     
     </tr>
   </thead><tbody>
        ";

        $kel = "SELECT * FROM data_kelas";
        $kelkuery = mysqli_query($con,$kel);
        $no = 1;
        while($yak = mysqli_fetch_array($kelkuery)){
        $que = "SELECT * FROM rangking,data_siswa,data_kelas where 
                data_siswa.id_siswa = rangking.id_siswa and data_kelas.id_kelas = data_siswa.id_kelas and
                 data_siswa.id_kelas = $yak[id_kelas] order by rangking.n_total desc limit 10
               ";
              $jalan = mysqli_query($con,$que);
              
              while($ha = mysqli_fetch_array($jalan)){
              echo "<tr>
                    <td>$no</td>
                    <td>$ha[nis]</td>
                    <td>$ha[nama]</td>
                    <td>$ha[nama_kelas]</td>
                    <td>$ha[n_ekonomi]</td>
                    <td>$ha[n_akademik]</td>        
                    <td>$ha[n_total]</td>              
                </div>
                </tr>
                ";
              $no++;
            }
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


