<?php
include "style/tampilkan/koneksi.php";

error_reporting(0);
function anti_injection($data){
  $filter = mysql_real_escape_string(stripslashes(strip_tags(htmlspecialchars($data,ENT_QUOTES))));
  return $filter;
}

$username = anti_injection($_POST[username]);
$pass     = anti_injection(md5($_POST[password]));

// pastikan username dan password adalah berupa huruf atau angka.
if (!ctype_alnum($username) OR !ctype_alnum($pass)){
  echo "<center>Lengkapi Data Anda<br><a href=index.php>Login</a></center>";
}
else{
$login=mysql_query("SELECT * FROM user WHERE username='$username' AND password='$pass'");
$ketemu=mysql_num_rows($login);
$r=mysql_fetch_array($login);

// Apabila username dan password ditemukan
  if ($ketemu > 0){
    session_start();

    $_SESSION['username']     = $r['username'];
    
    $_SESSION['password']     = $r['password'];
    $_SESSION['akses']        = $r['akses'];
    

  	$sid_lama = session_id();
  	
  	session_regenerate_id();

  	$sid_baru = session_id();

      mysql_query("UPDATE user SET id_session='$sid_baru' WHERE username='$username'");
      header('location:master/index.php');
    
  }else{
    echo "<center style='color:red'>Silahkan Masukkan Data Valid<br>
        <a href=index.php>Login</a></center>";
  }
}
?>