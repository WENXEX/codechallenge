<?php
include 'src/php/db_connection.php';

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Recoger los datos del formulario
    $titulo = isset($_POST['titulo']) ? $_POST['titulo'] : '';
    $descripcion = isset($_POST['descripcion']) ? $_POST['descripcion'] : '';
    $archivo = isset($_FILES['archivo']['name']) ? $_FILES['archivo']['name'] : '';
    $fecha = date('Y-m-d'); // Fecha actual
    $id_estado = 1; // ID del estado de la incidencia (por ejemplo, "nueva")
    $id_usuario = 1; // ID del usuario que reporta la incidencia (debes obtenerlo de la sesión o de algún otro lugar)

    // Guardar el archivo en el servidor
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["archivo"]["name"]);
    $uploadOk = 1;
    $fileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Verificar si el archivo es un PDF
    if ($fileType != "pdf") {
        $uploadOk = 0;
        $response['success'] = false;
        $response['error'] = "Solo se permiten archivos PDF.";
    }

    // Intentar subir el archivo
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["archivo"]["tmp_name"], $target_file)) {
            // Insertar los datos en la base de datos
            $conn = new mysqli($servername, $username, $password, $dbname);
            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "INSERT INTO incidencias (titulo, descripcion, Archivo, fecha, id_estado, id_usuario) VALUES ('$titulo', '$descripcion', '$archivo', '$fecha', $id_estado, $id_usuario)";

            if ($conn->query($sql) === TRUE) {
                $response['success'] = true;
                $response['message'] = "Incidencia registrada correctamente.";
            } else {
                $response['success'] = false;
                $response['error'] = "Error al registrar la incidencia: " . $conn->error;
            }

            $conn->close();
        } else {
            $response['success'] = false;
            $response['error'] = "Hubo un error subiendo el archivo.";
        }
    }

} else {
    $response['success'] = false;
    $response['error'] = "Método de solicitud no permitido.";
}

header('Content-Type: application/json');
echo json_encode($response);
?>
