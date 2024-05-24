<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1 class="Mono-titulos">WorkFlow</h1>
        <div >
            <a href='' class='RFlex'>Iniciar sesion</a>          
        </div>
    </header> 
    <main>
        <h2 class="Inter-titulos">Lista general de tareas</h2>
        <section class="conten">
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Titulo</span>
          </div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Fecha de inicio</span>
            <span class="gray-separator"></span>
          </div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Fecha de finalizacion</span>
            <span class="gray-separator"></span>
          </div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Descripción</span>
            <span class="gray-separator"></span>
          </div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Acciones</span>
            <span class="gray-separator"></span>
          </div>
          
          <!-- Aquí empieza la parte PHP para generar las tareas -->
          <?php
            // Suponiendo que tienes una lista de tareas en un array llamado $tareas
            foreach ($tareas as $tarea) {
              echo '
              <div class="div-gap">
                <span class="Roboto-Flex-regular padding-text">' . $tarea['titulo'] . '</span>
              </div>
              <div class="div-gap">
                <span class="Roboto-Flex-regular padding-text">' . $tarea['fecha_inicio'] . '</span>
                <span class="gray-separator"></span>
              </div>
              <div class="div-gap">
                <span class="Roboto-Flex-regular padding-text">' . $tarea['fecha_finalizacion'] . '</span>
                <span class="gray-separator"></span>
              </div>
              <div class="div-gap">
                <textarea class="Roboto-Flex-regular padding-text">' . $tarea['descripcion'] . '</textarea>
                <span class="gray-separator"></span>
              </div>
              <div class="div-gap">
                <a href="' . $tarea['link_de_descarga'] . '">
                  <svg class="descargar" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><path d="M4 22v-2h16v2zm8-4L5 9h4V2h6v7h4z"/></svg>
                </a>
                <span class="gray-separator"></span>
              </div>';
            }
          ?>
          <!-- Fin del bucle PHP -->
        </section>
    </main>
</body>
</html>
