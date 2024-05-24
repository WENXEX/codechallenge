<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <style>
        /* Agrega estilos personalizados para posicionar el botón */
        .div-gap {
            display: flex;
            justify-content: space-between; /* Para centrar horizontalmente */
        }
        .btn-asignar {
            margin-left: auto; /* Para mover el botón al lado derecho */
        }
    </style>
</head>
<body>
    <header>
        <h1 class="Mono-titulos">WorkFlow</h1>
        <div>
            <?php
            session_start();
            if (isset($_SESSION['nombre'])) {
                $usuarioActivo = $_SESSION['nombre'];
                echo "<a href='src/php/Administrar.php' class='RFlex gap20'>Administrar</a>";
                echo "<a href='cerrarsesion.php' class='RFlex'>Cerrar sesión</a>";
            } else {
                echo "<a href='login.php' class='RFlex'>Iniciar sesión</a>";
            }
            ?>
        </div>
    </header> 
    <main class="pddng20">
        <h2 class="Inter-titulos">Tareas</h2>
        <section class="top-bar">
            <input class="dn1" type="checkbox" name="rasignadas" id="rasignadas" checked>
            <label class="btn1 asignadas" for="rasignadas" onclick="toggleSection('t-asignadas')">Asignadas</label>
            <input class="dn2" type="checkbox" name="t-norasignadas" id="t-norasignadas">
            <!-- Modificación: Agrega un evento onclick para abrir otra pestaña -->
            <label class="btn1 noasignadas" for="t-norasignadas" onclick="window.open('noasignados.php', '_blank')">No asignadas</label>
        </section>
        <section class="content t-asignadas active">
            <?php
            require "src/php/db_connection.php";

            function obtenerTareas($conexion) {
                $sql = "
                    SELECT 
                        insidencias.id, 
                        insidencias.titulo, 
                        insidencias.descripcion, 
                        insidencias.fecha, 
                        estados.estados AS estado
                    FROM 
                        insidencias
                    JOIN 
                        estados ON insidencias.id_estado = estados.id
                    WHERE 
                        insidencias.id_usuario IS NULL";

                $statement = $conexion->prepare($sql);
                $statement->execute();
                return $statement->fetchAll(PDO::FETCH_ASSOC);
            }

            $tareas = obtenerTareas($conexion);
            ?>
            <?php if (!empty($tareas)): ?>
                <?php foreach ($tareas as $tarea): ?>
                    <div class="div-gap">
                        <a href="DescripcionIncidencia.php?id=<?php echo htmlspecialchars($tarea['id']); ?>" class="Roboto-Flex-regular padding-text">
                            <?php echo htmlspecialchars($tarea['estado']); ?>
                        </a>
                    </div>
                    <div class="div-gap">
                        <a href="DescripcionIncidencia.php?id=<?php echo htmlspecialchars($tarea['id']); ?>" class="Roboto-Flex-regular padding-text">
                            <?php echo htmlspecialchars($tarea['titulo']); ?>
                        </a>
                        <span class="gray-separator"></span>
                    </div>
                    <div class="div-gap">
                        <a href="DescripcionIncidencia.php?id=<?php echo htmlspecialchars($tarea['id']); ?>" class="Roboto-Flex-regular padding-text">
                            <?php echo htmlspecialchars($tarea['fecha']); ?>
                        </a>
                        <!-- Modificación: Agrega un botón "Asignar" -->
                        <button class="btn-asignar" onclick="window.open('asignar.php?id=<?php echo htmlspecialchars($tarea['id']); ?>', '_blank')">Asignar</button>
                        <span class="gray-separator"></span>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="div-gap">
                    <span class="Roboto-Flex-regular padding-text">No hay tareas asignadas</span>
                </div>
            <?php endif; ?>
        </section>
        
        <!-- Este es el botón para agregar incidencia -->
        <div class="btn">
            <a href="agregar_incidencia.php?id=<?php echo htmlspecialchars($tarea['id']); ?>" class="Roboto-Flex-regular padding-text">
                <?php echo "Agregar Incidencia"; ?>
            </a>
            <span class="gray-separator"></span>
        </div>
    </main>
    
    <script src="script.js"></script>
</body>
</html>
