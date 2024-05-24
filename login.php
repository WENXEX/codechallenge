<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form class="Formulario" method="post" action="verifica.php">
        <fieldset class="Formu">
          <div>
            <label>Nombre:</label>
            <input type="text" name="nombre" placeholder="Ingresa tu usuario" required>
          </div>


          <div class="contra">
            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>
          </div>


        </fieldset>

        <div class="dos">
          <div class="bor">
            <button type="submit"><a href="Registro.php" class="re-bo">Registrarse</a></button>
          </div>
          <div class="envi">
            <input type="submit" name="submit" value="Iniciar Sesion">
          </div>
        </div>
      </form>    

</body>
</html>