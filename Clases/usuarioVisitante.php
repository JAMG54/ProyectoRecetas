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

class usuarioVisitante {
    private $nombre="";
    private $paterno=""; 
    private $materno="";
    private $edad=0;
    private $correo=""; 
    private $estado="";
    
    
    public function registrarUsuario($nombreUsr ,$paterno,$materno ,$edad,$correo ,$estado,$clave){
         $retorno="";
        
        if($nombreUsr =="" or $paterno=="" or $materno =="" or $edad=="" or $correo =="" or $estado=="" or $clave ==""){
            $retorno="Falta llenar campos";
        }else{
            $obj = new BaseDatos();
            $conexion = new mysqli($obj->servidor, $obj->usuario, $obj->clave, $obj->nombreBD); 
            if ($conexion) { 
                $query = "call registrarUsuario('$nombreUsr','$paterno','$materno',$edad,'$correo',$estado,'$clave');"; 
                $resultado = $conexion->query($query); 
                if (!$resultado) { 
                    $retorno= 'No se pudo ejecutar la consulta: ' . $conexion->error;
                } else {
                    $row=$resultado->fetch_assoc();
                    $retorno=$row['respuesta'];
                    $conexion->close();
                }
            } else {
                echo "No se conectó";
            }
        }
        return $retorno;
    }
}
