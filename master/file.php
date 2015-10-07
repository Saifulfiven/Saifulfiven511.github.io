<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<center>Maaf, Anda Belum Login</center>";
}
?><!DOCTYPE html>
<html>
    
    <head>
        <title>SMA 19 Makassar</title>
        <!-- Bootstrap -->
        <link href="../style/bootstrap/css/bootstrap.min.css" rel="stylesheet" media="screen">
        <link href="../style/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../style/assets/styles.css" rel="stylesheet" media="screen">
        <!--[if lte IE 8]><script language="javascript" type="text/javascript" src="vendors/flot/excanvas.min.js"></script><![endif]-->
        <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
            <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
        <link href="../style/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" media="screen">
        <link href="../style/assets/DT_bootstrap.css" rel="stylesheet" media="screen">

        <script src="../style/vendors/modernizr-2.6.2-respond-1.1.0.min.js"></script>
    
    <style type="text/css" media="screen">
      body {
        font-family: Arial, Verdana, sans-serif;
        font-size: 13px;
      }
    .ui-autocomplete {
      padding: 0;
      list-style: none;
      background-color: #fff;
      width: 218px;
      border: 1px solid #B0BECA;
      max-height: 350px;
      overflow-y: scroll;
    }
    .ui-autocomplete .ui-menu-item a {
      border-top: 1px solid #B0BECA;
      display: block;
      padding: 4px 6px;
      color: #353D44;
      cursor: pointer;
    }
    .ui-autocomplete .ui-menu-item:first-child a {
      border-top: none;
    }
    .ui-autocomplete .ui-menu-item a.ui-state-hover {
      background-color: #D5E5F4;
      color: #161A1C;
    }
    </style>


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
        <div class="container-fluid" style="margin-top:55px;">
            <div class="row-fluid">
                <div class="span3" id="sidebar">
                    <ul class="nav nav-list bs-docs-sidenav nav-collapse collapse">
                        <?php
                        include "menu.php";
                        ?>
                    </ul>
                </div>
                <!--/span-->
                <div class="span9" id="content" style="margin-top:1px">
                      <!-- morris stacked chart -->
                    
                     <div class="row-fluid">
                        <!-- block -->
                        <div class="block">
                            <div class="navbar navbar-inner block-header" style="background:linear-gradient(to top, #f1bb51, #ff8635)">
                                <div class="muted pull-left" style="color:#fff">Pengizinan</div>
                            </div>
                            <?php
                            if($_SESSION['akses'] == 'OPERATOR'){
                            	?>
                            <div class='navbar navbar-inner block-header' >
							<a href='?page=Perizinan'>Perizinan</a> -> <a href='?page=dikonfirmasi'>Telah Dikonfirmasi</a>
                            
                        <?php
                        }
                        ?>
                            <div class="block-content collapse in">
                                <div class="span12">
                                   <?php
                                   $feli = isset($_GET['page'])?$_GET['page']:null;
                                   switch($feli){
                                    default:
                                        include "file/bpbd.php";
                                    break;
                                    case "Perizinan":
                                    	include "file/bpbd.php";
                                    break;
                                    case "dikonfirmasi":
                                    echo "<center><h4>Data Pegawai Yang Telah Diverifikasi</h4></center>";
                                    	include "file/dikonfirmasi.php";
                                    break;
                                    }
                                   ?>
                                     </div>
                                </div>
                            </div>
                        </div>
                        <!-- /block -->
                    </div>

                     <!-- wizard -->
                    <div class="row-fluid section">
                         <!-- block -->
                        
                        <!-- /block -->
                    </div>

                </div>
            </div>
            <hr>
        </div>
        <!--/.fluid-container-->
        <link href="../style/vendors/datepicker.css" rel="stylesheet" media="screen">
        <link href="../style/vendors/uniform.default.css" rel="stylesheet" media="screen">
        <link href="../style/vendors/chosen.min.css" rel="stylesheet" media="screen">

        <script src="../style/vendors/jquery-1.9.1.js"></script>
        <script src="../style/bootstrap/js/bootstrap.min.js"></script>
        <script src="../style/vendors/jquery.uniform.min.js"></script>
        <script src="../style/vendors/chosen.jquery.min.js"></script>
        <script src="../style/vendors/bootstrap-datepicker.js"></script>

        <script src="../style/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>


        
        <script src="../style/vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="../style/assets/scripts.js"></script>
        <script src="../style/assets/DT_bootstrap.js"></script>

        <script>
        $(function() {
            
        });
        </script>

        
    </body>
</html>
