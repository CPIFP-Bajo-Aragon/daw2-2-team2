<?php

require 'mailer/src/PHPMailer.php';
require 'mailer/src/SMTP.php';
require 'mailer/src/Exception.php';

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer {
    function __construct() {}

     public static function sendEmail($dest, $name) {
        $mail = new PHPMailer(true); // Habilita excepciones

        try {
            // Configuración del servidor SMTP (en este caso, para Gmail)
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'protechbajoaragon@gmail.com';
            $mail->Password = 'lprz ukch ptae drrn';
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;

            // Configuración del correo
            $mail->setFrom('protechbajoaragon@gmail.com', 'Comarca del Bajo Aragon');
            $mail->addAddress($dest, $name);
            $mail->Subject = "Has recibido una nueva notificacion en nuestra plataforma.";
            $mail->isHTML(true);
            $mail->Body = "¡Hola, {$name}! 👋
            <h1>Bienvenido/a a nuestra plataforma</h1>
            <p>Nos complace informarte que tu cuenta ha sido dada de alta con éxito en nuestra plataforma. 🎉 ¡Bienvenido/a a bordo!</p>
            <p>Si tienes alguna pregunta o necesitas asistencia, no dudes en ponerte en contacto con nuestro equipo de soporte. Estamos aquí para ayudarte. 🤝</p>
            <p>¡Gracias por elegirnos y esperamos que disfrutes de todas las funcionalidades que nuestra plataforma tiene para ofrecer!</p>
            <p>Saludos cordiales, <br>
            Comarca Bajo Aragon 🌟</p>
            <img src='https://bajoaragon.es/wp-content/uploads/2021/07/LOGO-C-BAJO-ARAGON-OK.png' alt='' width='auto' height='100'>
            <img src='https://i.ibb.co/p30YwtX/Logo.png' alt='' width='auto' height='100'>";            
            $mail->AltBody = "¡Hola, {$name}!\nTu cuenta ha sido dada de alta con éxito en nuestra plataforma.";

            // Envío del correo
            $mail->send();
        } catch (Exception $e) {
            echo "Error al enviar el correo: {$mail->ErrorInfo}\n";
        }
    }
      

    public static function sendEmailPerdidaContrasena($dest, $cpass) {
      $mail = new PHPMailer(true); // Habilita excepciones

      try {
          // Configuración del servidor SMTP (en este caso, para Gmail)
          $mail->isSMTP();
          $mail->Host = 'smtp.gmail.com';
          $mail->SMTPAuth = true;
          $mail->Username = 'protechbajoaragon@gmail.com';
          $mail->Password = 'lprz ukch ptae drrn';
          $mail->SMTPSecure = 'tls';
          $mail->Port = 587;

          // Configuración del correo
          $mail->setFrom('protechbajoaragon@gmail.com', 'Comarca del Bajo Aragon');
          $mail->addAddress($dest, 'Password');
          $mail->Subject = "Recuperar contraseña";
          $mail->isHTML(true);
          $mail->Body = "<h2>¡Hola, {$dest}!</h2><p>Tu nueva contraseña es $cpass . No compartas esta contraseña con nadie y cambiala una vez entres.</p>";
          $mail->AltBody = "<h2>¡Hola, {$dest}!</h2><p>Tu nueva contraseña es $cpass . No compartas esta contraseña con nadie y cambiala una vez entres.</p>";

          // Envío del correo
          $mail->send();
      } catch (Exception $e) {
          echo "Error al enviar el correo: {$mail->ErrorInfo}\n";
      }
  }
}





