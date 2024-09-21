<?php
$valor1 = $_POST['us'];
setcookie("usuariolog", $valor1, time() + (86400 * 30), "/"); // 86400 = 1 día
$valor2 = $_POST['contra'];
setcookie("contras", $valor2, time() + (86400 * 30), "/"); // 86400 = 1 día
header("Location: inicioAdmin.php");
exit();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Seguros Galdrette</title>
</head>
<body>
</body>
</html>