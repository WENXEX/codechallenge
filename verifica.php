
<?php
    session_start();
    if($_POST){
        $nombre = $_POST['nombre'];
        $contrasena = $_POST['contrasena'];

        try {
            $conexion = new PDO($dsn, $username, $password);
            $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            exit;
        }
        
        try{
            require 'db_connection.php';
            $statement=$conexion->prepare("SELECT * FROM usuario WHERE nombre=:nombre AND contrasena=:contrasena");

            $statement->execute(['nombre'=>$nombre, 'contrasena'=>$contrasena]);

            $users=$statement->fetch();
            echo"".$users;
            if(!$users){

?>               
<!DOCTYPE html>
<html>
  <head>

    <link rel="stylesheet" href="Estilo2.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
 
</head>

<body>
<header>
<nav>
  <a href="index.php">Inicio</a>
  <a href="Registro.php">Registro</a>
  <a href="Login.php">Login</a>
  <a href="consulta.php">Crear encuesta</a>
</nav>
</header>

<aside>
    <?php
                echo"Login invalido,,sss"."<br>";
                echo"<a href='Login.php'>";
                header("Location: Login.php");
    ?>
</aside>


</body>
<footer>
  <p>@BlogFotomania</p>
  <p>Todos los datos compartidos son confidenciales.</p>
</footer>
</html>

                <?php
                  }
                else{
                  $_SESSION['nombre']=$users["nombre"];
                  $_SESSION['contrasena']=$users["contrasena"];
                  $_SESSION['id_usuario']=$users["id_usuario"];
                  header("Location: index.php");
                }
                }
                catch(PDOException $e){
                  echo"Error...gatos".$e->getMessage();
                  die();
                }
        }
        else{
        header("Location: Login.php");
        }
?>