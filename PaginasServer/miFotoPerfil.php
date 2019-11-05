<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    if ($_SESSION["activada"] == "v" and $_SESSION["tipo"] == "registrado") {
        include '../Clases/usuarioRegistrado.php';
        $usuario=new usuarioRegistrado();
        
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar foto de perfil</title>
        <script src="../assets/lib/ajax/jquery-3.2.1.min.js"></script>
    </head>
    <body>
            <?php
            if ($usuario->verificarFoto($_SESSION["identificador"]) == "0") {
                ?>
                    <img src="../assets/img/default.png" border="1" alt="Foto de perfil" width="400" height="300"><br>
                    <form id="formImagen" action="../servidor/modificarFoto.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="imagen" required id="imagen"/>
                        <input type="hidden" value="0" required name="opcion"/>
                        <input type="submit" value="Registrar foto" id="guardar"/>
                    </form>
             <?php
            } else {
             ?>  
                    <?=$usuario->getFoto($_SESSION["identificador"])?><br>
                     <form id="formImagen" action="../servidor/modificarFoto.php" method="post" enctype="multipart/form-data">
                        <input type="file" name="imagen" required id="imagen"/>
                        <input type="hidden" value="1"  name="opcion"/>
                        <input type="submit" value="Actualizar foto" id="guardar"/>
                    </form>
                <?php
            }
            ?>

    </body>
</html>

<?php
    } else {
        header("location:../formularios/inicioSesion.php");
    }
?>