<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of UsuarioVisitante
 *
 * @author USER
 */

include ("../dataBase/BaseDatos.php");
include ("../Clases/correo.php");

class usuarioVisitante {
    
    private $mail;
    
    public function registrarUsuario($nombreUsr ,$paterno,$materno ,$edad,$correo ,$estado,$clave,$ocupacion){
         $retorno="";
        
        if($nombreUsr =="" or $paterno=="" or $materno =="" or $edad=="" or $correo =="" or $estado=="" or $clave =="" or $ocupacion==""){
            $retorno="Falta llenar campos";
        }else{
            $obj = new BaseDatos();
            $conexion = new mysqli($obj->servidor, $obj->usuario, $obj->clave, $obj->nombreBD); 
            if ($conexion) { 
                $query = "call registrarUsuario('$nombreUsr','$paterno','$materno',$edad,'$correo',$estado,'$clave','$ocupacion');"; 
                $resultado = $conexion->query($query); 
                if (!$resultado) { 
                    $retorno= 'No se pudo ejecutar la consulta: ' . $conexion->error;
                } else {
                    $row=$resultado->fetch_assoc();
                    $retorno=$row['respuesta'];
                    if($retorno!="0"){
                        $this->mail=new correo();
                        $this->mail->mandarCorreoValidacion($correo,$retorno);
                        $retorno="Registrado.Valida tu cuenta desde tu correo electrónico.";
                    }else{
                        $retono="Este regitro ya existe.";
                    }
                    $conexion->close();
                }
            } else {
                echo "No se conectó";
            }
        }
        return $retorno;
    }
}
