<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Atención de Incidencias</title>

</head>
<body>
    <h1>Atención de Incidencias</h1>
    <form id="form-incidencia">
        <label for="titulo">Título:</label>
        <input type="text" id="titulo" name="titulo" placeholder="Título de la incidencia" required>
        
        <label for="descripcion">Descripción:</label>
        <textarea id="descripcion" name="descripcion" rows="4" cols="50" placeholder="Descripción de la incidencia" required></textarea>
        
        <button type="submit">Actualizar Descripción</button>
    </form>

    <script>
        document.getElementById("form-incidencia").addEventListener("submit", function(event) {
            event.preventDefault(); 
            
            var titulo = document.getElementById("titulo").value;
            var descripcion = document.getElementById("descripcion").value;
            
            // Aquí podrías enviar los datos a través de AJAX a tu servidor PHP para su procesamiento
            // Por ahora, solo los mostraremos en la consola
            console.log("Título:", titulo);
            console.log("Descripción:", descripcion);
        });
    </script>
</body>
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

        label, input, textarea, button {
            display: block;
            width: 100%;
            margin-bottom: 15px;
        }

        input, textarea {
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: none;
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

        @media screen and (max-width: 600px) {
            form {
                padding: 10px;
            }
        }
    </style>
</html>
