<?php
session_start();

header("Content-Type: application/json");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $fileTmpPath = $_FILES['archivo']['tmp_name'];
        $fileName = $_FILES['archivo']['name'];
        $fileSize = $_FILES['archivo']['size'];
        $fileType = $_FILES['archivo']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        $newFileName = md5(time() . $fileName) . '.' . $fileExtension;

        $uploadFileDir = './uploaded_files/';
        $dest_path = $uploadFileDir . $newFileName;

        if(move_uploaded_file($fileTmpPath, $dest_path)) {
            $response = ['status' => 'success', 'message' => 'Archivo subido correctamente'];

            
            require 'db_connection.php';
            try {
                $pdo = new PDO($dsn, $username, $password);
                $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                 $sql = "INSERT INTO incidencias (titulo, descripcion,estado, archivo, id_usuario) VALUES (:titulo, :descripcion, 'pendiente', :archivo,:id_usuario)";
                 $stmt = $pdo->prepare($sql);
                 $stmt->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                 $stmt->bindParam(':descripcion', $descripcion, PDO::PARAM_STR);
                 $stmt->bindParam(':archivo', $newFileName, PDO::PARAM_STR);
                 $stmt->bindParam(':id_usuario', $id_usuario, PDO::PARAM_STR);
                 if ($stmt->execute()) {
                     $response = ['status' => 'success', 'message' => 'Incidencia registrada exitosamente'];
                 } else {
                     $response = ['status' => 'error', 'message' => 'Error al registrar la incidencia'];
                 }
             } catch (PDOException $e) {
                 $response = ['status' => 'error', 'message' => 'Error: ' . $e->getMessage()];
             }
        } else {
            $response = ['status' => 'error', 'message' => 'Error al mover el archivo subido'];
        }
    } else {
        $response = ['status' => 'error', 'message' => 'Error al subir el archivo'];
    }

    echo json_encode($response);
} else {
    echo json_encode(['status' => 'error', 'message' => 'Método no soportado']);
}
?>