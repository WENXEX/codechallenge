

<div name="CuadroIncidencia">
<h1>Atención de Incidencias</h1>
    <form id="Incidencia" method="post" action="RegistrarIncidencia.php" onsubmit="return validarFormulario()">
        <fieldset>
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Título de la incidencia" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" placeholder="Descripción de la incidencia" required></textarea>
        
        <label for="opciones">Selecciona una opción:</label>

        
        <?php require ('conexion.php');
                $sql = "SELECT Nombre FROM coordinador";
                $result = $conexion->query($sql);
                // Verificar si hay resultados
                if ($result->rowCount() > 0) {
                    echo '<label for="Nombre">Asignar: </label>';
                    echo '<select id="Nombre" name="Nombre" required>';
                    echo '<option value="null"></option>'; // Obtener las horas reservadas
                    $reservas = array();
                    while ($row = $reservasQuery->fetch(PDO::FETCH_ASSOC)) {
                        $reservas[] = $row['hora_reserva'];
                    }// Generar opciones desde la base de datos, excluyendo las horas reservadas
                    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
                        $hora = $row['hora'];
                        if (!in_array($hora, $reservas)) {
                            echo '<option value="' . $hora . '">' . $hora . '</option>';
                        }
                    }
  
                    echo '</select>';}?>


        
        <button type="submit">Cancelar</button>
        <button type="submit">Aceptar</button>
        </fieldset>
    </form>
    </div>
    <script>
    function validarFormulario() {
            var titulo = document.getElementById("titulo").value;
            var descripcion = document.getElementById("descripcion").value;
            var coordinador = document.getElementById("opciones").value;

            if (numeroPersonas !== "null" && horaProgramada !== 'null' && comboPlatillos !== 'null') {
                var formData = new FormData();
                formData.append("numeroPersonas", numeroPersonas);
                formData.append("horaProgramada", horaProgramada);
                formData.append("comboPlatillos", comboPlatillos);

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
                
                
            } else {
                alert("Por favor, complete todos los campos obligatorios.");
                return false; // Evita que el formulario se envíe
            }
        }
        </script>

