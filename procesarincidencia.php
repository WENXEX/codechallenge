<?php
// Asegúrate de tener una conexión válida a la base de datos $pdo
// Aquí asumiendo que ya tienes una conexión establecida

require "src/php/db_connection.php"; // Incluye el archivo de conexión

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = $_POST["titulo"];
    $descripcion = $_POST["descripcion"];

    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] == UPLOAD_ERR_OK) {
        $archivo_nombre = $_FILES['archivo']['name'];
        $archivo_temporal = $_FILES['archivo']['tmp_name'];
        $ruta_archivo = 'public/' . $archivo_nombre; // Ruta donde se guardará el archivo

        if (move_uploaded_file($archivo_temporal, $ruta_archivo)) {
            try {
                // Preparar la consulta SQL para insertar datos en la tabla insidencias
                $sql = "INSERT INTO `insidencias` (`id`, `titulo`, `descripcion`, `Archivo`, `fecha`, `id_estado`, `id_usuario`) 
                        VALUES (NULL, :titulo, :descripcion, :archivo, NOW(), '1', '3')";
                
                // Preparar la sentencia
                $stmt = $conexion->prepare($sql);
                
                // Bind de los parámetros
                $stmt->bindParam(':titulo', $titulo);
                $stmt->bindParam(':descripcion', $descripcion);
                $stmt->bindParam(':archivo', $archivo_nombre); 
                
                // Ejecutar la sentencia
                $stmt->execute();
                header("Location: index.php");
                // Redireccionar o mostrar un mensaje de éxito
                echo "La incidencia se ha agregado correctamente.";
            } catch (PDOException $e) {
                // Manejar errores de la base de datos
                echo "Error al insertar la incidencia: " . $e->getMessage();
            }
        } else {
            // Manejar errores de carga de archivos
            echo "Error al mover el archivo a la carpeta de destino.";
        }
    } else {
        // Manejar errores de carga de archivos
        echo "Error al subir el archivo.";
    }
}
?>
