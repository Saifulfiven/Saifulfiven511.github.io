<?php
include "../config/tambah.php";
include "../config/koneksi.php";
                          $idpegawai = $_GET['id_pegawai'];
                          $waktuaw   = $_GET['tanggalaw'];
                          $wal = $waktuaw.' 07:00:00';

                          $waktuak   = $_GET['tanggalak'];
                          $wak = $waktuak.' 22:00:00';
                          $kategori  = $_GET['DATEID'];
                          $keterangan= $_GET['alasan'];
                          session_start();
                          $akses = $_SESSION['akses'];
                          $user  = $_SESSION['username'];
                         $que = "SELECT * FROM a_user WHERE username = '$user' AND akses = '$akses'";
                         $query = mysqli_query($con,$que);
                         $ha = mysqli_fetch_array($query);
                         $id_user   = $ha['id_user'];
                          if ($akses == 'ADMIN' || $akses == 'MASTER'){
                          	$tabel = 'user_speday';
                            izin($tabel,$wal,$wak,$idpegawai,$kategori,$keterangan,$con);
				                  }else{
                        	$tabel = 'temp';  
                            izinoper($tabel,$wal,$wak,$idpegawai,$kategori,$keterangan,$id_user,$con);
                      	  }

                          // AMbil Nama Pegawai
                          $pegawai = "SELECT * FROM userinfo,departments WHERE USERID = '$idpegawai' AND userinfo.DEFAULTDEPTID = departments.DEPTID";
                          $query1  = mysqli_query($con,$pegawai);
                          $ha1     = mysqli_fetch_array($query1);
                          
                          // Ambil Kategori Izin
                          $kategori = "SELECT * FROM Leaveclass WHERE LeaveId = '$kategori'";
                          $query2   = mysqli_query($con,$kategori);
                          $ha2      = mysqli_fetch_array($query2);
                          $kegiatan = "Memberikan Izin($ha2[LeaveName]) pada $ha1[Name] dari $ha1[DEPTNAME] Mulai dari $waktuaw s/d $waktuak ";
                          cerita($kegiatan,$user,$con);
        
?>