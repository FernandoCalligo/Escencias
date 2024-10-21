<?php
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $destino = "fernandocalligo@gmail.com";
    $nombre = $_POST["NOMBRE"];
    $correo = $_POST["CORREO"];
    $telefono = $_POST["TELEFONO"];
    $mensaje = $_POST["MENSAJE"];
    
    $contenido = "NOMBRE: " . $nombre . "\nCORREO: " . $correo . "\nTELEFONO: " . $telefono . "\nMENSAJE: " . $mensaje;
    
    // Envío del correo
    if (mail($destino, "CONTACTO", $contenido)) {
      echo "Correo enviado correctamente.";
    } else {
      echo "Error al enviar el correo.";
    }
    
    // Redirección a una página de confirmación o a la página principal
    header("Location: CELINA_GROUP_SEGUROS.html");
    exit();
  }
?>
