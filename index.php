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
        </div>
    </header> 
    <main class="pddng20">
        <h2 class="Inter-titulos">Tareas</h2>
        <section class="top-bar">
            <input class="dn1" type="checkbox" name="rasignadas" id="rasignadas" checked>
            <label class="btn1 asignadas" for="rasignadas" onclick="toggleSection('t-asignadas')"> 
                Asignadas
            </label> 
            <input class="dn2" type="checkbox" name="t-norasignadas" id="t-norasignadas">
            <label class="btn1 noasignadas" for="t-norasignadas" onclick="toggleSection('t-noasignadas')"> 
                No asignadas
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
    </main>
    <script src="script.js"></script>
</body>
</html>