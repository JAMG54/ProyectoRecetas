<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of correo
 *
 * @author USER
 */
require_once('../assets/lib/PHPMailer/class.phpmailer.php');
require_once("../assets/lib/PHPMailer/class.smtp.php");



class correo {

    private $cuerpo = "";
    private $email_user = "loyolafundacion@gmail.com";
    private $email_password = "ELBROMAS58";
    private $the_subject = "REGISTRO EXITOSO";
    private $address_to = "";
    private $from_name = "RECETARIO ONLINE";

    public function getCuerpo($idUsuario) {
        $cuerpo = "";
        $cuerpo .= "<html>
                    <head>
                        <meta charset='UTF-8'>
                        <title>Inicio sesión.</title>
                    </head>";
        $cuerpo .= "<body>";
        $cuerpo .= "<center>";
        $cuerpo .= "<h7>Tu registro se ha realizado con exito. Ingresa a este link para validar tu cuenta.</h7><br>";
        $cuerpo .= "<a  href='http://localhost/ProyectoRecetas/formularios/inicioSesion.php?r=" . $idUsuario . "'>" . "Da clic aqui" . "</a>";
        $cuerpo .= "</center>";
        $cuerpo .= "</body>";
        $cuerpo .= "</html>";

        return $cuerpo;
    }

    public function mandarCorreoValidacion($destinatario, $idUsuario) {
        $retorno = "";
        //Crear una instancia de PHPMailer
        $mail = new PHPMailer();
//Definir que vamos a usar SMTP
        $mail->IsSMTP();
//Esto es para activar el modo depuración. En entorno de pruebas lo mejor es 2, en producción siempre 0
// 0 = off (producción)
// 1 = client messages
// 2 = client and server messages
        $mail->SMTPDebug = 0;
//Ahora definimos gmail como servidor que aloja nuestro SMTP
        $mail->Host = 'smtp.gmail.com';
//El puerto será el 587 ya que usamos encriptación TLS
        $mail->Port = 587;
//Definmos la seguridad como TLS
        $mail->SMTPSecure = 'tls';
        
//Tenemos que usar gmail autenticados, así que esto a TRUE
        $mail->SMTPAuth = true;
//Definimos la cuenta que vamos a usar. Dirección completa de la misma
        $mail->Username = $this->email_user;
//Introducimos nuestra contraseña de gmail
        $mail->Password = $this->email_password;
//Definimos el remitente (dirección y, opcionalmente, nombre)
        $mail->SetFrom($this->email_user);
        $mail->smtpConnect(
                array(
                    "ssl" => array(
                        "verify_peer" => false,
                        "verify_peer_name" => false,
                        "allow_self_signed" => true
                    )
                )
        );
//Y, ahora sí, definimos el destinatario (dirección y, opcionalmente, nombre)
        $mail->AddAddress($destinatario);
//Definimos el tema del email
        $mail->Subject = $this->the_subject;
//Para enviar un correo formateado en HTML lo cargamos con la siguiente función. Si no, puedes meterle directamente una cadena de texto.
       // $mail->MsgHTML(file_get_contents('correomaquetado.html'), dirname(ruta_al_archivo));
       $this->cuerpo= $this->getCuerpo($idUsuario);
       $mail->MsgHTML($this->cuerpo);

//Y por si nos bloquean el contenido HTML (algunos correos lo hacen por seguridad) una versión alternativa en texto plano (también será válida para lectores de pantalla)
     //   $mail->AltBody = 'This is a plain-text message body';
//Enviamos el correo
        if (!$mail->Send()) {
            $retorno= "Error: " . $mail->ErrorInfo;
        } else {
            $retorno= "Enviado!";
        }
        return $retorno;
    }

}
