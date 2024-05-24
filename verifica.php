<?php
session_start();

if ($_POST) {
    $nombre = $_POST['nombre'];
    $contrasena = $_POST['contrasena'];
    $hash = hash('sha256', $contrasena);

    try {
        require "src/php/db_connection.php";
        $statement = $conexion->prepare("SELECT * FROM Usuarios WHERE Nombre = :nombre AND Contrasena = :contrasena");
        $statement->execute(['nombre' => $nombre, 'contrasena' => $hash]);
        $user = $statement->fetch(PDO::FETCH_ASSOC);
        if (!$user) {
            header("Location: Login.php?error=1");
            exit();
        } else {
            $_SESSION['nombre'] = $user["Nombre"];
            $_SESSION['contrasena'] = $user["Contrasena"];
            $_SESSION['id_usuario'] = $user["id"];
            header("Location: index.php");
            exit();
        }
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
        die();
    }
} else {
    header("Location: Login.php");
    exit();
}
?>
