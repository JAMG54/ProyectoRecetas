<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    include ("../dataBase/BaseDatos.php");
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $mensaje="";
    if ($correo != "" && $clave != "") {
        $obj = new BaseDatos();
        $mysqli = new mysqli($obj->servidor, $obj->usuario, $obj->clave, $obj->nombreBD);
        if ($mysqli->set_charset("utf8")) {
            $consulta = "select * from Usuario_Registrado where contrasenia=md5(?) and Correo_electronico=?";
            if ($preparaConsulta = $mysqli->prepare($consulta)) {
                $preparaConsulta->bind_param('ss', $clave, $correo);
                $preparaConsulta->execute();
                $resultado = $preparaConsulta->get_result();
                if ($resultado->num_rows > 0) {
                    if ($filas = $resultado->fetch_assoc()) {
                        if($filas["Validado"]=="1"){
                            $_SESSION["identificador"] = $filas["id_usuario"];
                            $_SESSION["tipo"] = "registrado";
                            $_SESSION["activada"] = "v";
                            $mensaje="1";
                        }else{
                            $mensaje="Valida tu cuenta en tu correo electrónico.";
                        }
                        
                    }
                }else {
                    $mensaje = "Los datos ingresados son incorrectos";
                }
            } else {//No hubo un usuario
                $mensaje = "Ocurrió un error";
            }
    }
} else {
    $mensaje = "Campos no completos";
}
echo $mensaje;
?>

