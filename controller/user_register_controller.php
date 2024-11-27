<?php
include("../models/database_connection.php");

// Inicializar una variable para el mensaje de error
$error_message = "";

// Comprobar si el formulario ha sido enviado
if (isset($_POST['register-button'])) {
    // Verificar y asignar variables para evitar "Undefined array key"
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $email = isset($_POST['email']) ? $_POST['email'] : '';
    $pass = isset($_POST['pass']) ? $_POST['pass'] : '';

    // Verificar si alguno de los campos está vacío
    if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($pass)) {
        $error_message = "Todos los campos son obligatorios. Por favor, rellena todos los campos.";
    } else {
        // Comprobar si el correo electrónico ya existe
        $stmt_check = $conexion->prepare("SELECT email FROM users WHERE email = ?");
        $stmt_check->bind_param("s", $email);
        $stmt_check->execute();
        $stmt_check->store_result();

        if ($stmt_check->num_rows > 0) {
            $error_message = "El correo electrónico ya está registrado. Por favor, usa otro.";
        } else {
            // Hashear la contraseña
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

            // Preparar la consulta SQL para insertar un nuevo usuario
            $stmt = $conexion->prepare("INSERT INTO users (firstname, lastname, username, email, pass) VALUES (?, ?, ?, ?, ?)");
            $stmt->bind_param("sssss", $firstname, $lastname, $username, $email, $hashed_password);

            // Ejecutar la consulta y comprobar si se realizó correctamente
            if ($stmt->execute()) {
                // Redirigir al login después de un registro exitoso
                header("Location: ../index.php");
                exit(); // Asegúrate de detener la ejecución del script
            } else {
                $error_message = "Error al registrar el usuario: " . $stmt->error;
            }

            $stmt->close(); // Cerrar la declaración de inserción
        }
        $stmt_check->close(); // Cerrar la declaración de verificación
    }
}
?>



