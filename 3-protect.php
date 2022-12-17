<?php
// (A) START SESSION
session_start();

// (B) LOGOUT REQUEST
if (isset($_POST["logout"])) { // Si se ha enviado el formulario de logout
  session_destroy(); // esta funcion es para destruir la sesion y no dejar rastro de ella en el servidor y en el cliente (navegador).
  unset($_SESSION); // esta funcion es para destruir la sesion y no dejar rastro de ella en el servidor y en el cliente (navegador).
}

// (C) REDIRECT TO LOGIN PAGE IF NOT SIGNED IN
if (!isset($_SESSION["user"])) { // Si no hay usuario logueado
  header("Location: 1-login.php"); // Redirigimos a la pagina de login
  exit(); // Salimos del script
}