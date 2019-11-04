<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Registro usuario.</title>
        <script src="../assets/lib/ajax/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <div id="respuesta">
            
        </div>
        <form  id="formRegistro" method="post" action="../servidor/registroUsuario.php">
            <input type="text" required id="nombre" name="nombre" placeholder="Nombre">
            <input type="text" required id="paterno" name="paterno" placeholder="Apellido paterno">
            <input type="text" required id="materno" name="materno" placeholder="Apellido materno">
            <input type="number" required id="edad" name="edad" placeholder="Edad">
            <input type="email" required id="correo" name="correo" placeholder="Correo electrónico">
            <select id="estado" required name="estado">
                <option value="1">Aguascalientes</option>
                <option value="2">Baja California </option>
                <option value="3">Baja California Sur </option>
                <option value="4">Campeche </option>
                <option value="7">Chiapas </option>
                <option value="8">Chihuahua </option>
                <option value="5">Coahuila </option>
                <option value="6">Colima </option>
                <option value="9">CDMX</option>
                <option value="10">Durango </option>
                <option value="15">Estado de México </option>
                <option value="11">Guanajuato </option>
                <option value="12">Guerrero </option>
                <option value="13">Hidalgo </option>
                <option value="14">Jalisco </option>
                <option value="16">Michoacán </option>
                <option value="17">Morelos </option>
                <option value="18">Nayarit </option>
                <option value="19">Nuevo León </option>
                <option value="20">Oaxaca </option>
                <option value="21">Puebla </option>
                <option value="22">Querétaro </option>
                <option value="23">Quintana Roo </option>
                <option value="24">San Luis Potosí </option>
                <option value="25">Sinaloa </option>
                <option value="26">Sonora </option>
                <option value="27">Tabasco </option>
                <option value="28">Tamaulipas </option>
                <option value="29">Tlaxcala </option>
                <option value="30">Veracruz </option>
                <option value="31">Yucatán </option>
                <option value="32">Zacatecas</option>
            </select>
            <input type="text" required id="ocupacion" name="ocupacion" placeholder="Ocupacion">
            <input type="password" required id="clave" name="clave" placeholder="Clave">
            <input type="submit" value="Enviar" id="guardar">
        </form>  
    </body>
</html>

<script type="text/javascript">
   $(document).ready(function(){
        $('#guardar').click(function(){
            var datos=$('#formRegistro').serialize();
            $.ajax({
                type:"POST",
                url:"../servidor/registroUsuario.php",
                data:datos,
                success:function(r){
                    var resp=document.getElementById("respuesta");
                    resp.innerHTML="<h7>"+r+"<h7>";
                    document.getElementById("formRegistro").reset();
                }
            });
            return false;
        });
    });
</script>