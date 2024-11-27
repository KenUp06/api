<?php include("../controller/user_register_controller.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="CSS/register.css">
    <link rel="stylesheet" href="CSS/global-styles.css">
    <link rel="stylesheet" href="CSS/messages.css">
</head>
<body>
    <div class="container">
        <h2>Registro</h2>
        <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="firstname" required>

            <label for="apellido">Apellido:</label>
            <input type="text" id="apellido" name="lastname" required>

            <label for="apodo">Apodo:</label>
            <input type="text" id="apodo" name="username" required>

            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Contraseña:</label>
            <input type="password" id="password" name="pass" required>

            <button type="submit" name="register-button">Registrarse</button>
        </form>
    </div>
</body>
</html>


