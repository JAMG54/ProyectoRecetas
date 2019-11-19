<?php

include ("../clases/Crecetas.php");
/*session_start();
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

if ($_SESSION["activada"] == "v" and $_SESSION["tipo"] == "registrado") {
    */
    $nombreR = $_POST["NombrePlatillo"];
    $origen = $_POST["estado"];
    $TipoPla = $_POST["tipoP"];
    $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
    $imagen = $_FILES['imagen']['tmp_name'];
   // $autor = $_SESSION["identificador"];

    $obj = new Crecetas();
    echo("imagen " . $imagen."              "); 
    
    $resp = $obj->AgregarReceta($nombreR, $origen, $TipoPla, $imagen, 1);
    echo($resp);
/*} else {
    
}
*/
    
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

