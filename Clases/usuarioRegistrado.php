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
    private $descripcion="";
    
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
    
    public function obtenerDatos($idUsuario) {
        $retorno="";
        $obj = new BaseDatos();
        $conexion = new mysqli($obj->servidor, $obj->usuario, $obj->clave, $obj->nombreBD);
        if ($conexion) {
            $query = "call obtenerInformacionPersonal($idUsuario);";
            $resultado = $conexion->query($query);
            if (!$resultado) {
                $retorno = 'No se pudo ejecutar la consulta: ' . $conexion->error;
            } else {
                if($row = $resultado->fetch_assoc()){
                    $this->nombre=$row["Nombre"];
                    $this->paterno=$row["Apellido_Paterno"];
                    $this->materno=$row["Apellido_Materno"];
                    $this->edad=$row["Edad"];
                    $this->correo=$row["Correo_electronico"];
                    $this->estado=$row["Estado_Procedencia"];
                    $this->ocupacion=$row["ocupacion"];
                    $this->descripcion=$row["descripcion_personal"];
                }
                $conexion->close();
            }
        } else {
            echo "No se conectó";
        }
        return $retorno;
    }
    
    public function obtenerEstado($idEstado) {
        $retorno = "";
        $obj = new BaseDatos();
        $conexion = new mysqli($obj->servidor, $obj->usuario, $obj->clave, $obj->nombreBD);
        if ($conexion) {
            $query = "select * from Estados;";
            $resultado = $conexion->query($query);
            if (!$resultado) {
                $retorno = 'No se pudo ejecutar la consulta: ' . $conexion->error;
            } else {
                $retorno .= '<select id="estado" required name="estado">';
                while ($row = $resultado->fetch_assoc()) {
                    if ($row["id_estado"] == $idEstado) {
                        $retorno .= '<option selected value="' . $row["id_estado"] . '">' . $row["Nombre_estado"] . "</option>";
                    } else {
                        $retorno .= '<option value="' . $row["id_estado"] . '">' . $row["Nombre_estado"] . "</option>";
                    }
                }
                $retorno .= '</select>';
                $conexion->close();
            }
        } else {
            echo "No se conectó";
        }
        return $retorno;
    }
    
    public function actualizarInformacion($idUsuario,$nombre,$paterno,$materno,$edad,$correo,$estado,$ocupacion,$descripcion){
        $retorno="";
        $obj = new BaseDatos();
        $conexion = new mysqli($obj->servidor, $obj->usuario, $obj->clave, $obj->nombreBD);
        if ($conexion) {
            $query = "call actualizarInformacion($idUsuario,'$nombre','$paterno','$materno',$edad,'$correo',$estado,'$ocupacion','$descripcion');";
            $resultado = $conexion->query($query);
            if (!$resultado) {
                $retorno = 'No se pudo ejecutar la consulta: ' . $conexion->error;
            } else {
                if($row = $resultado->fetch_assoc()){
                    $retorno=$row["respuesta"];
                }
                $conexion->close();
            }
        } else {
            echo "No se conectó";
        }
        return $retorno;
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPaterno() {
        return $this->paterno;
    }

    public function getMaterno() {
        return $this->materno;
    }

    public function getEdad() {
        return $this->edad;
    }

    public function getCorreo() {
        return $this->correo;
    }

    public function getEstado() {
        return $this->estado;
    }

    public function getOcupacion() {
        return $this->ocupacion;
    }

    public function getClave() {
        return $this->clave;
    }

    public function getDescripcion() {
        return $this->descripcion;
    }
    
}
