<?php

require "3-protect.php";  // Se incluye el script de proteccion

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

<head>
  <title>Demo Page</title>
</head>

<body>
  <form method="post">
    <input type="hidden" name="logout" value="1">
    <input type="submit" value="Sign Out">
  </form>
  <h2>Welcome to the web <?= $_SESSION["user"] ?></h2>  <!-- Se muestra un mensaje de bienvenida -->

</body>

</html>
