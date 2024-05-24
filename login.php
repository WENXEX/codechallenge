<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body class="login">
    <form class="login-div" method="post" action="verifica.php">
        <h3>Inicio de sesión</h3>
        <div>
            <label for="nombre">
                Usuario
                <input type="text" id="nombre" name="nombre" class="input-style" placeholder="Ingresa tu usuario">
            </label>
            <label for="contrasena">
                Contraseña
                <input type="password" id="contrasena" name="contrasena" class="input-style" placeholder="Contraseña">
            </label>
        </div>
        <button class="btn-azul" type="submit">Entrar</button>
    </form>
</body>
</html>
