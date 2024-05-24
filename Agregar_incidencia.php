<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<header>
    <h1 class="Mono-titulos">WorkFlow</h1>
    <div >
         <a href='' class='RFlex'>Cerrar sesión</a>
    </div>
</header> 
<body>
    <main>
        <h1 class="Inter-titulos centrado">Atención de Incidencias</h1>
        <section class="contenedor">
            <div name="CuadroIncidencia">
            <form id="Incidencia" class="form-Incidencias" method="post" action="procesarincidencia.php" enctype="multipart/form-data">
                    <h2 class="Inter-titulos">Agregar incidencias</h2>
                    <fieldset>
                        <label for="titulo">Título:</label>
                        <input class="input-style" type="text" id="titulo" name="titulo" placeholder="Título de la incidencia" required>
                    </fieldset>
                    <fieldset>
                        <label for="descripcion">Descripción:</label>
                        <textarea class="textarea-estilos" id="descripcion" name="descripcion" rows="4" cols="50" placeholder="Descripción de la incidencia" required></textarea>
                    </fieldset>

                    <label>Evidencia:</label>
                    <section class="section-4">
                        <label for="archivos" class="file-style">
                            <svg xmlns="http://www.w3.org/2000/svg" width="128" height="128" viewBox="0 0 16 16"><path  d="M9 4.5V1H5.5A1.5 1.5 0 0 0 4 2.5v2.707A5.5 5.5 0 0 1 8.663 15H12.5a1.5 1.5 0 0 0 1.5-1.5V6h-3.5A1.5 1.5 0 0 1 9 4.5m1 0V1.25L13.75 5H10.5a.5.5 0 0 1-.5-.5M5.5 15a4.5 4.5 0 1 0 0-9a4.5 4.5 0 0 0 0 9m2.354-4.854a.5.5 0 0 1-.708.708L6 9.707V12.5a.5.5 0 0 1-1 0V9.707l-1.146 1.147a.5.5 0 0 1-.708-.708l2-2A.5.5 0 0 1 5.497 8h.006a.5.5 0 0 1 .348.144l.003.003z"/></svg>
                            <input type="file" class="" name="archivos" id="archivos" accept=".pdf" hidden>
                        </label>
                    </section>

                    <div class="file-content">
                        <div href="" class="files-list">
                            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 256 256"><path d="m220.49 59.51l-40-40A12 12 0 0 0 172 16H92a20 20 0 0 0-20 20v20H56a20 20 0 0 0-20 20v140a20 20 0 0 0 20 20h108a20 20 0 0 0 20-20v-20h20a20 20 0 0 0 20-20V68a12 12 0 0 0-3.51-8.49M160 212H60V80h67l33 33Zm40-40h-16v-64a12 12 0 0 0-3.51-8.49l-40-40A12 12 0 0 0 132 56H96V40h71l33 33Zm-56-28a12 12 0 0 1-12 12H88a12 12 0 0 1 0-24h44a12 12 0 0 1 12 12m0 40a12 12 0 0 1-12 12H88a12 12 0 0 1 0-24h44a12 12 0 0 1 12 12"/></svg>
                            <p>nombre_del_archivo.pdf</p>
                            <button type="button" href="" class="remove-file">
                                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" viewBox="0 0 16 16"><path fill-rule="evenodd" d="M3.47 3.47a.75.75 0 0 1 1.06 0L8 6.94l3.47-3.47a.75.75 0 1 1 1.06 1.06L9.06 8l3.47 3.47a.75.75 0 1 1-1.06 1.06L8 9.06l-3.47 3.47a.75.75 0 0 1-1.06-1.06L6.94 8L3.47 4.53a.75.75 0 0 1 0-1.06" clip-rule="evenodd"/></svg>
                            </button>
                        </div> 
                    </div>  
                    <div class="esotilin">
                        <button class="btn-azul" type="button" onclick="cancelar()">Cancelar</button>
                        <button id="enviar-incidencia" class="btn-azul" type="submit">Aceptar</button>
                    </div>
                </form>
            
            </div>
        </section>
    </main>
</body>
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

</script>
</html>