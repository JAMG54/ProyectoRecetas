<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    session_start();
    header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
    header("Cache-Control: post-check=0, pre-check=0", false);
    header("Pragma: no-cache");
    if ($_SESSION["activada"] == "v" and $_SESSION["tipo"] == "registrado") {
        
        require '../Clases/usuarioRegistrado.php';
        $usuario= new usuarioRegistrado();
        $usuario->obtenerDatos($_SESSION["identificador"]);
        $select=$usuario->obtenerEstado($usuario->getEstado());
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar información</title>
        <script src="../assets/lib/ajax/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <div id="respuesta">
            
        </div>
        <form id="formInfo" method="post" action="../servidor/modificarInformacion.php">
            <input type="text" value="<?=$usuario->getNombre()?>" required id="nombre" name="nombre" placeholder="Nombre">
            <input type="text"  value="<?=$usuario->getPaterno()?>" required id="paterno" name="paterno" placeholder="Apellido paterno">
            <input type="text"  value="<?=$usuario->getMaterno()?>" required id="materno" name="materno" placeholder="Apellido materno">
            <input type="number"  value="<?=$usuario->getEdad()?>" required id="edad" name="edad" placeholder="Edad">
            <input type="email"  value="<?=$usuario->getCorreo()?>" required id="correo" name="correo" placeholder="Correo electrónico">
            <input type="text"  value="<?=$usuario->getOcupacion()?>" required id="ocupacion" name="ocupacion" placeholder="Ocupacion">
            <?=$select?>
            <textarea id="descripcion"  name="descripcion" rows="4" cols="50">
                <?=$usuario->getDescripcion()?>
            </textarea>
            <input type="submit" value="Guardar cambios" id="guardar">
            </form>
        </body>
    </html>
    
<script type="text/javascript">
   $(document).ready(function(){
        $('#guardar').click(function(){
            var datos=$('#formInfo').serialize();
            $.ajax({
                type:"POST",
                url:"../servidor/modificarInformacion.php",
                data:datos,
                success:function(r){
                    var resp=document.getElementById("respuesta");
                    resp.innerHTML="<h7>"+r+"<h7>";
                }
            });
            return false;
        });
    });
</script>
<?php
        } else {
            header("location:../formularios/inicioSesion.php");
        }
?>