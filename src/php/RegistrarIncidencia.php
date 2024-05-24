<?php

require 'db_connection.php';

// Verificar si se ha enviado el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Obtener los datos del formulario
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];
    $archivo_nombre = $_FILES['archivo']['name'];
    $archivo_temporal = $_FILES['archivo']['tmp_name'];
    $ruta_archivo = 'public/' . $archivo_nombre; // Ruta donde se guardará el archivo

    // Mover el archivo a la carpeta deseada
    move_uploaded_file($archivo_temporal, $ruta_archivo);

    try {
        // Preparar la consulta SQL para insertar datos en la tabla incidencias
        $sql = "INSERT INTO incidencias (titulo, descripcion, Archivo, fecha, id_estado, id_usuario) 
                VALUES (:titulo, :descripcion, :archivo, NOW(), :id_estado, :id_usuario)";
        
        // Preparar la sentencia
        $stmt = $pdo->prepare($sql);
        
        // Bind de los parámetros
        $stmt->bindParam(':titulo', $titulo);
        $stmt->bindParam(':descripcion', $descripcion);
        $stmt->bindParam(':archivo', $ruta_archivo);
        // Aquí debes definir id_estado e id_usuario según tu lógica de negocio
        $id_estado = 1; // Por ejemplo, asumiendo que el estado inicial es 1
        $id_usuario = 1; // Por ejemplo, asumiendo que el usuario actual tiene id 1
        $stmt->bindParam(':id_estado', $id_estado);
        $stmt->bindParam(':id_usuario', $id_usuario);
        
        // Ejecutar la sentencia
        $stmt->execute();
        
        // Redireccionar o mostrar un mensaje de éxito
        // Por ejemplo:
        // header("Location: incidencias.php");
        // exit();
        echo "La incidencia se ha agregado correctamente.";
    } catch (PDOException $e) {
        // Manejar errores de la base de datos
        echo "Error al insertar la incidencia: " . $e->getMessage();
    }
}
?>
