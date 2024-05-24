<?php
                
                require ('conexion.php');
                 //echo "<h2>Fecha seleccionada:</h2>";

                //echo $fechaFormateada;
                $sql = "INSERT INTO fechas_disponibles (fecha, folio_fecha) values(:fechaFormateada, :folio)";
                $sql=$conexion->prepare($sql);
                $sql->bindParam(":fechaFormateada",$fechaFormateada,PDO::PARAM_STR);
                $sql->bindParam(":folio",$folio,PDO::PARAM_STR);
                $sql->execute();
?>