<?php

include ("../dataBase/BaseDatos.php");
class receta {
    private $nombreplatillo="";
    private $origen=""; 
    private $tipoplantillo="";
    private $autor="";
    private $fotoreceta ="";
    
    

public function obtenerdatos(){
    $retorno="";
        $obj = new BaseDatos();
        $conexion = new mysqli($obj->servidor, $obj->nombre, $obj->nombreBD);
        if ($conexion) {
            $query = "call obtenerInformacionReceta($idReceta);";
            $resultado = $conexion->query($query);
            if (!$resultado) {
                $retorno = 'No se pudo ejecutar la consulta: ' . $conexion->error;
            } else {
                if($row = $resultado->fetch_assoc()){
                    $this->nombre=$row["Nombre_Platillo"];
                    $this->paterno=$row["Origen"];
                    $this->materno=$row["Tipo_Platillo"];
                    $this->edad=$row["Autor_Receta"];
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
        $conexion = new mysqli($obj->servidor, $obj->nombre, $obj->nombreBD);
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
}

