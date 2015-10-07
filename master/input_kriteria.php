<?php
session_start();
 if (empty($_SESSION['username']) AND empty($_SESSION['password'])){
  echo "<center>Maaf, Anda Belum Login</center>";
}
else{
?><!DOCTYPE html>
<html>
    
    <head>
        <title>SMA 12 Makassar</title>
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
                            <div class="navbar navbar-inner block-header" style="background:linear-gradient(to top, #07a0e1, #d5f2ff)">
                                <div class="muted pull-left" style="color:#fff">Data Kriteria</div>
                            </div>
                            <div class="block-content collapse in">
                           
                            <div class='navbar navbar-inner block-header' >
                              
                              <div class="block-content">
                                <div class="span12">
                                   <?php
                                   $feli = isset($_GET['page'])?$_GET['page']:null;
                                   switch($feli){
                                    default:
                                      include "config/input_kriteria.php";
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

        <script src="../style/vendors/wysiwyg/wysihtml5-0.3.0.js"></script>
        <script src="../style/vendors/wysiwyg/bootstrap-wysihtml5.js"></script>

        <script src="../style/vendors/wizard/jquery.bootstrap.wizard.min.js"></script>


        <script src="../style/vendors/datatables/js/jquery.dataTables.min.js"></script>


        <script src="../style/assets/scripts.js"></script>
        <script src="../style/assets/DT_bootstrap.js"></script>

        <script>
        $(function() {
            
        });
        </script>

        <script src="../style/assets/scripts.js"></script>
        <script>
        $(function() {
            $(".datepicker").datepicker();
            $(".uniform_on").uniform();
            $(".chzn-select").chosen();
            $('.textarea').wysihtml5();

            $('#rootwizard').bootstrapWizard({onTabShow: function(tab, navigation, index) {
                var $total = navigation.find('li').length;
                var $current = index+1;
                var $percent = ($current/$total) * 100;
                $('#rootwizard').find('.bar').css({width:$percent+'%'});
                // If it's the last tab then hide the last button and show the finish instead
                if($current >= $total) {
                    $('#rootwizard').find('.pager .next').hide();
                    $('#rootwizard').find('.pager .finish').show();
                    $('#rootwizard').find('.pager .finish').removeClass('disabled');
                } else {
                    $('#rootwizard').find('.pager .next').show();
                    $('#rootwizard').find('.pager .finish').hide();
                }
            }});
            $('#rootwizard .finish').click(function() {
                alert('Finished!, Starting over!');
                $('#rootwizard').find("a[href*='tab1']").trigger('click');
            });
        });
        </script>
    </body>
</html>
<?php
}
?>