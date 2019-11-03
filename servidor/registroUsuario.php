<?php
    include ("../Clases/usuarioVisitante.php");
    $usuarioNuevo = new usuarioVisitante();// esto es un objeto de tipo Usuario

    $nombreUsr=$_POST['nombre'];
    $paterno=$_POST['paterno'];
    $materno=$_POST['materno'];
    $edad=$_POST['edad'];
    $correo=$_POST['correo'];
    $estado=$_POST['estado'];
    $clave=$_POST['clave'];
    $respuestaMetodo=$usuarioNuevo->registrarUsuario($nombreUsr, $paterno, $materno, $edad, $correo, $estado, $clave);
    echo $respuestaMetodo;
?>