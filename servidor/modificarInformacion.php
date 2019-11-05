
<?php
    
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    if ($_SESSION["activada"] == "v" and $_SESSION["tipo"] == "registrado") {
        include ("../Clases/usuarioRegistrado.php");
        $usuario= new usuarioRegistrado();// esto es un objeto de tipo UsuarioRegistrado

        $nombreUsr=$_POST['nombre'];
        $paterno=$_POST['paterno'];
        $materno=$_POST['materno'];
        $edad=$_POST['edad'];
        $correo=$_POST['correo'];
        $estado=$_POST['estado'];
        $ocupacion=$_POST['ocupacion'];
        $descripcion=$_POST['descripcion'];

        echo $usuario->actualizarInformacion($_SESSION["identificador"], $nombreUsr, $paterno, $materno, $edad, $correo, $estado, $ocupacion, $descripcion);
    } else {
        header("location:../formularios/inicioSesion.php");
    }
?>
