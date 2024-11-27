<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include("../models/database_connection.php");

session_start(); // Iniciar la sesión al comienzo del archivo

// Inicializar una variable para el mensaje de error
$error_message = "";

// Comprobar si el formulario ha sido enviado
if (isset($_POST['login-button'])) {
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

    if (empty($email) || empty($pass)) {
        $error_message = "Todos los campos son obligatorios. Por favor, rellena todos los campos.";
    } else {
        $stmt = $conexion->prepare("SELECT iduser, username, pass FROM users WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $stmt->store_result();

        if ($stmt->num_rows > 0) {
            $stmt->bind_result($user_id, $user_name, $hashed_pass);
            $stmt->fetch();

            if (password_verify($pass, $hashed_pass)) {
                $_SESSION['user_id'] = $user_id;
                $_SESSION['email'] = $email;
                $_SESSION['user_name'] = $user_name; // Guardar el nombre del usuario
                header("Location: ../views/succesfuly.php");
                exit();
            } else {
                $error_message = "Contraseña incorrecta. Intenta nuevamente.";
            }
        } else {
            $error_message = "No se encontró ningún usuario con ese correo electrónico.";
        }
        $stmt->close();
    }

    if (!empty($error_message)) {
        header("Location: ../index.php?error=" . urlencode($error_message));
        exit();
    }
}
?>