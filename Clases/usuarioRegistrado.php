<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of usuarioRegistrado
 *
 * @author USER
 */
include ("../dataBase/BaseDatos.php");

class usuarioRegistrado {
    private $nombre="";
    private $paterno=""; 
    private $materno="";
    private $edad=0;
    private $correo=""; 
    private $estado="";
    private $ocupacion="";
    private $clave="";
    
    public function validarRegistro($idUsuario){
        $retorno="";
        $obj = new BaseDatos();
        $conexion = new mysqli($obj->servidor, $obj->usuario, $obj->clave, $obj->nombreBD); 
        if ($conexion) { 
            $query = "call validarCuenta($idUsuario);"; 
            $resultado = $conexion->query($query); 
            if (!$resultado) { 
                $retorno= "<font color='red'>Ha ocurrido un error.</font>";
            } else {
                $retorno="<font color='green'>Cuenta validada</font>";
                $conexion->close();
            }
        } else {
            echo "No se conectó";
        }
        return $retorno;
    }
    
}
