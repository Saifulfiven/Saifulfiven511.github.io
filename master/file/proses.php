<?php
include "../config/koneksi.php";
$op=isset($_GET['op'])?$_GET['op']:null;


if(isset($_POST['siswa']) == 'Tambah'){
	$nis 			= $_POST['nis'];
	$nama 			= $_POST['nama'];
	$alamat 		= $_POST['alamat'];
	$jkel 			= $_POST['jkel'];
	$p_ortu 		= $_POST['p_ortu'];
	$jml_saudara 	= $_POST['jml_saudara'];
	$nilai 			= $_POST['nilai'];
	$kelakuan 		= $_POST['kelakuan'];
	$nama_kelas		= $_POST['id_kelas'];


		$ha = "INSERT INTO data_siswa (nis,nama,alamat,jkel,p_ortu,jml_saudara,nilai,kelakuan,id_kelas) VALUES ('$nis','$nama','$alamat','$jkel','$p_ortu','$jml_saudara','$nilai','$kelakuan','$nama_kelas')";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Siswa Berhasil diTambahkan');window.location = '../data_siswa.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Penginputan Data'); window.location = '../data_siswa.php';</script>
	<?php
		}

}elseif(isset($_POST['siswaup']) == 'Update'){
	$id_siswa		= $_POST['id_siswa'];
	$nis 			= $_POST['nis'];
	$nama 			= $_POST['nama'];
	$alamat 		= $_POST['alamat'];
	$jkel 			= $_POST['jkel'];
	$p_ortu 		= $_POST['p_ortu'];
	$jml_saudara 	= $_POST['jml_saudara'];
	$nilai 			= $_POST['nilai'];
	$kelakuan 		= $_POST['kelakuan'];
	$id_kelas		= $_POST['id_kelas'];

	$ha = "UPDATE data_siswa SET nis= '$nis',
								 nama = '$nama',
								 alamat = '$alamat',
								 jkel = '$jkel',
								 p_ortu = '$p_ortu',
								 jml_saudara = '$jml_saudara',
								 nilai = '$nilai',
								 kelakuan = '$kelakuan',
								 id_kelas = '$id_kelas' 
		    WHERE id_siswa = '$id_siswa'";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Siswa Berhasil diUpdate');window.location = '../data_siswa.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Pengupdaten Data'); window.location = '../data_siswa.php';</script>
	<?php
		}
}elseif(isset($_GET['siswa']) == 'hapus'){
	$id		= $_GET['id_siswa'];

	$quer = "DELETE FROM data_siswa WHERE id_siswa = '$id'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Siswa Telah Dihapus !!!');
				window.location = '../data_siswa.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Penghapusan Data !!!');
				window.location = '../data_siswa.php';
			</script>
		<?php
		}
}elseif($op=='ambildata'){
    $nis=$_GET['nis'];
    $dt = "select * from data_siswa where nis='$nis'";
    $data = mysqli_query($con,$dt);
    $d=mysqli_fetch_array($data);
    
    echo $d['nama']."|".$d['alamat']."|".$d['p_ortu']."|".$d['jml_saudara']."|".$d['nilai']."|".$d['kelakuan']."|".$d['id_siswa']."|";    
}elseif(isset($_POST['kriterianya']) == 'Seleksi'){
	$id_siswa		= $_POST['id_siswa'];
	
	$p_ortu 		= $_POST['p_ortu'];
	$jml_saudara 	= $_POST['jml_saudara'];
	
	$nilai 			= $_POST['nilai'];
	$kelakuan 		= $_POST['kelakuan'];

	if (($p_ortu > "800000") && ($p_ortu <= "1000000")){
		$x1 = "1";
	}elseif (($p_ortu > "700000") && ($p_ortu <= "800000")){
		$x1 = "2";
	}elseif (($p_ortu > "600000") && ($p_ortu <= "700000")){
		$x1 = "3";
	}elseif (($p_ortu > "500000") && ($p_ortu <= "600000")){
		$x1 = "4";
	}else{
		$x1 = "5";
	}

	if ($jml_saudara == '1'){
		$x2 = 1;
	}elseif($jml_saudara == '2'){
		$x2 = 2;
	}elseif($jml_saudara == '3'){
		$x2 = 3;
	}elseif($jml_saudara == '4'){
		$x2 = 4;
	}else{
		$x2 = 5;
	}

	if ($nilai == "7.0"){
		$y1 = "1";
	}elseif(($nilai > "7.0") && ($nilai <= "7.5")){
		$y1 = "2";
	}elseif(($nilai > "7.5") && ($nilai <= "8.0")){
		$y1 = "3";
	}elseif(($nilai > "8.0") && ($nilai <= "8.5")){
		$y1 = "4";
	}else{
		$y1 = "5";
	}

	if ($kelakuan == "Sangat Buruk"){
		$y2 = "1";
	}elseif ($kelakuan == "Buruk"){
		$y2 = "2";
	}elseif ($kelakuan == "Cukup"){
		$y2 = "3";
	}elseif ($kelakuan == "Baik"){
		$y2 = "4";
	}else{
		$y2 = "5";
	}
		$cari = "SELECT * FROM kriteria where id_siswa = '$id_siswa'";
		$eks = mysqli_query($con,$cari);
		$qwery = mysqli_fetch_array($eks);
		if ($qwery['id_siswa'] == ""){
		$ha = "INSERT INTO kriteria (id_siswa,x1,x2,y1,y2) VALUES ('$id_siswa','$x1','$x2','$y1','$y2')";
		$query = mysqli_query($con,$ha);
		?>
			<script>alert('Sukses !!!, Data Kriteria Siswa Berhasil ditambahkan');window.location = '../input_kriteria.php';</script>
		<?php
		}else{
			?>
			<script>alert('Maaf, Data Ini Telah Terdaftar'); window.location = '../input_kriteria.php';</script>
	<?php
		}
		

}elseif(isset($_POST['kriteriaupdate']) == 'Update'){
	$id_siswa		= $_POST['id_siswa'];
	$id_kriteria	= $_POST['id_kriteria'];
	$p_ortu 		= $_POST['p_ortu'];
	$jml_saudara 	= $_POST['jml_saudara'];
	
	$nilai 			= $_POST['nilai'];
	$kelakuan 		= $_POST['kelakuan'];

	if (($p_ortu > "800000") && ($p_ortu <= "1000000")){
		$x1 = "1";
	}elseif (($p_ortu > "700000") && ($p_ortu <= "800000")){
		$x1 = "2";
	}elseif (($p_ortu > "600000") && ($p_ortu <= "700000")){
		$x1 = "3";
	}elseif (($p_ortu > "500000") && ($p_ortu <= "600000")){
		$x1 = "4";
	}else{
		$x1 = "5";
	}

	if ($jml_saudara == '1'){
		$x2 = 1;
	}elseif($jml_saudara == '2'){
		$x2 = 2;
	}elseif($jml_saudara == '3'){
		$x2 = 3;
	}elseif($jml_saudara == '4'){
		$x2 = 4;
	}else{
		$x2 = 5;
	}

	if ($nilai == "7.0"){
		$y1 = "1";
	}elseif(($nilai > "7.0") && ($nilai <= "7.5")){
		$y1 = "2";
	}elseif(($nilai > "7.5") && ($nilai <= "8.0")){
		$y1 = "3";
	}elseif(($nilai > "8.0") && ($nilai <= "8.5")){
		$y1 = "4";
	}else{
		$y1 = "5";
	}

	if ($kelakuan == "Sangat Buruk"){
		$y2 = "1";
	}elseif ($kelakuan == "Buruk"){
		$y2 = "2";
	}elseif ($kelakuan == "Cukup"){
		$y2 = "3";
	}elseif ($kelakuan == "Baik"){
		$y2 = "4";
	}else{
		$y2 = "5";
	}
	
		$ha = "UPDATE kriteria SET x1 ='$x1',
								   x2 = '$x2',
								   y1 = '$y1',
								   y2 = '$y2'
				WHERE id_kriteria = '$id_kriteria'";
	
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Kriteria Siswa Berhasil diupdate');window.location = '../input_kriteria.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Penginputan Data'); window.location = '../input_kriteria.php';</script>
	<?php
		}


}elseif(isset($_GET['kriteria']) == 'hapus'){
	$id		= $_GET['id_kriteria'];

	$quer = "DELETE FROM kriteria WHERE id_kriteria = '$id'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Seleksi Siswa Telah Dihapus !!!');
				window.location = '../input_kriteria.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Penghapusan Data !!!');
				window.location = '../input_kriteria.php';
			</script>
		<?php
		}
}elseif(isset($_POST['kelulusan']) == 'Kirim'){
	$id_siswa = $_POST['id_siswa'];
	$ekonomi  = $_POST['n_ekonomi'];
	$akademik = $_POST['n_akademik'];
	$total	  = $_POST['hasil'];

	$hitung = count($id_siswa);
	for ($a = 0 ; $a < $hitung; $a++){
		$masukkan = "INSERT INTO rangking(id_siswa,n_ekonomi,n_akademik,n_total) values ('$id_siswa[$a]','$ekonomi[$a]','$akademik[$a]','$total[$a]')";
		$kue = mysqli_query($con,$masukkan);
	}

	if ($kue){
			?>
			<script>alert('Data telah terinput !!!');
				window.location = '../data_proses.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat Kesalahan Data !!!');
				window.location = '../data_proses.php';
			</script>
		<?php
		}


}elseif(isset($_GET['kelulusan']) == 'hapus'){
	$id		= $_GET['id_rangking'];

	$quer = "DELETE FROM rangking WHERE id_ranking = '$id'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Seleksi Siswa Telah Dihapus !!!');
				window.location = '../data_proses.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Penghapusan Data !!!');
				window.location = '../data_proses.php';
			</script>
		<?php
		}
}elseif(isset($_POST['kelas']) == 'Tambah'){
	$nama_kelas = $_POST['nama_kelas'];

	$ha = "INSERT INTO data_kelas (nama_kelas) VALUES ('$nama_kelas')";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Kelas Berhasil diTambahkan');window.location = '../data_kelas.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Penginputan Data'); window.location = '../data_kelas.php';</script>
	<?php
		}
}elseif(isset($_POST['kelasx']) == 'Update'){
	$id_kelas 			= $_POST['id_kelas'];
	$nama_kelas 		= $_POST['nama_kelas'];

	$ha = "UPDATE data_kelas SET nama_kelas= '$nama_kelas' WHERE id_kelas = '$id_kelas'";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Kelas Berhasil diUpdate');window.location = '../data_kelas.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Pengupdaten Data'); window.location = '../data_kelas.php';</script>
	<?php
		}
}elseif(isset($_GET['kelashapus']) == 'hapus'){
	$id		= $_GET['id_kelas'];

	$quer = "DELETE FROM data_kelas WHERE id_kelas = '$id'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Kelas Telah Dihapus !!!');
				window.location = '../data_kelas.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Penghapusan Data !!!');
				window.location = '../data_kelas.php';
			</script>
		<?php
		}
}elseif(isset($_POST['user']) == 'Tambah'){
	$username 			= $_POST['username'];
	$password 			= md5($_POST['password']);


		$ha = "INSERT INTO user (username,password) VALUES ('$username','$password')";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data User Berhasil diTambahkan');window.location = '../data_user.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Penginputan Data'); window.location = '../data_user.php';</script>
	<?php
		}

}elseif(isset($_POST['userupdate']) == 'Update'){
	$username 			= $_POST['username'];
	$password 			= $_POST['password'];
	$id_user 			= $_POST['id_user'];

	if ($password == ""){
		$query = "UPDATE user SET username='$username' where id_user = '$id_user'";
	}else{
		$passwordx 			= md5($_POST['password']);
		$query = "UPDATE user SET username='$username',password = '$passwordx' where id_user = '$id_user'";
	}
	$run = mysqli_query($con,$query);

	if ($run){
			?>
			<script>alert('Sukses !!!, Data User Berhasil diubah');window.location = '../data_user.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Pengubahan Data'); window.location = '../data_user.php';</script>
	<?php
		}
}elseif(isset($_GET['userhapus']) == 'hapus'){
	$id		= $_GET['id_user'];

	$quer = "DELETE FROM user WHERE id_user = '$id'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data User Telah Dihapus !!!');
				window.location = '../data_user.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Penghapusan Data !!!');
				window.location = '../data_user.php';
			</script>
		<?php
		}
}
?>