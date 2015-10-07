<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<center>Maaf, Anda Belum Login</center>";
}
else{
?>
<!DOCTYPE html>
<html class="no-js">
    
    <head>
        <title>SMA 12 Makassar</title>
        <!-- Bootstrap -->
        <link href="../style/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../style/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../style/assets/styles.css" rel="stylesheet" media="screen">
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <script src="../style/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    </head>
    
    <body>
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container-fluid">
                    <?php
                        include "menu_atas.php";
                    ?>
                    <!--/.nav-collapse -->
                </div>
            </div>
        </div>
        <div class="container-fluid"  style="margin-top:55px;">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <?php
                        include "menu.php";
                        ?>
                    </ul>
                </div>
                
                <!--/span-->
                <div class="span9" id="content" style="margin-top:-25px;">
                    <div class="row-fluid"><br><br>
                        <div class="alert alert-success">
							<button type="button" class="close" data-dismiss="alert">&times;</button>
                            <center><h4>Success</h4>
                        	Selamat Datang, 
                            <?php
                            echo $username = $_SESSION['username'];
                            ?>
                            <br>Anda Berhasil Login !!!<center>
                        <p>&nbsp;<?php
                        date_default_timezone_set("ASIA/Jakarta");
                        for ($a = 1; $a<=16; $a++){
                            echo "<br>";
                        }
                        echo "Anda Login Pada ".date('Y-m-d H:i:s');
                        ?>
                        </p></div>
                        	
                    	</div>
                    </div>
                </div>
            </div>
            <hr>
        </div>
        <!--/.fluid-container-->
        <script src="../style/vendors/jquery-1.9.1.min.js"></script>
        <script src="../style/bootstrap/js/bootstrap.min.js"></script>
        <script src="../style/assets/scripts.js"></script>
      
    </body>
</html>
<?php
}
?>