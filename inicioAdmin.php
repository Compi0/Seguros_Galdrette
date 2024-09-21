<?php
// Inicia el buffer de salida
ob_start();

include 'dbconn.php';
$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$usuario = $_COOKIE['usuariolog'];
$contrasena = $_COOKIE['contras'];
$sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND passwd = '$contrasena'";
$resultado = mysqli_query($conn, $sql);

if (mysqli_num_rows($resultado) == 1) {
    $fila = mysqli_fetch_assoc($resultado);
    $tipo = $fila['tipo'];
} else {
    header("Location: index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="inicioAdmin.css">
</head>
<body>
    <div class="menu">
        <ul>
            <li><a href="">¡Bienvenido/a a Seguros Galdrette!</a></li>
        </ul>
        <ul>
            <?php if ($tipo == 1) { ?>
                <li><a href="alta.php">Altas</a></li>
            <?php } ?>
            <li><a href="baja.php">Buscar</a></li>
            <li><a href="facturar.php">Descargar factura</a></li>
            <?php if ($tipo == 1) { ?>
                <li><a href="respaldo.php">Realizar respaldo</a></li>
            <?php } ?>
            <li><a href="index.php" id="sal">Salir</a></li>
        </ul>
    </div>
    <div class="calendario">
        <div class="cabecera">
            <button id="prevBtn">
                <i class="fa-solid fa-chevron-left"></i>
            </button>
            <div class="monthYear" id="monthYear"></div>
            <button id="nextBtn">
                <i class="fa-solid fa-chevron-right"></i>
            </button>
        </div>
        <div class="days">
            <div class="day">Lun</div>
            <div class="day">Mar</div>
            <div class="day">Mier</div>
            <div class="day">Jue</div>
            <div class="day">Vier</div>
            <div class="day">Sab</div>
            <div class="day">Dom</div>
        </div>
        <div class="dates" id="dates"></div>
    </div>
    <script src="cal.js"></script>
</body>
</html>

<?php
// Finaliza el buffer de salida y envía el contenido al navegador
ob_end_flush();
?>
