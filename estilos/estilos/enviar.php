<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Asegúrate de que este sea el camino correcto a autoload.php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destino = "fernandocalligo@gmail.com";
    $nombre = htmlspecialchars($_POST["NOMBRE"]);
    $correo = htmlspecialchars($_POST["CORREO"]);
    $telefono = htmlspecialchars($_POST["TELEFONO"]);
    $mensaje = htmlspecialchars($_POST["MENSAJE"]);

    // Cuerpo del mensaje
    $contenido = "NOMBRE: " . $nombre . "\n" .
                 "CORREO: " . $correo . "\n" .
                 "TELEFONO: " . $telefono . "\n" .
                 "MENSAJE: " . $mensaje;

    $mail = new PHPMailer(true);
    try {
        // Configuración del servidor SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.example.com'; // Cambia esto por el servidor SMTP que elijas
        $mail->SMTPAuth = true;
        $mail->Username = 'tu_correo@example.com'; // Tu correo
        $mail->Password = 'tu_contraseña'; // Tu contraseña
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // Usa el puerto adecuado para tu servidor

        // Destinatarios
        $mail->setFrom('noreply@tudominio.com', 'Nombre del Remitente');
        $mail->addAddress($destino);
        $mail->addReplyTo($correo, $nombre);

        // Contenido del correo
        $mail->isHTML(true);
        $mail->Subject = 'CONTACTO';
        $mail->Body = nl2br($contenido);

        // Enviar el correo
        $mail->send();
        header("Location: index.html"); // Cambia esto por tu página de redirección
        exit();
    } catch (Exception $e) {
        echo "El mensaje no pudo ser enviado. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>
