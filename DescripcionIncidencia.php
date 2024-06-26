<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h1 class="Mono-titulos">WorkFlow</h1>
        <div>
            <?php
            if (isset($_SESSION['nombre'])) {
                $usuarioActivo = $_SESSION['nombre'];
                echo "<a href='src/php/Administrar.php' class='RFlex gap20'>Administrar</a>";
                echo "<a href='cerrarsesion.php' class='RFlex'>Cerrar sesión</a>";
            } else {
                echo "<a href='login.php' class='RFlex'>Iniciar sesión</a>";
            }
            ?>
        </div>
    </header> 
    <main>
        <h1 class="Inter-titulos centrado">Descripcion Incidencia</h1>
        <section class="contenedor">
            <div name="CuadroIncidencia">
                <form id="Incidencia" class="form-Incidencias" method="post" action="procesarincidencia.php" enctype="multipart/form-data">
                    <fieldset>
                        <label for="titulo">Título:</label>
                        <input class="input-style" type="text" id="titulo" name="titulo" placeholder="" value="<?php echo $tareas[0]['titulo']; ?>" required>
                    </fieldset>
                    <fieldset>
                        <label for="descripcion">Descripción:</label>
                        <textarea class="textarea-estilos" id="descripcion" name="descripcion" rows="4" cols="50" placeholder="" required><?php echo $tareas[0]['descripcion']; ?></textarea>
                    </fieldset>

                    <label>Evidencia:</label>
                    <section class="section-4">
                        <label for="archivos" class="file-style">
                            <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 16 16"><path  d="M9 4.5V1H5.5A1.5 1.5 0 0 0 4 2.5v2.707A5.5 5.5 0 0 1 8.663 15H12.5a1.5 1.5 0 0 0 1.5-1.5V6h-3.5A1.5 1.5 0 0 1 9 4.5m1 0V1.25L13.75 5H10.5a.5.5 0 0 1-.5-.5M5.5 15a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9m2.354-4.854a.5.5 0 0 1-.708.708L6 9.707V12.5a.5.5 0 0 1-1 0V9.707l-1.146 1.147a.5.5 0 0 1-.708-.708l2-2A.5.5 0 0 1 5.497 8h.006a.5.5 0 0 1 .348.144l.003.003z"/></svg>
                            <input type="file" class="" name="archivos" id="archivos" accept=".pdf" hidden>
                        </label>
                    </section>

                    <div id="files-container" class="file-content"></div>

                    <div class="esotilin">
                        <button class="btn-azul" type="button" onclick="cancelar()">Cancelar</button>
                        <button id="enviar-incidencia" class="btn-azul" type="submit">Aceptar</button>
                    </div>
                </form>
            </div>
        </section>
    </main>
    <script>
        document.getElementById('Incidencia').addEventListener('submit', function(event) {
            event.preventDefault();
            enviarFormulario();
        });

        function enviarFormulario() {
            const form = document.getElementById('Incidencia');
            const formData = new FormData(form);

            fetch('src/php/RegistrarIncidencia.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    alert('Incidencia enviada correctamente.');
                } else {
                    alert('Error al enviar la incidencia: ' + data.error);
                }
            })
            .catch(error => {
                console.error('Error:', error);
            });
        }

        function cancelar() {
            alert('Cancelado');
        }
    </script>
</body>
</html>
