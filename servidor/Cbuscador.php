<?php
include("../dataBase/BaseDatos.php");

if($_POST["texto"] != ""){
    $obj = new BaseDatos();
    $conexion = new mysqli($obj->servidor, $obj->usuario, $obj->clave, $obj->nombreBD); 
    
    if($conexion){
        $query = "call sp_BuscadorRecetas('".$_POST["texto"]."');";
    }
    $tmp = "<div>"
            . "<table>"
            . "<tr>"
            . "<td>Nombre</td><td>Edad</td><td>Correo</td>"
            . "";
    $res = mysqli_query($conexion,$query);
    while($row= mysqli_fetch_array($res)){
        $tmp .= "<tr>"
                . "<td>".$row["nombre"]."</td>"
                . "<td>".$row["Edad"]."</td>"
                . "<td>".$row["Correo_electronico"]."</td>"
                . "<td>Ver Receta</td>"
                . "</table>"
                . "</div>";
    }
    echo $tmp;
    
}
?>

