<?php
  $destino= "fernandocalligo@gmail.com";
  $nombre = $_POST["NOMBRE"];
  $correo = $_POST["CORREO"];
  $telefono = $_POST["TELEFONO"];
  $mensaje = $_POST["MENSAJE"];
  $contenido = "NOMBRE". $nombre . "\nCORREO: ". $correo .  "\TELEFONO: " . $telefono . "\MENSAJE: " . $mensaje;
  mail($destino, "CONTACTO", $contenido);
  header("location: CELINA GROUP SEGUROS.html");
?>