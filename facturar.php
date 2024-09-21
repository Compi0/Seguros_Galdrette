<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Facturacion</title>
    <link rel="stylesheet" href="factura.css">
</head>
<body>
    <h1>Facturacion Seguros Galdrette</h1>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <label for="id_cliente">Ingrese el ID del cliente:</label>
        <input type="number" id="id_cliente" name="id_cliente" required>
        <button type="submit">Generar factura</button>
    </form>
    <a href="inicioAdmin.php"><button type="submit">Regresar</button></a>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id_cliente = $_POST['id_cliente'];
    
    $conn = new mysqli('localhost', 'id22225333_equipo2', 'Ingenieria2024#', 'id22225333_segurosgaldrette');

    if ($conn->connect_error) {
        die("Error de conexión: " . $conn->connect_error);
    }
    
    $query = "SELECT * FROM facturas WHERE id_cliente = $id_cliente";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
        require('fpdf.php');
        $query2 = "SELECT * FROM usuarios WHERE id_usuario = $id_cliente";
        $result2 = $conn->query($query2);
        $pdf = new FPDF();
        $pdf->AddPage();
        while($row2 = $result2->fetch_assoc()) {
            $nombre = $row2['nombre'];
            $correo = $row2['correo'];
            $tel = $row2['telefono'];
            $dire = $row2['direccion'];
        }
        $pdf->SetFont('Arial','B',30);
        $pdf->Cell(200, 40, "Seguros Galdrette", 0, 1, 'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0,10,'Fecha de emision : ' . date("Y-m-d H:i:s"),0,1);
        $pdf->Cell(0,10,' ',0,1);
        $pdf->MultiCell(0,10,"Por medio del presente documento Seguros Galdrette realiza la facturacion de todas las facturas que se encuentran en los servidores de Seguros Galdrette, en donde se detalla los datos personales del cliente, asi como datos importantes para realizar la presente facturacion. Para cualquier aclaracion favor de contactar directamente a soporte tecnico");
        $pdf->SetFont('Arial','B',18);
        $pdf->Cell(0,10,' ',0,1);
        $pdf->Cell(0,10,' ',0,1);
        $pdf->Cell(200,10,'Datos personales  ',0,1,'C');
        $pdf->SetFont('Arial','B',14);
        $pdf->Cell(0,4,' ',0,1);
        $pdf->Cell(0,10,'Nombre del facturador : ' . $nombre,0,1);
        $pdf->Cell(0,10,'Correo electronico : ' . $correo,0,1);
        $pdf->Cell(0,10,'Telefono : ' . $tel,0,1);
        $pdf->Cell(0,10,'Direccion : ' . $dire,0,1);
        $pdf->Cell(0,10,"________________________________________________________",0,1);
        while($row = $result->fetch_assoc()) {
            $pdf->Cell(0,10,'Folio de la factura : ' . $row['id_factura'],0,1);
            $pdf->Cell(0,10,"________________________________________________________",0,1);
            $pdf->Cell(0,10,'Alta de factura: ' . $row['fecha'],0,1);
            $pdf->Cell(0,10,'Total: $' . $row['monto'] . ' Pesos Mexicanos (MXN)',0,1);
            $pdf->Cell(0,10,'RFC del cliente: ' . $row['RFC'],0,1);
            $pdf->Cell(0,10,"________________________________________________________",0,1);
        }
        $pdf_filename = 'factura_' . $id_cliente . '.pdf';
        $pdf->Output('F', $pdf_filename);

        // Redirigir a una nueva página para mostrar el PDF
        echo "<script>window.open('$pdf_filename', '_blank');</script>";
    } else {
        echo "No se encontraron facturas con el ID proporcionado.";
    }

    $conn->close();
}
?>
</body>
</html>