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
  <link rel="stylesheet"
    href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;700&family=Roboto:wght@400;700&family=Poppins:wght@400;700&display=swap">
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
        $usuarioActivo = $_SESSION['nombre'];
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
      <h1 class="text">
        <?php

        require("conexion.php");
        $sql = "SELECT titulo FROM temas WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);
        echo $resultado['titulo'];
        ?>
      </h1>
      <p class="text">
        Descubre algunos consejos básicos.
      </p>
      </br>
      <div class="acom">
        <?php

        require("conexion.php");
        $sql = "SELECT descripcion FROM temas WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();

        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($resultado) {
          // Mostrar los datos
          $descripcion = $resultado['descripcion'];

          // Dividir el texto en oraciones y agregar <br> después de cada punto y aparte
          $oraciones = explode('. ', $descripcion);

          foreach ($oraciones as $oracion) {
            
            echo ''.$oracion . '<br><br>'.'';
            
          }
        }

        ?>
        <?php
        require("conexion.php");
        $sql = "SELECT foto FROM temas WHERE id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

        ?>
        <img src='<?php echo $resultado['foto']; ?>' alt='portada' class="portada"
          style="border-radius: 10px;width: auto;height: auto; margin-left: 10px;">
      </div>
      </br>



      <br />
      <p class="text">
        Descubre y comparte las ideas de otras personas, compara tus opiniones y disfruta de una gran variedad de temas.
      </p>

      <?php
      $id_tema = $id;
      require("conexion.php");

      // Consulta para obtener la información del usuario
      $sql_combinada = "SELECT DISTINCT usuario.foto_usuario, usuario.nombre, restemas.*
      FROM usuario
      JOIN restemas ON usuario.id_usuario = restemas.id_usuario
      WHERE restemas.id_tema = :id_tema";

      $query_combinada = $conexion->prepare($sql_combinada);
      $query_combinada->bindParam(':id_tema', $id_tema, PDO::PARAM_INT);
      $query_combinada->execute();
      $resultados_combinados = $query_combinada->fetchAll(PDO::FETCH_ASSOC);

      // Comprobar si hay respuestas
      if ($query_combinada->rowCount() > 0) {
        foreach ($resultados_combinados as $resultado_combinado) {
          echo '<div class="comentario">';
          echo '<img src="' . $resultado_combinado['foto_usuario'] . '" alt="Foto de Usuario" class="foto-usuario">';
          echo '<div class="info-usuario">';
          echo '<h3 class="nombre-usuario">' . $resultado_combinado['nombre'] . '</h3>';
          echo '<p class="fecha-comentario">' . $resultado_combinado["fecha"] . '</p>';
          echo '</div>';
          echo '<p class="texto-comentario">' . $resultado_combinado["respuesta"] . '</p>';
          echo '</div>';
        }
      } else {
        echo "<br>";
        echo "Sin comentarios."; // No hay respuestas disponibles
      }

      ?>




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

  <div class="respuestas">
    <?php

    require("conexion.php");
    $sql = "SELECT id FROM temas WHERE id = :id";
    $stmt = $conexion->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $resultado = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($_SESSION['nombre'])) {
      ?>
      <form action="pubres.php" method="POST" enctype="multipart/form-data">
        <textarea name="respuesta" rows="4" cols="50" placeholder="Escribe tu respuesta aquí" required></textarea>
        <div class="botones_respuesta">
          <input type="submit" value="Publicar">
          <input type="hidden" name="id_tema" value='<?php echo $resultado['id']; ?>'>
          <?php
          require("conexion.php");
    }


    ?>
      </div>

  </div>
  <footer>
    <p>@BlogFotomania</p>
    <p>Todos los datos compartidos son confidenciales.</p>
  </footer>
</body>

</html>