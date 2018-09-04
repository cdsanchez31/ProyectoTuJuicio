<?php
session_start();
if(isset($_SESSION['usuario']))
{
    header("Location: index.php");
}
include '../lib/config.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>ABOGADOS | Log in</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="../../bower_components/bootstrap/dist/css/bootstrap.min.css">
        <!-- Font Awesome -->
        <link rel="stylesheet" href="../../bower_components/font-awesome/css/font-awesome.min.css">
        <!-- Ionicons -->
        <link rel="stylesheet" href="../../bower_components/Ionicons/css/ionicons.min.css">
        <!-- Theme style -->
        <link rel="stylesheet" href="../../dist/css/AdminLTE.min.css">
        <!-- Material Design -->
        <link rel="stylesheet" href="../../dist/css/bootstrap-material-design.min.css">
        <link rel="stylesheet" href="../../dist/css/ripples.min.css">
        <link rel="stylesheet" href="../../dist/css/MaterialAdminLTE.min.css">
        <!-- iCheck -->
        <!-- <link rel="stylesheet" href="../../plugins/iCheck/square/blue.css"> -->
        <!-- Google Font -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    </head>

    <body class="hold-transition login-page skin-red">
        <div class="login-box">
            <div class="login-logo">
                <a href="#">LEGISL<b>APP</b></a>
            </div>
            <!-- /.login-logo -->
            <div class="login-box-body">

                <form action="" method="post">
                    <div class="form-group has-feedback">
                        <input type="" class="form-control" placeholder="Usuario o Correo Electronico" name="usuario" required>
                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
                    </div>
                    <div class="form-group has-feedback">
                        <input type="password" class="form-control" placeholder="Contraseña" name="contrasena"  required>
                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
                    </div>
                    <div class="row">
                        <div class="col-xs-2">
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-8">
                            <button type="submit" name="login" class="btn btn-danger btn-raised btn-block btn-flat">INGRESAR</button>
                        </div>
                        <div class="col-xs-2">
                        </div>
                    <!-- /.col -->
                    </div>
                </form>
                 <?php
                    if(isset($_POST['login'])){
                        $usuario = $_POST['usuario'];
                        //$usuario = strip_tags($_POST['usuario']);
                        //$usuario = trim($_POST['usuario']);

                        $contrasena = md5($_POST['contrasena']);
                        //$contrasena = strip_tags(md5($_POST['contrasena']));
                        //$contrasena = trim(md5($_POST['contrasena']));

                        $consulta = "SELECT * FROM usuario WHERE Usuario = '$usuario' AND Contrasena = '$contrasena'";

                        $Ausuario = IDU($consulta);
                        $contar = Consultar($consulta);

                        if($contar == 1){
                            while($row=mysqli_fetch_Array($Ausuario)) {
                                if ($usuario = $row['Usuario'] && $contrasena = $row['Contrasena']) {
                                    $_SESSION['idusuario'] = $row['IdUsuario'];
                                    $_SESSION['usuario'] = $row['Usuario'];
                                    $_SESSION['avatar'] = $row['Avatar'];
                                    $_SESSION['nombre'] = $row['Nombres'];
                                    $_SESSION['apellido'] = $row['Apellidos'];
                                    $_SESSION['idtipousuario'] = $row['IdTipoUsuario'];
                                    $_SESSION['tarjetapreofesional'] = $row['TarjetaProfesional'];
                                    $_SESSION['universidadpregrado'] = $row['UniversidadPregrado'];
                                    $_SESSION['universidadpostgrado'] = $row['UniversidadPostgrado'];
                                    $_SESSION['experiencialaboral'] = $row['ExperienciaLaboral'];

                                    header('Location: index.php');
                                }
                            }
                        }else {
                        ?>
                <br>
                <div class="alert alert-danger alert-dismissible" role="alert">
                    Los datos ingresados no son correctos
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <?php
                        }
                    }
                    ?>
                <hr>
                <a class="text-danger" href="#">Olvidé mi contraseña</a><br>
                <a class="text-danger" href="register.php" class="text-center">Registrarme en LEGISLAPP</a>

                <!--<div class="social-auth-links text-center">
                    <p>- OR -</p>
                    <a href="#" class="btn btn-block btn-social btn-facebook btn-flat"><i class="fa fa-facebook"></i> Sign in using
                        Facebook</a>
                    <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign in using
                        Google+</a>
                </div> -->
            </div>
        <!-- /.login-box-body -->
        </div>
        <!-- /.login-box -->

        <!-- jQuery 2.2.3 -->
        <script src="../../bower_components/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap 3.3.6 -->
        <script src="../../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
        <!-- iCheck -->
        <script src="../plugins/iCheck/icheck.min.js"></script>
        <!-- Material Design -->
        <script src="../dist/js/material.min.js"></script>
        <script src="../dist/js/ripples.min.js"></script>
        <script>
            $.material.init();
        </script>
        <!-- iCheck -->
        <!-- <script src="../../plugins/iCheck/icheck.min.js"></script>
        <script>
          $(function () {
            $('input').iCheck({
              checkboxClass: 'icheckbox_square-blue',
              radioClass: 'iradio_square-blue',
              increaseArea: '20%' /* optional */
            });
          });-->

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->
    </body>
</html>
