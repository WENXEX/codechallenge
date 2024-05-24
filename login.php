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


          <div class="contrasena">
            <label>Contraseña:</label>
            <input type="password" name="contrasena" required>
          </div>


        </fieldset>

        <div class="esotilin">
            <button class="btn-azul" type="button" onclick="cancelar()">Cancelar</button>
            <button id="enviar-login" class="btn-azul" type="submit">Aceptar</button>
        </div>
      </form>    

</body>
</html>