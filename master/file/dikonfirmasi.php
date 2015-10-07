<!DOCTYPE html>
<head>
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
</head>
<body>
<?php

require_once "config/tambah.php";

if (isset($_GET['aksi'])){
	if (($_GET['aksi']) == 'hapus'){
		$id = $_GET['id_user'];
		$waktu = $_GET['waktu'];

		hapusizined($id,$waktu,$con);
	}?>
<?php
}
echo "<table cellpadding=0 cellspacing=0 border=0 class='table table-striped table-bordered' id='example'>
		<thead>
		<tr>
			<th>NO</th>
			<th>NAMA</th>
			<th>WAKTU</th>
			<th>KATEGORI</th>
			<th>KETERANGAN</th>
			<th>UNIT KERJA</th>
		</tr>
		</thead>
		<tbody>";
		$us = $_SESSION['username'];
		$ope = mysqli_query($con,"SELECT username,id_user from a_user WHERE username = '$us'");
		$user = mysqli_fetch_array($ope);
		$idnya = $user['id_user'];
$no=1;
$wo = "SELECT * FROM a_user,user_speday,userinfo,leaveclass,departments,konfirmasi WHERE user_speday.USERID = userinfo.USERID AND leaveclass.LeaveId = user_speday.DATEID AND userinfo.DEFAULTDEPTID = departments.DEPTID
		AND user_speday.USERID = konfirmasi.userid AND user_speday.STARTSPECDAY = konfirmasi.startpecday AND konfirmasi.id_user = a_user.id_user AND konfirmasi.id_user = '$idnya'";
$wow = mysqli_query($con,$wo);
while($data = mysqli_fetch_array($wow)){
	$pecah = explode(' ', $data['STARTSPECDAY']);
	$hasil = $pecah[0];

	$pecah1 = explode(' ', $data['ENDSPECDAY']);
	$hasil1 = $pecah1[0];
echo "
	<tr>
		<td>$no</td>
		<td>$data[Name]</td>
		<td>$hasil - $hasil1</td>
		<td>$data[LeaveName]</td>
		<td>$data[YUANYING]</td>
		<td>$data[DEPTNAME]</td>	
	";?>

	<?php echo "
		</tr>
		";
$no++;
}
echo "</tbody></table>";
?>

</body>
</html>