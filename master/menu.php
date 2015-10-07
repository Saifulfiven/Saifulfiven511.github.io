<?php
if (empty($_SESSION['username']) && empty($_SESSION['password'])){
echo "Anda Tidak memiliki Akses untuk halaman ini, Silahkan Login.";
}else{
?>
    <li style="background:linear-gradient(to top, #07a0e1, #d5f2ff)">
       <a href="index.php" style="color:#fff;"><i class="icon-chevron-right"></i>MENU UTAMA</a>
    </li>
    <li>
       <a href="data_user.php"><i class="icon-chevron-right"></i> Data User</a>
    </li>
    <li>
       <a href="data_kelas.php"><i class="icon-chevron-right"></i> Data Kelas</a>
    </li>
    <li>
       <a href="data_siswa.php"><i class="icon-chevron-right"></i> Data Siswa</a>
    </li>
    <li>
       <a href="input_kriteria.php"><i class="icon-chevron-right"></i> Data Kriteria</a>
    </li>
    <li>
       <a href="data_proses.php"><i class="icon-chevron-right"></i> Data Proses</a>
    </li>
     <li>
       <a href="lulus.php"><i class="icon-chevron-right"></i> Data Lulus</a>
    </li>
<li>
       <a href="../Keluar.php"><i class="icon-chevron-right"></i>KELUAR</a>
    </li>
<?php
}
?>