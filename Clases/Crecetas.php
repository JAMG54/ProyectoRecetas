<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Crecetas
 *
 * @author cristhian
 */
include ("../dataBase/BaseDatos.php");

class Crecetas {

    //put your code here
    public function AgregarReceta($nomP, $origen, $tipoP, $foto, $autor) {
        $resp = "";
        if ($nomP == "" or $origen == "0" or $tipoP == "0" or $foto == "" or $autor == "") {
            
            echo("Hay campos que faltan por llenar \n");
            echo("nom ".$nomP."origen ".$origen."tipo ".$tipoP."foto ".$foto."autor ".$autor);
        } else {

            $conexion = new BaseDatos(); 
            $mysqli = new mysqli($conexion->servidor, $conexion->usuario, $conexion->clave, $conexion->nombreBD);

            if ($mysqli) {
                $procedimiento = "call sp_AgregarReceta('$nomP','$origen','$tipoP','$foto','$autor');";
                $resultado = mysqli_query($mysqli, $procedimiento);

                if (!$resultado) {
                    $resp = "Ocurrió un error en la consulta " . $mysqli->error;
                } else {
                    $fila = mysqli_fetch_assoc($resultado);
                    mysqli_free_result($resultado);
                    $resp = $fila['msg'];
                    $mysqli->close();
                }
            } else {
                $resp = "no se conectó a la BD";
            }
        }

        return $resp;
    }

}
