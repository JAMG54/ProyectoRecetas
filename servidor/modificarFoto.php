<?php
    
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    
    if ($_SESSION["activada"] == "v" and $_SESSION["tipo"] == "registrado") {
        include ("../Clases/usuarioRegistrado.php");
        $usuario= new usuarioRegistrado();// esto es un objeto de tipo UsuarioRegistrado
        $opcion = $_POST['opcion']; //1 es para actualizar 0 para registrar 
        $imagen= addslashes(file_get_contents($_FILES['imagen']['tmp_name']));        
        $usuario->modificarImagen($_SESSION["identificador"], $imagen, $opcion);
        header("location:../PaginasServer/miFotoPerfil.php");

    } else {
        header("location:../formularios/inicioSesion.php");
    }
?>