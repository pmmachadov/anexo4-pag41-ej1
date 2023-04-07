<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <?php
    require "2-check.php";  // Se incluye el script de proteccion

    if (isset($failed)) {   // Si el login ha fallado
    ?>
        <div id="login-bad">Invalid email or password.</div>    <!-- Se muestra un mensaje de error -->
    <?php
    } elseif (isset($_SESSION["user"])) {   // Si el usuario esta logeado
    ?>
        <div id="login-ok"><?php echo $_SESSION["user"]; ?>.</div>  <!-- Se muestra un mensaje de bienvenida -->
        <form id="logout-form" method="post" target="_self">
            <input type="submit" name="logout" value="Log Out"> <!-- Se muestra un formulario de logout -->
        </form>
    <?php
    }
    ?>

    <form id="login-form" method="post" target="_self">
        <h1>PLEASE SIGN IN</h1>
        <label for="user">User</label>
        <input type="text" name="user" required>
        <label for="password">Password</label>
        <input type="password" name="password" required>
        <input type="submit" value="Sign In">
    </form>

</body>

</html>