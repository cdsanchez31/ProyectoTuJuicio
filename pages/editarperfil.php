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
<htmL>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>EDITAR MI PERFÍL</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.6 -->
        <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
        <!--<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

        <!-- Bootstrap 3.3.7 -->
        <!-- <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <!--<link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">-->
        <!-- Material Design -->
        <link rel="stylesheet" href="../dist/css/bootstrap-material-design.min.css">
        <link rel="stylesheet" href="../dist/css/ripples.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
           folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="../dist/css/skins/all-md-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head

    <body class="hold-transition skin-red sidebar-mini">
        <div class="wrapper">
            <?php echo Headerb (); ?>
            <?php echo Side (); ?>

            <?php
            if(isset($_GET['id']))
            {
            $id =  ($_GET['id']);

            $miuser = IDU("SELECT * FROM usuario WHERE IdUsuario = '$id'");
            $use = mysqli_fetch_array($miuser);

            if($_SESSION['idusuario'] != $id) {
            ?>
            <script type="text/javascript">Header.location="login.php";</script>
            <?php
            }
            ?>
            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Main content -->
                <section class="content">
                    <!-- Main row -->
                    <div class="row">
                        <!-- Left col -->
                        <div class="col-md-8">
                            <!-- /.box -->
                            <!-- general form elements -->
                            <div class="box box-solid box-danger">
                                <div class="box-header with-border">
                                    <h3 class="box-title">Editar mi perfíl</h3>
                                </div>
                                <!-- /.box-header -->
                                <!-- form start -->
                                <form role="form" method="post" action="" enctype="multipart/form-data">
                                    <div class="box-body">

                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Usuario</label>
                                            <span class="glyphicon glyphicon-user form-control-feedback"></span>
                                            <input type="text" name="usuario" class="form-control"  value="<?php echo $use['Usuario'];?>">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Email</label>
                                            <input type="text" name="email" class="form-control"  value="<?php echo $use['Email'];?>">
                                            <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Telefono</label>
                                            <input type="text" name="telefono" class="form-control"  value="<?php echo $use['Telefono'];?>">
                                            <span class="glyphicon glyphicon-phone-alt form-control-feedback"></span>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Celular</label>
                                            <input type="text" name="celular" class="form-control"  value="<?php echo $use['Celular'];?>">
                                            <span class="glyphicon glyphicon-phone form-control-feedback"></span>
                                        </div>
                                        <div class="form-group col-md-8">
                                            <label for="exampleInputFile"> </label>
                                            <br>
                                            <i class="fa fa-archive"></i> <span>cambiar mi avatar</span>
                                            <!-- <input type="file" name="avatar">-->
                                            <input type="file" name="avatar" id="file-1" class="inputfile inputfile-1" data-multiple-caption="{count} files selected" >
                                            <span class="btn btn-danger  btn-file btn-block">
                                        </div>
                                    </div>
                                    <!-- /.box-body -->
                                    <div class="box-footer">
                                        <button type="submit" name="actualizar" class="btn btn-danger btn-lg">Actualizar datos</button>
                                    </div>
                                </form>
                            </div>
                            <!-- /.box -->

                            <?php
                            if(isset($_POST['actualizar']))
                            {
                                $usuario =  ($_POST['Usuario']);
                                $email =  ($_POST['Email']);
                                $telefono =  ($_POST['Telefono']);
                                $celular =  ($_POST['Celular']);
                                $contrasena =  ($_POST['Contrasena']);
                                $repcontrasena =  ($_POST['Repcontrasena']);

                                $comprobar = mysqli_num_rows(IDU("SELECT * FROM usuario WHERE Usuario = '$usuario' AND IdUsuario != '$id'"));
                                if($comprobar == 0){

                                    $type = 'jpg';
                                    $rfoto = $_FILES['avatar']['tmp_name'];
                                    $name = $id.'.'.$type;

                                    if(is_uploaded_file($rfoto))
                                    {
                                      $destino = '../avatars/'.$name;
                                      $nombrea = $name;
                                      copy($rfoto, $destino);
                                    }
                                    else
                                    {
                                      $nombrea = $use['Avatar'];
                                    }

                                    $sql = IDU("UPDATE usuario SET  Usuario = '$usuario', Email = '$email', Telefono = '$telefono', Celular = '$cel', Contrasena = '$contrasena', Avatar = '$nombrea' WHERE IdUsuario = '$id'");

                                    if($sql) {echo "<script type='text/javascript'>window.location='editarperfil.php?id=$_SESSION[idusuario]';</script>";}

                                    }else {echo 'El nombre de usuario ya está en uso, escoja otro';}

                                }
                            ?>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- ./wrapper -->
        <!-- jQuery 2.2.3 -->
        <script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../bootstrap/js/bootstrap.min.js"></script>
        <!-- Select2 -->
        <script src="../plugins/select2/select2.full.min.js"></script>
        <!-- FastClick -->
        <script src="../plugins/fastclick/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/app.min.js"></script>
        <!-- Sparkline -->
        <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
        <!-- SlimScroll 1.3.0 -->
        <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
        <!-- InputMask -->
        <script src="../plugins/input-mask/jquery.inputmask.js"></script>
        <script src="../plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
        <script src="../plugins/input-mask/jquery.inputmask.extensions.js"></script>
        <script>
          $(function () {
            $("[data-mask]").inputmask();
          });
        </script>
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Material Design -->
        <script src="../dist/js/material.min.js"></script>
        <script src="../dist/js/ripples.min.js"></script>
        <script>
            $.material.init();
        </script>
        <!-- FastClick -->
        <script src="../bower_components/fastclick/lib/fastclick.js"></script>
        <!-- AdminLTE App -->
        <script src="../dist/js/adminlte.min.js"></script>
        <!-- AdminLTE for demo purposes -->
        <script src="../dist/js/demo.js"></script>





        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
        <!-- jQuery 3 -->
        <script src="../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.7 -->
        <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- Material Design -->
        <script src="../dist/js/material.min.js"></script>
        <script src="../dist/js/ripples.min.js"></script>
        <script>
            $.material.init();
        </script>
        <?php } ?>
    </body>
</html>