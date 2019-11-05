<?php
        session_start();
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        if ($_SESSION["activada"]=="v" and $_SESSION["tipo"]=="registrado") {
 ?>


    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
            <a href="../PaginasServer/miInformacion.php">Modificar mi información</a>
            <a href="../PaginasServer/miFotoPerfil.php">Agregar o modificar foto de perfil</a>
            <a href="">Cambiar mi contrasenia</a>
        </body>
    </html>
<?php
        } else {
            header("location:../formularios/inicioSesion.php");
        }
?>