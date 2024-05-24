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
    <div>
        <?php
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
        <label class="btn1 noasignadas" for="t-norasignadas" onclick="toggleSection('t-noasignadas')">No asignadas</label>
    </section>
    <section class="content t-asignadas active">
        <table>
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Coordinador</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($tareas as $tarea): ?>
                <tr>
                    <td><?php echo htmlspecialchars($tarea['estado']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['titulo']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['fecha']); ?></td>
                    <td><?php echo htmlspecialchars($tarea['coordinador']); ?></td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </section>
    <section class="content t-noasignadas">
        <table>
            <thead>
                <tr>
                    <th>Estado</th>
                    <th>Título</th>
                    <th>Fecha</th>
                    <th>Coordinador</th>
                </tr>
            </thead>
            <tbody>
                <!-- Aquí irían las tareas no asignadas, si es que tienes una distinción -->
            </tbody>
        </table>
    </section>
</main>
<script src="script.js"></script>
</body>
</html>
