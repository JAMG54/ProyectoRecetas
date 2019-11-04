<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
    $validacion = isset($_REQUEST["r"])?$_REQUEST["r"]:""; // recibe el idUsuario desde el link del correo electrónico
    if($validacion!=""){
        require '../Clases/usuarioRegistrado.php';
        $usuarioValido=new usuarioRegistrado();
        $validacion=$usuarioValido->validarRegistro($validacion);
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Inicio sesión.</title>
        <script src="../assets/lib/ajax/jquery-3.2.1.min.js"></script>
    </head>
    <body>
        <div id="mensaje">
            <h7><?=$validacion?></h7>
        </div>
        
        <div id="formulario">
            <form id="formSes">
                <input type="email" required id="correo" name="correo" placeholder="Correo electrónico">
                <input type="password" required id="clave" name="clave" placeholder="Clave">
                <input type="submit" value="Enviar" id="guardar">
            </form>
        </div>
    </body>
</html>
<script type="text/javascript">
   $(document).ready(function(){
        $('#guardar').click(function(){
            var datos=$('#formSes').serialize();
            $.ajax({
                type:"POST",
                url:"../servidor/iniciarSesion.php",
                data:datos,
                success:function(r){
                    if(r==1){
                        window.locationf="../PaginasServer/cuentaRegistrado.php";                    
                    }else{
                        var resp=document.getElementById("mensaje");
                        resp.innerHTML="<h7>"+r+"<h7>";
                        document.getElementById("formSes").reset();
                    }
                    
                }
            });
            return false;
        });
    });
</script>