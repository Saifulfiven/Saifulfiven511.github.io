<!DOCTYPE html>
    <html>
        <head>            
      <link rel="stylesheet" href="../style/datepicker/css/datepicker.css">
      <script src="../style/datepickerjs/bootstrap.js"></script>
      <script src="../style/datepicker/js/jquery.js"></script>

      <script src="auto/jquery.js"></script>
    <script src="auto/jquery-ui-autocomplete.js"></script>
    <script src="auto/jquery.select-to-autocomplete.min.js"></script>
    <script type="text/javascript" charset="utf-8">
      (function($){
        $(function(){
          $('select').selectToAutocomplete();
          
        });
      })(jQuery);
    </script>
      <style>
    .datepicker{z-index:1151;}
      </style>
      <script>
    $(function(){
        $("#tanggal").datepicker({
      format:'yyyy/mm'
        });
        $(".tanggal1").datepicker({
          format:'yyyy/mm/dd'
        });
        $("#tanggal4").datepicker({
          format:'yyyy/mm'
        });
        $("#tanggal41").datepicker({
          format:'yyyy/mm'
        });
        $("#tanggal42").datepicker({
          format:'yyyy/mm'
        });
        $(".tanggal3").datepicker({
          format:'yyyy/mm/dd'
        });

     });
      </script>
      <script type="text/javascript">
  $(function() {
    
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
        </head><body>
<?php
include "config/koneksi.php";

$query ="SELECT * FROM departments";
$run = mysqli_query($con,$query);
  echo "<form method=POST>
    <select name='DEPTID' style='width:400px'>
      <option value='0' selected='selected'></option>";
      while($qu = mysqli_fetch_array($run)){
        //echo "<option value='$qu[DEPTID]'>$qu[DEPTNAME]</option>";
        echo "<option value='$qu[DEPTID]'>$qu[DEPTNAME]</option>";
      }
      echo "</select>
      
    <input type='submit' value='Submit' name='tekan' class='btn btn-warning'>
  </form>";

if (isset($_POST['tekan']) == 'Submit'){
  $kode = $_POST['DEPTID'];
  
  $que = "SELECT * FROM userinfo,departments WHERE userinfo.DEFAULTDEPTID= '$kode' AND departments.DEPTID = '$kode'";
  $fey = mysqli_query($con,$que);
  $cie = mysqli_fetch_array($fey);
  
 echo "
<center><h4> $cie[DEPTNAME]</h4></center>
  <table cellpadding=0 cellspacing=0 border=0 class='table table-striped table-bordered' id='example'>
  <thead>
   <tr>
     <th>No</th>
     <th>Nama</th>
     <th>NIP</th>
     <th>Unit Kerja</th>
     <th>Tools</th>
     </tr>
   </thead><tbody>
        ";
        $run1 = mysqli_query($con,$que);
        $no = 1;
        
        while($ha = mysqli_fetch_array($run1)){
        echo "<tr>
              <td>$no</td>
              <td>$ha[Name]</td>
              <td>$ha[SSN]</td>
              <td>$ha[DEPTNAME]</td>
              <td><a href='#myModal1$ha[USERID]' role='button' data-toggle='modal' class='btn btn-warning'><i class='icon-pencil icon-white'></i> Berikan Izin</a></td>
      <div id='myModal1$ha[USERID]' class='modal hide fade' tabindex='-1' role='dialog' aria-labelledby='myModalLabel' aria-hidden='true'>
                    <div class='modal-header'>
                            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>&times;</button>
                            <h3 class='judul'>IZIN PEGAWAI</h3>
                    </div>
                    <div class='modal-body'>
                      <form action='file/masuk.php'>
                        <input type='hidden' name='id_pegawai' value='$ha[USERID]'>
                        <input type='hidden' name='depart' value='$ha[DEPTNAME]'>
                        DARI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type='text' class='tanggal1' name='tanggalaw'><br>
                        HINGGA &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <input type='text' class='tanggal3' name='tanggalak'><br>
                        KATEGORI &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: <select name='DATEID'>";
                        echo "<option value='0' selected='selected'></option>";
                        $izin = "SELECT * FROM leaveclass";
                        $runizin = mysqli_query($con,$izin);
                        while($combo = mysqli_fetch_array($runizin)){
                          echo "<option value='$combo[LeaveId]'>$combo[LeaveName]</option>";
                        }
                        echo "</select><br>
                        <br>
                        KETERANGAN : <input type='text' name='alasan'><br>
                        <input type='submit' class='btn btn-warning' value='Kirim'>
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
                 
} 
?>

<div class="container-fluid">               
                <!-- modal tahunan-->
                <div id="myModal5" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="judul">Pilih Bulan & Tahun</h3>
                    </div>
                    <div class="modal-body">
                        <label>Tanggal</label>
                        <input type="text" id="tanggal"><br>
                        <input type="text" name="tanda">&nbsp;Bertanda Tangan<br>
                        <a href='?page=bulan'><button type="button" class="btn btn-warning">Lihat Data</button></a>
                    </div>
                </div>

                                <!-- modal Bulanan-->
                <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="judul">Pilih Bulan & Tahun</h3>
                    </div>
                    <div class="modal-body">
                        <label>Tanggal</label>
                        <input type="text" id="tanggal"><br>
                        <input type="text" name="tanda">&nbsp;Bertanda Tangan<br>
                        <a target='_blank' href='../style/tampilkan/cetak_data.php'><button type="button" class="btn btn-warning">Lihat Data</button></a>
                    </div>
                </div>

                

                <div id="myModal2" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="judul">Pilih Bulan & Tahun</h3>
                    </div>
                    <div class="modal-body">
                        <label>Tanggal</label>
                        <input type="text" id="tanggal1"><br>
                        
                        <a target='_blank' href='stats_bulan.php'><button type="button" class="btn btn-warning">Lihat Data</button></a>
                    </div>
                </div>

                <div id="myModal3" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="judul">Pilih Bulan & Tahun</h3>
                    </div>
                    <div class="modal-body">
                        <label>Tanggal</label>
                        <input type="text" id="tanggal1"><br>
                        
                        <a target='_blank' href='stats.php'><button type="button" class="btn btn-warning">Lihat Data</button></a>
                    </div>
                </div>
                <!-- Modal 4 Pilih Bulan -->
                
                <!-- Modal 6 Pilih Bulan -->
                <div id="myModal6" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="judul">Pilih Bulan & Tahun</h3>
                    </div>
                    <div class="modal-body">
                        <label>Tanggal</label>
                        <input type="text" id="tanggal"><br>
                        <input type="text" name="tanda">&nbsp;Bertanda Tangan<br>
                        <a href="?page=kabag&page=lihat"><button type="button" class="btn btn-warning">Lihat Data</button></a>
                    </div>
                </div>

                <div id="myModal7" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            <h3 class="judul">Pilih Bulan & Tahun</h3>
                    </div>
                    <div class="modal-body">
                        <label>Tanggal</label>
                        <input type="text" id="tanggal"><br>
                        <input type="text" name="tanda">&nbsp;Bertanda Tangan<br>
                        <a href="?page=apa&page=lihatkhusus"><button type="button" class="btn btn-warning">Lihat Data</button></a>
                    </div>
                </div>
            </div>
            
            <!--javascript here-->
            <script src="../style/datepicker/js/bootstrap-modal.js"></script>
            <script src="../style/datepicker/js/bootstrap-transition.js"></script>
            <script src="../style/datepicker/js/bootstrap-datepicker.js"></script> 

