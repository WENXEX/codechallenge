<?php
session_start();
require "src/php/db_connection.php";

// Función para obtener las tareas desde la tabla incidencias
function obtenerTareas($conexion) {
    $sql = "
        SELECT 
            insidencias.titulo, 
            insidencias.descripcion, 
            insidencias.fecha, 
            estados.estados, 
            usuarios.nombre AS coordinador
        FROM 
            insidencias
        JOIN 
            estados ON insidencias.id_estado = estados.id
        JOIN 
            usuarios ON insidencias.id_usuario = usuarios.id";
    
    $statement = $conexion->prepare($sql);
    $statement->execute();
    return $statement->fetchAll(PDO::FETCH_ASSOC);
}

// Obtener las tareas
$tareas = obtenerTareas($conexion);
?>
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
<<<<<<< HEAD
            <a href='' class='RFlex'>Iniciar sesion</a>          
=======
<<<<<<< HEAD

            <?php 
                if (isset($_SESSION['Nombre'])) {
                    echo "<a href='src/php/Administrar.php' class='RFlex gap20'> Administrar</a>";
                    echo "<a href='cerrarsesion.php' class='RFlex'>Cerrar sesión</a>";
                    
                } else {
                    echo "<a href='login.php' class='RFlex'>Iniciar sesion</a>";
                }
            ?>            
=======
            <?php
            session_start();
            if (isset($_SESSION['Nombre'])) {
                $usuarioActivo = $_SESSION['Nombre'];
            
                echo "<a href='src/php/Administrar.php' class='RFlex gap20'> Administrar</a>";
                echo "<a href='cerrarsesion.php' class='RFlex'>Cerrar sesión</a>";
            } else {
              
                echo "<a href='login.php' class='RFlex'>Iniciar sesion</a>";
                
            }
            ?>
                      
>>>>>>> 4c2c56ca11eea8fd424e192c11150d6eddcef766
>>>>>>> 30e660b2631f1d5177324165c00ac9ba3e5a5715
        </div>
    </header> 
    <main>
        <div class="index-lista">
            <h2 class="Inter-titulos ">Lista general de tareas</h2>
        <section class="top-bar">
            <a class="asignadas-button" href=""> 
              Asignadas
            </a> 
            <a class="asignadas-button btn-off" href=""> 
                No asignadas
<<<<<<< HEAD
              </a> 
            </section>
        <section class="content">
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Estado</span>
          </div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Titulo</span>
            <span class="gray-separator"></span></div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Fecha </span>
            <span class="gray-separator"></span>
          </div>
          <div class="div-gap">
            <span class="Roboto-Flex-regular padding-text">Coordinador </span>
            <span class="gray-separator"></span>
          </div>
          </section>
        </div>
          
=======
            </label> 
        </section>
        <section class="content t-asignadas active">
            <div class="div-gap">
                <label class="Roboto-Flex-regular">Estado</label>  
            </div>
            <div class="div-gap">
                <div class="Roboto-Flex-regular padding-text">Título</div>
                <span class="separador"></span>
            </div>
            <div class="div-gap">
                <span class="Roboto-Flex-regular padding-text">Fecha</span>
                <span class="separador"></span>
            </div>
            <div class="div-gap">
                <span class="Roboto-Flex-regular padding-text">Coordinador</span>
                <span class="separador"></span>
            </div>
        </section>
        <section class="content t-noasignadas">
            <div class="div-gap">
                <span class="Roboto-Flex-regular padding-text">Estado</span>  
            </div>
            <div class="div-gap">
                <span class="Roboto-Flex-regular padding-text">Título</span>
                <span class="separador"></span>
            </div>
            <div class="div-gap">
                <span class="Roboto-Flex-regular padding-text">Fecha</span>
                <span class="separador"></span>
            </div>
            <div class="div-gap">
                <span class="Roboto-Flex-regular padding-text">Coordinador</span>
                <span class="separador"></span>
            </div>
        </section>
>>>>>>> 30e660b2631f1d5177324165c00ac9ba3e5a5715
    </main>
</body>
</html>
