<?php

function Headerb (){
?>
<!-- START HEADER -->
<header class="main-header">

    <!-- Logo -->
    <a href="../pages/index.php" class="logo">
        <span class="logo-mini">C<b>J</b></span>
        <span class="logo-lg">TU<b>JUICIO</b></span>
    </a>

    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top navbar-fixed-top">
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </a>
        <!-- Navbar Right Menu -->
        <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
                <?php
                $noti = mysqli_query("SELECT * FROM notificaciones WHERE user2 = '".$_SESSION['id']."' AND leido = '0' ORDER BY id_not desc");
                $cuantas = mysqli_num_rows($noti);
                ?>

                <!-- Notifications: style can be found in dropdown.less -->

                <li>
                    <a href="profile.php">
                        <span class="fa fa-user"></span> PERFIL
                    </a>
                </li>

                <li>
                    <a href="">
                        <span class="fa fa-bell"></span> NOTIFICACIONES
                    </a>
                </li>

                <li>
                    <a href="../pages/mailbox.php">
                        <span class="fa fa-envelope"></span> B.ENTRADA
                    </a>
                </li>

              <!--  <li>
                    <a href="../pages/logout.php">
                        <span class="fa fa-code"></span> SALIR
                    </a>
                </li>-->

                <li class="dropdown user user-menu">
                <a href="perfil.php" class="dropdown-toggle" data-toggle="dropdown">
                    <img src="../avatars/<?php echo $_SESSION['avatar']; ?>" class="user-image" alt="User Image">
                    <span class="hidden-xs" href="profile.php"><b><?php echo ucwords($_SESSION['usuario']); ?></b></></span>

                </a>
                <ul class="dropdown-menu">
                    <!-- User image -->
                    <li class="user-header">
                        <img src="../avatars/<?php echo $_SESSION['avatar']; ?>" class="img-circle" alt="User Image">
                        <br>
                        <p> <b> <?php echo $_SESSION['nombre'] ?>  <?php echo $_SESSION['apellido']?></b></p>

                    </li>
                    <li class="user-footer">
                        <div class="">
                            <a href="SettingsProfile.php?id=<?php echo $_SESSION['id'];?>" class="btn btn-default btn-flat"><i class="fa fa-gears"></i> <span>Editar perfil</span> </a>
                        </div>
                        <div class="">
                            <a href="logout.php" class="btn btn-default btn-flat"><i class="fa fa-user-times"></i> <span>Cerrar Sesion</span></a>
                        </div>
                    </li>
                </ul>
                </li>
                <!-- Control Sidebar Toggle Button -->
            </ul>
        </div>
    </nav>
</header>
<!-- END HEADER -->
<?php
}
?>

<?php
    function Side (){
?>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar ">
<!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
    <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="../avatars/<?php echo $_SESSION['avatar']?>" class="rounded" alt="User Image">
            </div>
            <div class="pull-left info">
                <a href="profile.php"><span class="hidden-xs"><?php echo ucwords($_SESSION['usuario']); ?></span></a>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                <br><br>
                <p><?php echo $_SESSION['nombre'] ?>  <?php echo $_SESSION['apellido']?></p>
            </div>

        </div>

        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">OPCIONES</li>
            <li>
                <a href="index.php">
                    <i class="fa fa-home"></i> <span>Inicio</span>
                </a>
            </li>

            <li>
            <a href="chats.php">
                <i class="fa fa-commenting"></i> <span>Chats</span>
            </a>
            </li>

            <!--
            <li>
                <a href="Calendar.php">
                    <i class="fa fa-calendar"></i> <span>Calendario</span>
                </a>
            </li>

            <li>
                <a href="Mailbox.php">
                    <i class="fa fa-envelope"></i> <span>Mailbox</span>
                </a>
            </li>
            -->

            <li>
                <a href="#">
                    <i class="fa fa-hand-stop-o"></i> <span>Ayuda</span>
                </a>


            <li>
                <a href="terminosjuridicos.php">
                    <i class="fa fa-legal"></i> <span>Terminos Juridicos</span>
                </a>
            </li>

            <li>
                <a href="pages/widgets.html">
                    <i class="fa fa-chain"></i> <span>Enlaces de Interes</span>
                </a>
            </li>
        </ul>

    </section>
    <!-- /sidebar -->
</aside>
<?php
}
?>