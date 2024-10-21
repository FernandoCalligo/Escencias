<?php
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $destino = "fernandocalligo@gmail.com";
    $nombre = htmlspecialchars($_POST["NOMBRE"]);
    $correo = htmlspecialchars($_POST["CORREO"]);
    $telefono = htmlspecialchars($_POST["TELEFONO"]);
    $mensaje = htmlspecialchars($_POST["MENSAJE"]);

    $contenido = "NOMBRE: " . $nombre . "\n" .
                 "CORREO: " . $correo . "\n" .
                 "TELEFONO: " . $telefono . "\n" .
                 "MENSAJE: " . $mensaje;

    // Cabeceras del correo
    $cabeceras = "From: noreply@tudominio.com" . "\r\n" . // Cambia a un dominio válido
                 "Reply-To: " . $correo . "\r\n" .
                 "X-Mailer: PHP/" . phpversion();

    // Enviar el correo y verificar si se envió correctamente
    if (mail($destino, "CONTACTO", $contenido, $cabeceras)) {
        header("Location: index.html"); // Redirige a la página inicial
        exit(); // Detiene la ejecución del script después de redirigir
    } else {
        echo "Hubo un problema al enviar el mensaje. Inténtalo de nuevo.";
    }
} else {
    echo "Método de solicitud no válido.";
}

?>