<?php
include 'db_connection.php';
try {
    
        $sql = "SELECT p.*, c.nombre, c.total 
            FROM revision c 
            INNER JOIN incidencias p 
            ON c.id_incidencia = p.id 
            WHERE c.coordinador = :id";
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