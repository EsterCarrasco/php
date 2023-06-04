<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="estilos.css">
    <title>Formulario de Registro SCIII</title>
</head>

<body>
    <div class="group">
        <form method="POST" action="">
            <h2><em>Formulario de Registro</em></h2>
            <label for="nombre">Nombre <span><em>(requerido)</em></span></label></br>
            <input type="text" name="nombre" class="form-input" required/></br>

            <label for="apellido">Apellido <span><em>(requerido)</em></span></label></br>
            <input type="text" name="apellido" class="form-input" required/></br>

            <label for="email">Email <span><em>(requerido)</em></span></label></br>
            <input type="email" name="email" class="form-input" required/></br> 

            <input class="form-btn" name="submit" type="submit" value="Suscribirse"/></br>

            <?php
            if ($_POST) {
                $nombre = $_POST["nombre"];
                $apellido = $_POST["apellido"];
                $email = $_POST["email"];
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "cursosql";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }
                $sql = "INSERT INTO usuarios (nombre, apellido, email) VALUES ('$nombre', '$apellido', '$email')";
                if ($conn->query($sql) === TRUE) {
                    echo "Nuevo registro creado exitosamente";
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }
                $conn->close();
            }
            ?>
        </form>
    </div>
</body>
</html>


