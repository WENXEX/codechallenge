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
        <h2 class="Inter-titulos ">Lista general de tareas</h2>
        <section class="conten">
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Titulo</span>
          </div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Fecha de inicio</span>
            <span class="gray-separator"></span></div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Fecha de finalizacion</span>
            <span class="gray-separator"></span>
          </div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text"> </span>
            <span class="gray-separator"></span>
          </div>
          <?php 
          //aQUIE VA EL Foreach 
            echo '<div class="div-gap">';
            echo '<span class="Roboto-Flex-regular padding-text">' . $titulo . '</span>';
            echo '</div>';
            echo '<div class="div-gap">';
            echo '<span class="Roboto-Flex-regular padding-text">' . $fecha_inicio . '</span>';
            echo '<span class="gray-separator"></span>';
            echo '</div>';
            echo '<div class="div-gap">';
            echo '<span class="Roboto-Flex-regular padding-text">' . $fecha_finalizacion . '</span>';
            echo '<span class="gray-separator"></span>';
            echo '</div>';
            echo '<div class="div-gap">';
            echo '<span class="Roboto-Flex-regular padding-text">' . $detalles . '</span>';
            echo '<span class="gray-separator"></span>';
            echo '</div>';
            echo '<div class="div-gap">';
            echo '<span class="Roboto-Flex-regular padding-text">' . $detalles . '</span>';
            echo '<span class="gray-separator"></span>';
            echo '</div>';
            echo '<div class="div-gap">';
            echo '<a href="' . $linkdedescarga . '">';
            echo '<svg class="descargar" xmlns="http://www.w3.org/2000/svg"  viewBox="0 0 24 24"><path d="M4 22v-2h16v2zm8-4L5 9h4V2h6v7h4z"/></svg>';
            echo '</a>';
            echo '<span class="gray-separator"></span>';
            echo '</div>';
          ?>
            
          </section>
          
    </main>
</body>
</html>