<?php
        session_start();
        header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        if ($_SESSION["activada"]=="v") {
 ?>


    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="UTF-8">
        </head>
        <body>
            Ya estas en la cuenta de usuario registrado
        </body>
    </html>
<?php
        } else {
            header("location:../formularios/inicioSesion.php");
        }
?>