<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
        if (!file_exists('uploads')) {
            mkdir('uploads', 0777, true);
        }

        $file = $_FILES['file']['tmp_name'];
        $fileName = basename($_FILES['file']['name']);
        $fileType = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $target_file = "uploads/" . $fileName;

        if (move_uploaded_file($file, $target_file)) {
            $conn = new mysqli("localhost", "root", "", ""); // Ajusta la conexión según tu configuración.

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $content = file_get_contents($target_file);

            if ($fileType == 'js') {
                // Extraer contenido SQL entre las comillas
                preg_match('/`([^`]*)`/', $content, $matches);

                if (isset($matches[1])) {
                    $sql = $matches[1];

                    // Ejecutar las consultas SQL extraídas
                    if ($conn->multi_query($sql)) {
                        echo "Base de datos y tablas creadas correctamente desde el archivo JS.";
                    } else {
                        echo "Error al ejecutar el archivo JS: " . $conn->error;
                    }
                } else {
                    echo "No se encontraron consultas SQL válidas en el archivo JS.";
                }
            } elseif ($fileType == 'sql' || $fileType == 'txt') {
                if ($conn->multi_query($content)) {
                    echo "Base de datos y tablas creadas correctamente desde el archivo.";
                } else {
                    echo "Error al ejecutar el archivo SQL/TXT: " . $conn->error;
                }
            } else {
                echo "Tipo de archivo no soportado.";
            }

            $conn->close();
        } else {
            echo "Error al subir el archivo.";
        }
    } else {
        echo "No se ha subido ningún archivo.";
    }
} else {
    echo "Método no permitido.";
}
?>
