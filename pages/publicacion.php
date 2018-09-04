<?php
    $conexion = new mysqli( 'localhost', 'root', '', 'legislappbd');

    $CantidadMostrar=5;
    // Validado  la variable GET
    $compag=(int)(!isset($_GET['pag'])) ? 1 : $_GET['pag'];
    $TotalReg = mysqli_query("SELECT * FROM publicacion", $conexion);
    $totalr = mysqli_num_rows($TotalReg);
    //Se divide la cantidad de registro de la BD con la cantidad a mostrar
    $TotalRegistro  =ceil($totalr/$CantidadMostrar);
    //Operacion matematica para mostrar los siquientes datos.
    $IncrimentNum =(($compag +1)<=$TotalRegistro)?($compag +1):0;
    //Consulta SQL
    $consultavistas ="SELECT * FROM publicacion ORDER BY IdPublicacion DESC LIMIT ".(($compag-1)*$CantidadMostrar)." , ".$CantidadMostrar;
    $consulta=IDU($consultavistas);

    while ($lista=mysqli_fetch_array($consulta)) {

    $userid = ($lista['IdUsuario']);

    $usuariob = IDU("SELECT * FROM usuario WHERE  IdUsuario= '$userid'");
    $use = mysqli_fetch_array($usuariob);

    $fotos = IDU("SELECT * FROM fotos WHERE IdPublicacion = ".$lista['IdPublicacion']);
    $fot = mysqli_fetch_array($fotos);
    ?>
    <!-- START PUBLICACIONES -->
    <div class="box ">
        <div class="box-header with-border">
            <div class="user-block">
                <img class="img-circle" src="../avatars/<?php echo $use['Avatar']; ?>" alt="User Image">
                <span class="description" onclick="location.href='profile2.php?id=<?php echo $use['IdUsuario'];?>';" style="cursor:pointer; color: #e42222;""><?php echo $use['Usuario'];?></span>
                <span class="description"><?php echo $lista['Fecha'];?></span>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <!-- post text -->
            <p><?php echo $lista['Contenido'];?></p>
            <?php
            if($lista['Archivo'] != 0)
            {
                ?>
            <img src="../publicaciones/<?php echo $fot['Ruta'];?>" height="50%" width="50%">
                <?php
            }
            ?>
            <?php
            // $numcomen = mysqli_num_rows(mysqli_query("SELECT * FROM Comentario WHERE Publicacion = '".$lista['IdPublicacion
            //']."'"));
            ?>
            <!-- Social sharing buttons -->
            <ul class="list-inline">

                <?php
                $query = IDU("SELECT * FROM IdReaccion WHERE post = '".$lista['IdPublicacion']."' AND Idusuario = ".$_SESSION['id']);
                $numPublicaciones = Consultar("SELECT * FROM IdReaccion WHERE post = '".$lista['IdPublicacion']."' AND Idusuario = ".$_SESSION['id']);

                if ($numPublicaciones == 0) { ?>
                    <li><div class="btn btn-sm btn-danger " id="<?php echo $lista['IdPublicacion']; ?>"><i class="fa fa-users"></i>Contactar</div><span id="likes_<?php echo $lista['IdPublicacion']; ?>"> <?php echo $lista['Likes']; ?></span></li>
                    <li><div class="btn btn-sm " id="<?php echo $lista['IdPublicacion']; ?>"><i class="fa fa-lightbulb-o"></i> Me interesa su caso </div><span id="likes_<?php echo $lista['IdPublicacion']; ?>"> <?php echo $lista['Likes']; ?></span></li>
                <?php } ?>

        </div>
        <!-- /.col -->
        <!-- END PUBLICACIONES -->
    </div>

        <?php
        }
        //Validamos el incrementador par que no genere error
        //de consulta
        if($IncrimentNum<=0){}else {
            echo "<a href=\"publicacion.php ? pag=".$IncrimentNum."\">Siguiente</a>";
        }
        ?>
