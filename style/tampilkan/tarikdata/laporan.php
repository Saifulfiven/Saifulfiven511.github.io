<?php
session_start();
ini_set('max_execution_time', 300); //300 seconds = 5 minutes
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<center>Maaf, Anda Belum Login</center>";
}else{
error_reporting (E_ALL ^ E_NOTICE);
include "koneksi.php";
//include "../../../master/config/tambah.php";
require ("../fungsi/html2pdf/html2pdf.class.php");

$filename="laporan.pdf";
$content = ob_get_clean();
$content = "

<p align=center>LAPORAN KELULUSAN BEASISWA SMA 12 MAKASSAR</p>

<div style='position:absolute;font-size:12px; margin-top:50px; margin-left:70px'>
<table>
	<tr style='background-color:#000; color:#fff;text-align:center;vertical-align:middle'>
		<td id='nomor'>No</td>
		<td>Nis</td>
		<td id='nama'>Nama</td>
		<td>Kelas</td>
		<td>Aspek Ekonomi</td>
		<td>Aspek Akademik</td>
		<td>Total</td>
	</tr>";
	
// pencarian pegawai berdasar divisi tertentu
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
		$content.="
		 <tr style='vertical-align:middle; text-align:center'>
			<td>$no</td>
			<td>$ha[nis]</td>
	        <td>$ha[nama]</td>
	        <td>$ha[nama_kelas]</td>
	        <td>$ha[n_ekonomi]</td>
	        <td>$ha[n_akademik]</td>        
	        <td>$ha[n_total]</td>              
	    
	    </tr>
	    ";
	  $no++;
	}
}
$content.="
	
</table>

<br><br>
<div class='bkd'>
<div class='tanda'>
$jabatan<br>
KOTA MAKASSAR<br><br><br><br>

$tanda<br>
Pangkat: $pangkat<br>
Nip.$nip
</div>
</div>
</div>";
		
			
	// conversion HTML => PDF
	try
	{
		$html2pdf = new HTML2PDF('P','A4(Scaled)','fr', false, 'ISO-8859-15',array(10, 10, 10, 10)); //setting ukuran kertas dan margin pada dokumen anda
		// $html2pdf->setModeDebug();
		$html2pdf->setDefaultFont('Arial');
		$html2pdf->writeHTML("<style>
img{
	width:160px;
	height:180px;
	float:center;
	margin-left:450px;
	margin-bottom:10px;
}
@media print{
	.bkd{
		page-break-after:avoid;
	}
}
.tanda{
	margin-left:850px;
	text-align:center;
}
table{
	border-collapse:collapse;
}
td{
	border:1px;
	width:55;
}
#nomor{
	width:10px;
}
#nama{
	width:190px;
}

</style>");
		$html2pdf->writeHTML($content, isset($_GET['vuehtml']));
		$html2pdf->Output($filename);
	}
	catch(HTML2PDF_exception $e) { echo $e; }

}
?>