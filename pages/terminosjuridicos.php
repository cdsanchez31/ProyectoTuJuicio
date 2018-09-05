<?php
session_start();
include '../lib/config.php';
include '../lib/socialnetwork-lib.php';

ini_set('error_reporting',0);

if(!isset($_SESSION['usuario']))
{
    header("Location: login.php");
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>LEGISLAPP - Termios juridicos</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
                <link rel="stylesheet" href="../bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
                <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
                <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
    <!-- Theme style -->
                <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- Material Design -->
                <link rel="stylesheet" href="../dist/css/bootstrap-material-design.min.css">
                <link rel="stylesheet" href="../dist/css/ripples.min.css">
                <link rel="stylesheet" href="../dist/css/MaterialAdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
                <link rel="stylesheet" href="../dist/css/skins/all-md-skins.min.css">
    <!-- Morris chart -->
                <link rel="stylesheet" href="../bower_components/morris.js/morris.css">
    <!-- jvectormap -->
                <link rel="stylesheet" href="../bower_components/jvectormap/jquery-jvectormap.css">
    <!-- Date Picker -->
                <link rel="stylesheet" href="../bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
    <!-- Daterange picker -->
                <link rel="stylesheet" href="../bower_components/bootstrap-daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
                <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- Google Font -->
                <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-red sidebar-mini">

<div class="wrapper">
    <?php echo Headerb (); ?>
    <?php echo Side (); ?>

    <br><br><br>
    <div class="content-wrapper">
        <div class="col-md-12">
            <div class="box-footer">
                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav sidebar-menu" data-widget="tree">
                        <li><a href="terminosjuridicos.php?letra=A"><b> A</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=B"><b>B </b></a></li>
                        <li><a href="terminosjuridicos.php?letra=C"><b>C</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=D"><b>D</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=E"><b>E</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=F"><b>F</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=G"><b>G</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=H"><b>H</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=I"><b>I</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=J"><b>J</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=K"><b>K</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=L"><b>L</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=M"><b>M</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=N"><b>N</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=O"><b>O</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=P"><b>P</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=Q"><b>Q</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=R"><b>R</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=S"><b>S</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=T"><b>T</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=U"><b>U</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=V"><b>V</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=W"><b>W</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=X"><b>X</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=Y"><b>Y</b></a></li>
                        <li><a href="terminosjuridicos.php?letra=Z"><b>Z</b></a></li>
                    </ul>
                </div>
            </div>
            <br>
        </div>
        <div class="content">
            <div class="row">
                <div class="col-sm-8">
                    <?php
                    $letraseleccion = $_GET['letra'];
                    if($letraseleccion ==!null){
                        $consulta = IDU("select * from terminos WHERE Termino LIKE '".$letraseleccion."%'");
                        while($terminos = mysqli_fetch_array($consulta)){
                        ?>
                        <div class="box">
                            <div class="box-header with-border">
                                <div class="user-block">
                                    <span class="description" style="cursor:pointer; color: #bc2115;""><?php echo utf8_encode(nl2br($terminos['Termino']));?></span>
                                </div>
                            </div>
                            <div class="box-body">
                                <p><?php echo utf8_encode(nl2br($terminos['Concepto'])) ?></p>
                            </div>
                        </div>
                        <?php
                        }
                        }else{
                        ?>
                        <div class="box">
                            <div class="box-body">
                                <p>SELECCIONE UNA LETRA</p>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>





























<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->

<!-- jQuery 3 -->
<script src="../bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="../bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Material Design -->
<script src="../dist/js/material.min.js"></script>
<script src="../dist/js/ripples.min.js"></script>
<script>
    $.material.init();
</script>
<!-- Morris.js charts -->
<script src="../bower_components/raphael/raphael.min.js"></script>
<script src="../bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="../bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="../bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="../bower_components/moment/min/moment.min.js"></script>
<script src="../bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="../bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="../bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="../dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
</body>
</html>