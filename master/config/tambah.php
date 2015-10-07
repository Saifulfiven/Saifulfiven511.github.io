<?php
include "koneksi.php";

	function ambiledit($field,$id,$con){
		$quer = "SELECT * FROM a_user WHERE id_user = $id";
		$query = mysqli_query($con,$quer);
		$ha = mysqli_fetch_array($query);
		
		if ($field == 'username'){
			return $ha['username'];
		}elseif ($field == 'akses'){
			return $ha['akses'];
		}
	}

	function updatet($id,$user,$pass,$ucer,$ak,$con){
		$use = strtoupper($user);
		$pa = strtoupper($pass);
		$passt = md5($pa);
		if ($pass == ""){
			$quer = "UPDATE a_user SET username='$use',akses = '$ak' WHERE id_user = '$id'";	
			$query = mysqli_query($con,$quer);
		
		if ($query){
			?>
			<script>alert('Data Berhasil diupdate !!!');
				window.location = 'calendar.php?page=spr';
			</script>
		<?php
		}else{
		?>

			<script>alert('Data Gagal diupdate !!!');
				window.location = 'calendar.php?page=spr';
			</script>
		<?php
		}
		
		}else{
			$quer = "UPDATE a_user SET username='$use', password = '$passt',akses = '$ak' WHERE id_user = '$id'";
		$query = mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Berhasil diupdate !!!');
				window.location = 'calendar.php?page=spr';
			</script>
		<?php
		}else{
		?>

			<script>alert('Data Gagal diupdate !!!');
				window.location = 'calendar.php?page=spr';
			</script>
		<?php
		}
		}
	}

	function hapus($id,$con){
		$quer = "DELETE FROM a_user WHERE id_user = '$id'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Berhasil dihapus !!!');
				window.location = '../calendar.php?page=spr';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat penghapusan Data !!!');
				window.location = '../calendar.php?page=spr';
			</script>
		<?php
		}
	}
//-----------------------IZIN PEGAWAI ---------------------
	function izin($tabel,$waktuaw,$waktuak,$id_pegawai,$kategori,$keterangan,$con){
		$input = "INSERT INTO $tabel (USERID,STARTSPECDAY,ENDSPECDAY,DATEID,YUANYING) VALUES ('$id_pegawai','$waktuaw','$waktuak','$kategori','$keterangan')";
		$masuk = mysqli_query($con,$input);

		$username = $_SESSION['username'];
		$select = "SELECT * FROM a_user WHERE username = '$username'";
		$selec  = mysqli_query($con,$select);
		$sele   = mysqli_fetch_array($selec);
		$id_user= $sele['id_user'];

		$input1 = "INSERT INTO konfirmasi (userid,startpecday,id_user) VALUES ('$id_pegawai','$waktuaw','$id_user')";
		$selec  = mysqli_query($con,$input1);
		
		if ($masuk){
			?>
			<script>alert('Data Berhasil ditambahkan !!!');
				window.location = '../file.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat penginputan Data !!!');
				window.location = '../file.php';
			</script>
		<?php
		}
	}

	function izinoper($tabel,$waktuaw,$waktuak,$id_pegawai,$kategori,$keterangan,$id_user,$con){
		$input = "INSERT INTO $tabel (USERID,STARTSPECDAY,ENDSPECDAY,DATEID,YUANYING,id_user) VALUES ('$id_pegawai','$waktuaw','$waktuak','$kategori','$keterangan','$id_user')";
		$masuk = mysqli_query($con,$input);
		
		$username = $_SESSION['username'];
		$select = "SELECT * FROM a_user WHERE username = '$username'";
		$selec  = mysqli_query($con,$select);
		$sele   = mysqli_fetch_array($selec);
		$id_user= $sele['id_user'];

		$input1 = "INSERT INTO konfirmasi (userid,startpecday,id_user) VALUES ('$id_pegawai','$waktuaw','$id_user')";
		$selec  = mysqli_query($con,$input1);
		if ($masuk){
			?>
			<script>alert('Menunggu Konfirmasi Master/Admin !!!');
				window.location = '../file.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat penginputan Data !!!');
				window.location = '../file.php';
			</script>
		<?php
		}
	}

	function ubahizin($id,$wkt,$con){
		$sel = "SELECT * FROM temp,userinfo WHERE temp.USERID = '$id' AND STARTSPECDAY = '$wkt' AND temp.USERID = userinfo.USERID";
		$sele = mysqli_query($con,$sel);
		$select = mysqli_fetch_array($sele);
		$select['USERID'];
		$select['STARTSPECDAY'];
		$select['ENDSPECDAY'];
		$select['DATEID'];
		$select['YUANYING'];
		$select['DATE'];
		$username = $_SESSION['username'];

		$upd = "INSERT INTO user_speday (USERID,STARTSPECDAY,ENDSPECDAY,DATEID,YUANYING) VALUES ('$select[USERID]','
		$select[STARTSPECDAY]','$select[ENDSPECDAY]','$select[DATEID]','$select[YUANYING]')";
		$upda = mysqli_query($con,$upd);

		$upd1 = "SELECT * FROM leaveclass WHERE LeaveId = $select[DATEID]";
		$run  = mysqli_query($con,$upd1);
		$izin = mysqli_fetch_array($run);
		
		$keg = "$select[Name](Izin = $izin[LeaveName] dari $select[STARTSPECDAY] s/d
		$select[ENDSPECDAY]) <i>Telah Memverifikasinya</i>";
		cerita($keg,$username,$con);

		$quer = "DELETE FROM temp WHERE USERID = '$id' AND STARTSPECDAY = '$wkt'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Telah Diizinkan !!!');
				window.location = 'konfirmasi.php?page=spr';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Pengizinan Data !!!');
				window.location = 'konfirmasi.php?page=spr';
			</script>
		<?php
		}
		
	}

	function hapusizin($id,$wkt,$con){
		// -------------------------- LOG ---------------------------
		$sel = "SELECT * FROM temp,userinfo,a_user WHERE temp.USERID = '$id' AND STARTSPECDAY = '$wkt' AND temp.USERID = userinfo.USERID AND temp.id_user = a_user.id_user";
		$run1 = mysqli_query($con,$sel);
		$tidak = mysqli_fetch_array($run1);

		$upd1 = "SELECT * FROM leaveclass WHERE LeaveId = $tidak[DATEID]";
		$run  = mysqli_query($con,$upd1);
		$izin = mysqli_fetch_array($run);
		$username = $_SESSION['username'];
		$keg = "$tidak[Name](Izin = $izin[LeaveName] dari $tidak[STARTSPECDAY] s/d
		$tidak[ENDSPECDAY]) dari Operator : $tidak[username] <i>Tidak diberikan Izin</i>";
		cerita($keg,$username,$con);
		// -------------------------- HAPUS DATA ---------------------------
		$quer = "DELETE FROM temp WHERE USERID = '$id' AND STARTSPECDAY = '$wkt'";

		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Telah Dihapus !!!');
				window.location = 'konfirmasi.php?page=spr';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Penghapusan Data !!!');
				window.location = 'konfirmasi.php?page=spr';
			</script>
		<?php
		}
		}
	function hapusizined($id,$wkt,$con){
		// -------------------------- LOG ---------------------------
		$sel = "SELECT * FROM user_speday,userinfo WHERE user_speday.USERID = '$id' AND STARTSPECDAY = '$wkt' AND user_speday.USERID = userinfo.USERID";
		$run1 = mysqli_query($con,$sel);
		$tidak = mysqli_fetch_array($run1);

		$upd1 = "SELECT * FROM leaveclass WHERE LeaveId = $tidak[DATEID]";
		$run  = mysqli_query($con,$upd1);
		$izin = mysqli_fetch_array($run);
		$username = $_SESSION['username'];
		$keg = "$tidak[Name](Izin = $izin[LeaveName] dari $tidak[STARTSPECDAY] s/d
		$tidak[ENDSPECDAY]) <i>Yang Telah Dikonfirmasi( Dihapus) </i>";
		cerita($keg,$username,$con);
		// -------------------------- HAPUS DATA ---------------------------
		$quer = "DELETE FROM user_speday WHERE USERID = '$id' AND STARTSPECDAY = '$wkt'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Telah Dihapus !!!');
				window.location = 'konfirmasi.php?page=izin';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Penghapusan Data !!!');
				window.location = 'konfirmasi.php?page=izin';
			</script>
		<?php
		}
	}

	//------------------------------------ JADWAL --------------------------------------
	function ubahjadwal($pagiawal,$pagiakhir,$pagilambat,$siangawal,$siangakhir,$indeks2,$con){
	$query="UPDATE jamkantor SET p_awal='$pagiawal',p_akhir='$pagiakhir',lambat='$pagilambat',s_awal='$siangawal',s_akhir='$siangakhir' WHERE id_jam='$indeks2'";
		$run_query=mysqli_query($con,$query);		
	}

	//---------------------------------- TRANSFER -------------------------------------
	function transfert($departid,$userid,$con){
		$quer = "UPDATE userinfo SET DEFAULTDEPTID = '$departid' WHERE USERID = '$userid'";
		$query = mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Telah Ditransfer !!!');
				window.location = '../transfer.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Transfer Data !!!');
				window.location = '../transfer.php';
			</script>
		<?php
		}	
	}

	//---------------------------------- Profil ---------------------------------------------
	function updprofil($a,$id_pegawai,$ssn,$nama,$con){
		$ha = "UPDATE userinfo SET Name='$nama[$a]',SSN='$ssn[$a]' WHERE USERID = '$id_pegawai[$a]'";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Berhasil diUpdate');window.location = '../edit_profil.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Perubahan Data'); window.location = '../edit_profil.php';</script>
	<?php
		}
	}

	function prprofil($userid,$ssn,$nama,$con){
		$ha = "UPDATE userinfo SET SSN='$ssn', Name ='$nama' WHERE USERID = '$userid'";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Berhasil diUpdate');window.location = '../edit_profil.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Perubahan Data'); window.location = '../edit_profil.php';</script>
	<?php
		}
	}

	//---------------------------------DEPARTMENT-------------------------------------------
	function depart($b,$deptid,$deptname,$con){
		$ha = "UPDATE departments SET DEPTNAME='$deptname[$b]' WHERE DEPTID = '$deptid[$b]'";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Berhasil diUpdate');window.location = '../edit_profil.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Perubahan Data'); window.location = '../edit_profil.php';</script>
	<?php
		}
	}

	function depart1($deptid,$deptname,$con){
		$ha = "UPDATE departments SET DEPTNAME='$deptname' WHERE DEPTID = '$deptid'";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Berhasil diUpdate');window.location = '../edit_profil.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Perubahan Data'); window.location = '../edit_profil.php';</script>
	<?php
		}
	}

	function depart2($deptnam,$con){
		$ha = "INSERT INTO departments (DEPTNAME) VALUES ('$deptnam')";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Berhasil diTambahkan');window.location = '../edit_profil.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Penginputan Data'); window.location = '../edit_profil.php';</script>
	<?php
		}
	}
	//----------------------------------------Libur-------------------------------------------
	function liburan($waktu,$keterangan,$con){
		$ha = "INSERT INTO tanggalmerah (tanggalmerah,keterangan) VALUES ('$waktu','$keterangan')";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Libur Berhasil diTambahkan');window.location = '../form.php?page=libur';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Penginputan Data'); window.location = '../edit_profil.php';</script>
	<?php
		}
	}
	function liburanup($id,$waktu,$keterangan,$con){
		$ha = "UPDATE tanggalmerah SET tanggalmerah= '$waktu',keterangan = '$keterangan' WHERE idtanggalmerah = '$id'";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Libur Berhasil diUpdate');window.location = '../form.php?page=libur';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Pengupdaten Data'); window.location = '../form.php?page=libur';</script>
	<?php
		}
	}

	function liburhapus($id,$con){
		$quer = "DELETE FROM tanggalmerah WHERE idtanggalmerah = '$id'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Libur Telah Dihapus !!!');
				window.location = '../form.php?page=libur';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Penghapusan Data !!!');
				window.location = '../form.php?page=libur';
			</script>
		<?php
		}
	}
	// ------------------------------------------ Hari Khusus -------------------------------------------
	function tamsiswa($nis,$nama,$alamat,$jkel,$p_ortu,$jml_saudara,$nilai,$kelakuan,,$con){
		$ha = "INSERT INTO data_siswa (nis,nama,alamat,jkel,p_ortu,jml_saudara,nilai,kelakuan) VALUES ('$nis','$nama','$alamat','$jkel','$p_ortu','$jml_saudara','$nilai','$kelakuan')";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Siswa Berhasil diTambahkan');window.location = '../harikhusus.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Penginputan Data'); window.location = '../harikhusus.php';</script>
	<?php
		}
	}
	function harikhususup($id,$waktu,$con){
		$ha = "UPDATE harikhusus SET tanggal= '$waktu' WHERE id_tanggal = '$id'";
		$query = mysqli_query($con,$ha);
		if ($query){
			?>
			<script>alert('Sukses !!!, Data Hari Khusus Berhasil diUpdate');window.location = '../harikhusus.php';</script>
		<?php
		}else{
		?>
			<script>alert('Maaf, Terdapat kesalahan Saat Melakukan Pengupdaten Data'); window.location = '../harikhusus.php';</script>
	<?php
		}
	}

	function harikhusushap($id,$con){
		$quer = "DELETE FROM harikhusus WHERE id_tanggal = '$id'";
		$query =mysqli_query($con,$quer);
		if ($query){
			?>
			<script>alert('Data Hari Khusus Telah Dihapus !!!');
				window.location = '../harikhusus.php';
			</script>
		<?php
		}else{
			?>
			<script>alert('Terdapat kesalahan saat Penghapusan Data !!!');
				window.location = '../harikhusus.php';
			</script>
		<?php
		}
	}
	// ---------------------------- Log ------------------------------------------

	function cerita($keg,$username,$con){
		$query1 = "SELECT * FROM a_user WHERE username = '$username'";
		$jalankan1  = mysqli_query($con,$query1);
		$user    	= mysqli_fetch_array($jalankan1);
		$id 	    = $user['id_user'];
		$idsession  = $user['id_session'];
		$nama		= $user['username'];

		$query = "INSERT INTO log (kegiatan,username,id_user,id_session) VALUES ('$keg','$nama','$id','$idsession')";
		$jalankan = mysqli_query($con,$query);	
	}
	?>