<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php
    include 'dbconn.php'; 
	$conn = mysqli_connect($servername, $username, $password, $dbname);
	if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }
    ?>
        <div class="contorno">
        <form action="login.php" method="post">
            <h1>Seguros Galdrette</h1>
            <h2>Inicio de sesión</h2>
            <div class="contornoIngreso">
                <input type="text" required="required" id="us" name="us">
                <span>Usuario</span>
            </div>
            <div class="contornoIngreso">
                <input type="password" required="required" id="contra" name="contra">
                <span>Contraseña</span>
            </div>
            <div class="links">
                <a href="#">Olvide mi contraseña</a>
            </div>
            <input type="submit" value="Ingresar" >
        </form>
    </div>
</body>
</html>