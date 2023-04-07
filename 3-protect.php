<?php
session_start();  // Iniciar la sesion

if (isset($_POST["logout"])) {  // Si se ha enviado el formulario de logout
  session_destroy();  // Destruir la sesion
  unset($_SESSION); // Eliminar la variable de sesion
}

if (!isset($_SESSION["user"])) {  // Si el usuario no esta logeado
  header("Location: 1-login.php");  // Redirigir a la pagina de login
  exit(); // Salir del script
}
