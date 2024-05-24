<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listbox Responsiva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        label, select, button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Listbox Responsiva</h1>
    <form>
        <label for="opciones">Selecciona una opción:</label>
        <select id="opciones" name="opciones">
            <?php
            // Simulación de datos de opciones desde una base de datos
            $opciones = array("Opción 1", "Opción 2", "Opción 3", "Opción 4", "Opción 5");

            // Generar opciones dinámicamente
            foreach ($opciones as $opcion) {
                echo "<option value='$opcion'>$opcion</option>";
            }
            ?>
        </select>
        
        <button type="submit">Seleccionar</button>
    </form>
</body>
</html>

<?php
// Datos originales
$datos_originales = "Hola, mundo";

// Generar hash utilizando el algoritmo SHA-256
$hash = hash('sha256', $datos_originales);

echo "Hash generado: $hash <br>";

// Simular recepción de datos y verificación de integridad
$datos_recibidos = "Hola, mundo";
$hash_recibido = hash('sha256', $datos_recibidos);

echo "Hash recibido: $hash_recibido <br>";

// Verificar integridad
if (hash_equals($hash, $hash_recibido)) {
    echo "Los hashes coinciden. Los datos no han sido modificados. <br>";
} else {
    echo "Los hashes no coinciden. Los datos pueden haber sido modificados. <br>";
}
?>


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

<?php

session_start();
if (!isset($_SESSION['correo'])) {
        header("Location: Iniciar_Sesion.php");
} else {
        $usuario = $_SESSION["correo"];
        $usuario_id = $_SESSION["user_id"];
}
include 'db_connection.php';

try {
        $sql = "SELECT p.*, c.cantidad, c.total 
            FROM carrito_compras c 
            INNER JOIN productos p 
            ON c.producto_id = p.id 
            WHERE c.usuario_id = :id";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':id', $usuario_id);
        $stmt->execute();

        $carrito = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($carrito) {
                header('Content-Type: application/json');
                echo json_encode($carrito);
        } else {
                echo json_encode(['mensaje' => 'No hay datos en el carrito']);
        }
} catch (PDOException $e) {
        echo json_encode(array('error' => 'Error de base de datos: ' . $e->getMessage()));
} finally {
        if ($conexion) {
                $conexion = null;
        }
}
?>