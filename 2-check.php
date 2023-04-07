<?php
session_start();

if (isset($_POST["user"]) && !isset($_SESSION["user"])) { // Si el usuario no esta logeado y se ha enviado el formulario

  $dbFile = "psw.dat"; // Archivo de usuarios y contraseñas
  $users = [];  // Array de usuarios

  $handle = fopen($dbFile, 'r');  // Abrir el archivo en modo lectura
  if ($handle) {  // Si se ha podido abrir el archivo
    while (($line = fgets($handle)) !== false) {  // Mientras no se llegue al final del archivo (EOF)
      // Read each line from the file
      $line = trim($line);  // Remueve espacios en blanco al inicio y al final de la cadena
      $lineParts = explode(",", $line); // Divide la cadena en partes usando como separador la coma

      if (count($lineParts) === 2) {  // Si la linea contiene nombre de usuario y contraseña
        $users[$lineParts[0]] = $lineParts[1];  // Guardar el usuario y la contraseña en el array
      }
    }

    fclose($handle);  // Cerrar el archivo

    if (isset($users[$_POST["user"]]) && $users[$_POST["user"]] === $_POST["password"]) { // Si el usuario existe y la contraseña es correcta
      $_SESSION["user"] = $_POST["user"]; // Guardar el usuario en la sesion
      header("Location: 4-showUser.php"); // Redirigir a la pagina showUser (4-showUser.php)
      exit(); // Salir del script
    }
  }

  // Si el usuario no existe o la contraseña es incorrecta
  $failed = true; // Indicar que el login ha fallado
} elseif (isset($_SESSION["user"])) { // Si el usuario ya esta logeado
  header("Location: 4-showUser.php"); // Redirigir a la pagina de usuario
  exit(); // Salir del script
}

// terminar la sesion al salir
if (isset($_POST["logout"])) {  // Si se ha enviado el formulario de logout
  session_destroy();  // Destruir la sesion
  header("Location: 1-letra.php");  // Redirigir a la pagina de login
  exit(); // Salir del script
}

session_destroy();  // Destruir la sesion
