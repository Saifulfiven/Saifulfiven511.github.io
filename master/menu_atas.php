<?php
if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
    echo "Tak Ada Akses";
}
else{
$nama = $_SESSION['username'];
?>
<div class="nav-collapse collapse" style="background:linear-gradient(to top, #07a0e1, #d5f2ff); padding:6px;color:#fff;color:black">
                    <img src="../style/tampilkan/makassar.png" width="40px" height="60px"> Seleksi Penerima Beasiswa SMA 12 MAKASSAR</div>
<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                    <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                     <span class="icon-bar"></span>
                    </a>
                    
                    <a class="brand" href="index.php">Home</a>
                    <div class="nav-collapse collapse">
                        <ul class="nav pull-right">
                            <li class="dropdown">
                                <a href="#" role="button" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-user"></i><?php
                                echo "$nama";
                                ?>
                                <i class="caret"></i>

                                </a>
                                <ul class="dropdown-menu">
                                    <li class="divider"></li>
                                    <li>
                                        <a tabindex="-1" href="../keluar.php">Logout</a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </div>
<?php
}
?>