<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listbox Responsiva</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        label, select, button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        select {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button {
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <h1>Listbox Responsiva</h1>
    <form>
        <label for="opciones">Selecciona una opción:</label>
        <select id="opciones" name="opciones">
            <?php
            // Simulación de datos de opciones desde una base de datos
            $opciones = array("Opción 1", "Opción 2", "Opción 3", "Opción 4", "Opción 5");

            // Generar opciones dinámicamente
            foreach ($opciones as $opcion) {
                echo "<option value='$opcion'>$opcion</option>";
            }
            ?>
        </select>
        
        <button type="submit">Seleccionar</button>
    </form>
</body>
</html>