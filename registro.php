<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulario de Registro</title>
    <link rel="stylesheet" href="../estiloscss/styles.css">
</head>
<body>
    <div class="container">
    <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Datos de conexión a la base de datos
            include "conexionbs.php";

            $nombre = $_POST["nombre"];
            $apellido = $_POST["apellido"];
            $email = $_POST["email"];
            $pass = $_POST["pass"];
            
            $hashed_password = password_hash($pass, PASSWORD_DEFAULT);

        // Verificar si el email ya está registrado
        $sql = "SELECT id FROM usuarios WHERE email = '$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<p class='error'>El correo electrónico ya está registrado.</p>";
        } else {
            // Insertar nuevo usuario en la base de datos con la contraseña hasheada
            $sql = "INSERT INTO usuarios (nombre, apellido, email, pass) VALUES ('$nombre', '$apellido', '$email', '$hashed_password')";
            
            if (mysqli_query($conn, $sql)) {
                echo "<p class='success-message' id='success-message'>Registro exitoso. Redirigiendo al inicio...</p>";
                echo "<script>
                        document.getElementById('success-message').style.display = 'block';
                        setTimeout(function(){
                            window.location.href = 'index.php';
                        }, 3000); // 3 segundos de espera
                        </script>";
            } else {
                echo "Error al registrar usuario: " . mysqli_error($conn);
            }
        }

        mysqli_close($conn);
        }
    ?>

        <!-- Formulario de registro -->
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" class="input-field" required>

            <label for="nombre">Apellido:</label>
            <input type="text" id="apellido" name="apellido" class="input-field" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" class="input-field" required>

            <label for="pass">Contraseña:</label>
            <input type="password" id="pass" name="pass" class="input-field" required>

            <button type="submit" class="register-button">Registrarse</button>
        </form>

        <a href="login.php" class="login-link">¿Ya tienes cuenta? Inicia sesión</a>
    </div>
</body>
</html>
</html>
