<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resolución de Incidencia</title>
    
</head>
<body>
    <div class="container">
        <div class="descripcion">
            <h2>Descripción de la Incidencia</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero eget accumsan ultrices. Duis mattis aliquam diam, ac commodo libero finibus non. In hac habitasse platea dictumst.</p>
        </div>
        <div class="descripcion">
            <h2>Ultima descrpcion de la solucion</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla convallis libero eget accumsan ultrices. Duis mattis aliquam diam, ac commodo libero finibus non. In hac habitasse platea dictumst.</p>
        </div>

        <div class="solucion">
            <h2>Resolucion de la Revision</h2>
            <textarea id="solucion-textarea" placeholder="Ingresa la descripción de la solución"></textarea>
            <button id="btn-resolver">Resolver Incidencia</button>
        </div>

        <div class="lista-soluciones">
            <h2>Lista de Soluciones</h2>
            <div class="solucion-item">
                <p><strong>Fecha:</strong> 23 de Mayo, 2024</p>
                <p><strong>Nombre:</strong> Juan Pérez</p>
                <p><strong>Descripción:</strong> Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
            </div>
            <div class="solucion-item">
                <p><strong>Fecha:</strong> 22 de Mayo, 2024</p>
                <p><strong>Nombre:</strong> María González</p>
                <p><strong>Descripción:</strong> Fusce sit amet ultrices velit, et efficitur dui. Nullam sed tortor sed ligula ultrices sollicitudin.</p>
            </div>
            <!-- Agregar más elementos según sea necesario -->
        </div>
    </div>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0px 0px 10px 0px rgba(0,0,0,0.1);
        }

        .descripcion, .titulo {
            margin-bottom: 20px;
        }

        .descripcion p {
            margin: 0;
        }

        .solucion {
            border-top: 1px solid #ccc;
            margin-top: 20px;
            padding-top: 20px;
        }

        .solucion textarea {
            width: 100%;
            height: 100px;
            margin-bottom: 10px;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            resize: vertical;
        }

        .solucion button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        .solucion button:hover {
            background-color: #0056b3;
        }

        .lista-soluciones {
            margin-top: 20px;
        }

        .solucion-item {
            margin-bottom: 10px;
            border-bottom: 1px solid #ccc;
            padding-bottom: 10px;
        }

        .solucion-item:last-child {
            border-bottom: none;
        }
    </style>
</body>
</html>
