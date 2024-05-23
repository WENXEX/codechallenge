<?php
session_start();
if (isset($_GET['id'])) {
  $id = $_GET['id'];
} else {
  $id = 1;
}
if (!isset($_SESSION['nombre'])) {
} else {
  $usuarioActivo = $_SESSION['nombre'];
  $contrasena = $_SESSION['contrasena'];
  $id_usuario = $_SESSION['id_usuario'];
}
?>
<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="Estilo6.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Foro</title>

</head>

<body>
  <header>
    <div class="cas">
      <h2>FotoMania</h2>
      <h4>Blog enfocado en la fotografia</h4>
    </div>
    <div class="reslo">
      <?php
      if (isset($_SESSION['nombre'])) {
        echo "</br>";
        echo "<h2 class='usuario'>" . 'Bienvenid@: ' . $usuarioActivo . "</h2>";
        echo "<a class='usu' href ='cerrarSesion.php'> Cerrar Sesion </a>";
        echo "<a class='usu' href ='ad.php'> </br>Administrar </a>";
      }
      ?>
    </div>
  </header>
  <div>
    <nav>

      <a href="index.php">Inicio</a>
      <a href="Registro.php">Registro</a>
      <a href="Login.php">Login</a>
      <a href="agregarTema.php">Crear Tema</a>
    </nav>

  </div>



  <?php
  if (isset($_GET['aviso']) && $_GET['aviso'] == 1) {
    echo '<p style="color: red ;text-align: center;">Usuario registrado exitosamente</p>';
  }
  ?>

  <div class="container">
    <aside class="Cont">
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

    </aside>



    <aside class="sidebar">
      <nav>
        <?php
        require("conexion.php");
        $sql = "SELECT * FROM temas";
        $stmt = $conexion->query($sql);
        $temas = $stmt->fetchAll(PDO::FETCH_ASSOC);
        ?>
        <ul>
          <h3>Temas de interes</h3>
          <?php
          foreach ($temas as $tema) {
            echo "<li><a href='index.php?id=" . $tema['id'] . "'>" . $tema['titulo'] . "</a></li>";
          }
          ?>
          <br>
          <a href="agregarTema.php">--Crear Tema--</a>
        </ul>
      </nav>
    </aside>
  </div>

  <footer>
    <p>@BlogFotomania</p>
    <p>Todos los datos compartidos son confidenciales.</p>
  </footer>
</body>

</html>