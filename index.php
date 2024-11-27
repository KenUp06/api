<?php
session_start();
// Si ya hay una sesión iniciada, redirigir a la página de éxito
if (isset($_SESSION['user_id'])) {
    header("Location: views/succesfuly.php");
    exit();
}

$error_message = "";

if (isset($_GET['error'])) {
    $error_message = urldecode($_GET['error']);
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="views/CSS/login.css">
    <link rel="stylesheet" href="views/CSS/global-styles.css">
</head>
<body>
    <div class="login-container">
        <h2>Iniciar Sesión</h2>
        
        <form action="controller/user_login_controller.php" method="post" id="formulary"> 
            <label for="username">Correo electrónico</label>
            <input type="text" id="username" name="email" required>
        
            <label for="password">Contraseña</label>
            <input type="password" id="password" name="pass" required>
        
            <button type="submit" name="login-button">Ingresar</button> 
        </form>
        <a id="register-link" href="views/register.php" target="_blank">Registrarme</a>
    </div>

    <!-- Ventana Modal para el mensaje de error -->
    <div id="errorModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <p id="errorMessage"><?php echo $error_message; ?></p>
        </div>
    </div>

    <script>
        window.onload = function() {
            const errorMessage = "<?php echo $error_message; ?>";
            
            if (errorMessage) {
                document.getElementById('errorModal').style.display = "block";
            }
        };

        function closeModal() {
            document.getElementById('errorModal').style.display = "none";
        }
    </script>
</body>
</html>