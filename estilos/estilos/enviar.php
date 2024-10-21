<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = htmlspecialchars($_POST['NOMBRE']);
    $correo = htmlspecialchars($_POST['CORREO']);
    $telefono = htmlspecialchars($_POST['TELEFONO']);
    $mensaje = htmlspecialchars($_POST['MENSAJE']);

    // Configuración del correo
    $para = "tucorreo@ejemplo.com";  // El correo donde quieres recibir los mensajes
    $asunto = "Nuevo mensaje de contacto";
    
    // Cuerpo del mensaje
    $cuerpo = "Has recibido un nuevo mensaje de contacto.\n\n";
    $cuerpo .= "Nombre: " . $nombre . "\n";
    $cuerpo .= "Correo: " . $correo . "\n";
    $cuerpo .= "Teléfono: " . $telefono . "\n";
    $cuerpo .= "Mensaje:\n" . $mensaje . "\n";

    // Cabeceras (opcional pero recomendado para evitar que el correo llegue a spam)
    $cabeceras = "From: noreply@tu-dominio.com" . "\r\n" .
                 "Reply-To: " . $correo . "\r\n" .
                 "X-Mailer: PHP/" . phpversion();

    // Enviar el correo
    if (mail($para, $asunto, $cuerpo, $cabeceras)) {
        echo "El mensaje se ha enviado correctamente.";
    } else {
        echo "Hubo un problema al enviar el mensaje.";
    }
}
?>
