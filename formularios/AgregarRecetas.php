<?php
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
   // if ($_SESSION["activada"]=="v" and $_SESSION["tipo"]=="registrado") {
?>
<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
     <script src="../assets/lib/ajax/jquery-3.2.1.min.js"></script>
     <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.js" type="text/javascript"></script>
     <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.9/localization/messages_es.js" type="text/javascript"></script>
     <script src="script.js" type="text/javascript"></script>
    </head>
    <body>
        <div id="respuesta">
            
        </div>
        <form id="formRegistro" method="POST" action="../servidor/AgregarRecetas.php" enctype="multipart/form-data">
             <input type="text" required id="NombrePlatillo" name="NombrePlatillo" placeholder="Nombre del Platillo">
             
             <select id="estado" required name="estado" id="estado">
                <option value="0">Seleccione un estado--></option>
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
             
             <select id="tipoP" required name="tipoP">
                 <option value="0">Seleccione el tipo al que pertenece--></option>
                 <option value ="1">Desayuno</option>
                 <option value ="2">Almuerzo</option>
                 <option value ="3">Cena</option>
                 <option value ="4">Merienda</option>
                 <option value ="5">Bebida</option>
                 <option value ="6">Postre</option>
             </select>
              
             <input type="file" id="imagen" name="imagen" required/>
             
             <input type="hidden" id="idAutor" name="idAutor" value="1"/>
             
             <input type="submit" id="guardar" name="guardar"/>
        </form>
        
        <script type="text/javascript">
   $(document).ready(function(){
        $('#guardar').click(function(){
            var datos=$('#formRegistro').serialize();
            $.ajax({
                type:"POST",
                url:"../servidor/AgregarRecetas.php",
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
        
        <?php
   // }else{
      //  header("location:../formularios/inicioSesion.php");
    //}
        ?>
    </body>
</html>
