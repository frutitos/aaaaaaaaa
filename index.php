<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Base de Datos</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            text-align: center;
        }
        button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <div class="container">
        <h1>Subir archivo para crear Base de Datos</h1>
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" accept=".sql, .txt, .js, .json" required>
            <br><br>
            <button type="submit">Subir y Crear Base de Datos</button>
        </form>
    </div>

</body>
</html>
