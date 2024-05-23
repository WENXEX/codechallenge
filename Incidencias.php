

<div name="CuadroIncidencia">
<h1>Atención de Incidencias</h1>
    <form id="form-incidencia">
        <fieldset>
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Título de la incidencia" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" placeholder="Descripción de la incidencia" required></textarea>
        
        <label for="opciones">Selecciona una opción:</label>
        <select id="opciones" name="opciones">
            <?php
            
            $opciones = array("Opción 1", "Opción 2", "Opción 3", "Opción 4", "Opción 5");

            
            foreach ($opciones as $opcion) {
                echo "<option value='$opcion'>$opcion</option>";
            }
            ?>
        </select>
        <button type="submit">Cancelar</button>
        <button type="submit">Aceptar</button>
        </fieldset>
    </form>
    </div>
