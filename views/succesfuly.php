<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>¡Logeado correctamente!</title>
    <link rel="stylesheet" href="CSS/success.css"> 
</head>
<body>
    <div id="box-container">
        <div id="green-box">
            <p id="success-text">¡Usuario y contraseña correctos!</p>
            
            <form action="../controller/logout.php" method="post">
                <button type="submit">Cerrar sesión</button>
            </form>
        </div>
    </div>
</body>
</html>
