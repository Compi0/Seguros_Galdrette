<?php
	$servername = "localhost"; 
	$username = "id22225333_equipo2"; 
	$password = "Ingenieria2024#"; 
	$dbname = "id22225333_segurosgaldrette"; 

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SHOW TABLES";
$result = $conn->query($sql);

$filename = 'backup_' . date('Ymd') . '.sql';

header('Content-Type: application/octet-stream');
header('Content-Disposition: attachment; filename=' . $filename);

while ($row = $result->fetch_row()) {
    $table = $row[0];
    $sql = "SELECT * FROM $table";
    $table_result = $conn->query($sql);

    while ($row = $table_result->fetch_assoc()) {
        $keys = array_keys($row);
        $values = array_map(array($conn, 'escape_string'), array_values($row));
        $insert_query = "INSERT INTO $table (" . implode(',', $keys) . ") VALUES ('" . implode("','", $values) . "');\n";
        echo $insert_query; 
    }
}

$conn->close();
?>
