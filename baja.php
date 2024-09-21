<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Input y Divs</title>
<link rel="stylesheet" href="baja.css">
</head>
<body>
<div class="container">
    <h1>Seguros Galdrette</h1>
    <div id="input-container">
        <select id="opciones">
            <option value="opcion1">Consultar</option>
            <option value="opcion2">Modificar usuario</option>
            <option value="opcion4">Modificar poliza</option>
            <option value="opcion3">Baja</option>
        </select>
        <button><a href="inicioAdmin.php">Regresar</a></button>
    </div>

    <div id="div-container">
        <div class="div-left" id="contenido-opcion1" style="display: none;">
            <div>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <input type="hidden" name="opcion_seleccionada" value="opcion1">
                    <h1>Consultar usuario</h1>
                    <br>
                    <div>
                      <input type="text" required="required" name="nombre_usuario" placeholder="Usuario: ">
                    </div>
                    <input type="submit" value="Consultar" id="en">
                </form>
            </div>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                include 'dbconn.php'; 
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                } else {
                    if(isset($_POST['nombre_usuario'])) {
                        $us = $_POST['nombre_usuario'];
                        $sql1 = "SELECT * FROM usuarios WHERE id_usuario = '$us'";
                        $result1 = $conn->query($sql1);

                        echo "<h2>Informacion de usuario</h2>";
                        echo "<table border=2>";
                        if($result1->num_rows > 0){
                            while($row1 = $result1->fetch_assoc()) { 
                                $tipo = $row1["tipo"];
                          }
                          $sql1 = "SELECT * FROM usuarios WHERE id_usuario = '$us'";
                          $result1 = $conn->query($sql1);
                          if($tipo == 1){
                            echo "<tr>";
                            echo "<th>ID</th><th>Nombre</th><th>Usuario</th><th>Correo</th><th>Telefono</th>";
                            echo "</tr>";
                            while($row1 = $result1->fetch_assoc()) { 
                                echo "<tr>";
                                echo "<td>" . $row1["id_usuario"] ."</td>";
                                echo "<td>" . $row1["nombre"] ."</td>";
                                echo "<td>" . $row1["usuario"] ."</td>";
                                echo "<td>" . $row1["correo"] ."</td>";
                                echo "<td>" . $row1["telefono"] ."</td>";
                                echo "</tr>";
                          }
                          }
                          else if($tipo == 2){
                            echo "<tr>";
                            echo "<th>ID</th><th>Nombre</th><th>Usuario</th><th>Password</th><th>Fecha Nacimiento</th><th>Correo</th><th>Telefono</th>";
                            echo "</tr>";
                            while($row1 = $result1->fetch_assoc()) { 
                                echo "<tr>";
                                echo "<td>" . $row1["id_usuario"] ."</td>";
                                echo "<td>" . $row1["nombre"] ."</td>";
                                echo "<td>" . $row1["usuario"] ."</td>";
                                echo "<td>" . $row1["passwd"] ."</td>";
                                echo "<td>" . $row1["fecha_nacimiento"] ."</td>";
                                echo "<td>" . $row1["correo"] ."</td>";
                                echo "<td>" . $row1["telefono"] ."</td>";
                                
                                echo "</tr>";
                          }
                          }else if($tipo == 3){
                            echo "<tr>";
                            echo "<th>ID</th><th>Nombre</th><th>Seguro</th><th>Plan de pago</th><th>RFC</th><th>Correo</th><th>Telefono</th><th>Direccion</th>";
                            echo "</tr>";
                            while($row1 = $result1->fetch_assoc()) { 
                                echo "<tr>";
                                echo "<td>" . $row1["id_usuario"] ."</td>";
                                echo "<td>" . $row1["nombre"] ."</td>";
                                echo "<td>" . $row1["seguro"] ."</td>";
                                echo "<td>" . $row1["plan_pago"] ."</td>";
                                echo "<td>" . $row1["RFC"] ."</td>";
                                echo "<td>" . $row1["correo"] ."</td>";
                                echo "<td>" . $row1["telefono"] ."</td>";
                                echo "<td>" . $row1["direccion"] ."</td>";
                                echo "</tr>";
                          }

                          }
                          
                            

                          }
                          echo "</table>";

                    }

                    if(isset($_POST['nombre_usuario'])) {
                        $us = $_POST['nombre_usuario'];
                        $sql1 = "SELECT * FROM polizas WHERE id_cliente = '$us'";
                        $result1 = $conn->query($sql1);

                        echo "<h2>Informacion de polizas</h2>";
                        echo "<table border=2>";
                        if($result1->num_rows > 0){
                            echo "<tr>";
                            echo "<th>ID</th><th>Nombre cliente</th><th>Fecha emision</th><th>Fecha expiracion</th><th>Servicio</th><th>Cobertura</th>";
                            echo "</tr>";
                            while($row1 = $result1->fetch_assoc()) { 
                                echo "<tr>";
                                echo "<td>" . $row1["id_poliza"] ."</td>";
                                echo "<td>" . $row1["nombre_cliente"] ."</td>";
                                echo "<td>" . $row1["fecha_emision"] ."</td>";
                                echo "<td>" . $row1["fecha_expiracion"] ."</td>";
                                echo "<td>" . $row1["servicio"] ."</td>";
                                echo "<td>" . $row1["cobertura"] ."</td>";
                                echo "</tr>";
                          }
                          }
                          echo "</table>";

                    }


                }
            }
            ?>
        </div>

        <div class="div-left" id="contenido-opcion2" style="display: none;">
    <div>
    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">        
    <input type="hidden" name="opcion_seleccionada" value="opcion2">
    <div>
        <input type="number" required="required"  name="idus_mod">
        <span>Ingrese el ID del usuario</span>
    </div>
    <input type="submit" value="Modificar" id="en-modificar">
</form>
<?php  
        include 'dbconn.php'; 
        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } else {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if(isset($_POST['opcion_seleccionada'])) {
                $opcion_seleccionada = $_POST['opcion_seleccionada'];
                if($opcion_seleccionada == "opcion2"){
                    $us = $_POST['idus_mod'];
                    $sql1 = "SELECT * FROM usuarios WHERE id_usuario = '$us'";
                    $result1 = $conn->query($sql1);
                    if($result1->num_rows <= 0){
                        //echo "<script>alert('No existe usuario con ese ID');</script>";
                    } else {
                        $usuario = $result1->fetch_assoc();
                    }
                }
            } else {
                echo "<script>alert('La opción seleccionada no está definida');</script>";
            }
            
            } 
        }
?>

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="opcion_seleccionada" value="opcion6">
            <h3>NO es necesario llenar todos los campos, solo los que se modificaran</h3>
            <h1>Modificar cliente</h1>
            <div>
                <input type="hidden" name="id_mod" value="<?php echo isset($usuario['id_usuario']) ? $usuario['id_usuario'] : ''; ?>">
                <input type="text" name="seg_mod" value="<?php echo isset($usuario['seguro']) ? $usuario['seguro'] : ''; ?>">
                <span>Ingrese el seguro</span>
            </div>
            <div>
                <input type="number" name="pago_mod" value="<?php echo isset($usuario['plan_pago']) ? $usuario['plan_pago'] : ''; ?>">
                <span>Ingrese el plan del pago</span>
            </div>
            <div>
                <input type="text"name="corr_mod" value="<?php echo isset($usuario['correo']) ? $usuario['correo'] : ''; ?>">
                <span>Ingrese el correo</span>
            </div>
            <div>
                <input type="text" name="dire_mod" value="<?php echo isset($usuario['direccion']) ? $usuario['direccion'] : ''; ?>">
                <span>Ingrese la direccion</span>
            </div>
            <div>
                <input type="number" name="tel_mod" value="<?php echo isset($usuario['telefono']) ? $usuario['telefono'] : ''; ?>">
                <span>Ingrese el telefono</span>
            </div>
            <input type="submit" value="Modificar" id="en">
        </form>
    </div>
</div>


        <div class="div-left" id="contenido-opcion3" style="display: none;">
            <div>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                    <input type="hidden" name="opcion_seleccionada" value="opcion3">
                    <h1>Seguros Galdrette</h1>
                    <h2>Baja cliente</h2>
                    <div>
                      <input type="number" required="required" name="id_us">
                      <span>Ingrese el usuario a dar de baja</span>
                    </div>
                    <input type="submit" value="Eliminar" id="en">
                </form>
            </div>
        </div>



        <div class="div-left" id="contenido-opcion4" style="display: none;">
            <div>
                <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">        
                <input type="hidden" name="opcion_seleccionada" value="opcion4">
                <div>
                    <input type="number" required="required"  name="idus_poli">
                    <span>Ingrese el ID de la poliza</span>
                </div>
                <input type="submit" value="Modificar" id="en-modificar">
            </form>
            <?php  
                    include 'dbconn.php'; 
                    $conn = new mysqli($servername, $username, $password, $dbname);
                    if ($conn->connect_error) {
                        die("Connection failed: " . $conn->connect_error);
                    } else {
                        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        if(isset($_POST['opcion_seleccionada'])) {
                            $opcion_seleccionada = $_POST['opcion_seleccionada'];
                            if($opcion_seleccionada == "opcion4"){
                                $us = $_POST['idus_poli'];
                                $sql1 = "SELECT * FROM polizas WHERE id_poliza = '$us'";
                                $result1 = $conn->query($sql1);
                                if($result1->num_rows <= 0){
                                    //echo "<script>alert('No existe poliza con ese ID');</script>";
                                } else {
                                    $usuario = $result1->fetch_assoc();
                                }
                            }
                        } else {
                            echo "<script>alert('La opción seleccionada no está definida');</script>";
                        }
                        
                        } 
                    }
            ?>
                    <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
            <input type="hidden" name="opcion_seleccionada" value="opcion5">
            <h1>Modificar poliza</h1>
            <div>
                <input type="hidden" name="idus_poli" value="<?php echo isset($usuario['id_poliza']) ? $usuario['id_poliza'] : ''; ?>">
                <input type="text" name="nom_poli" value="<?php echo isset($usuario['nombre_cliente']) ? $usuario['nombre_cliente'] : ''; ?>">
                <span>Ingrese el nombre cliente</span>
            </div>
            <div>
                <input type="text" name="emision_poli" value="<?php echo isset($usuario['fecha_emision']) ? $usuario['fecha_emision'] : ''; ?>">
                <span>Ingrese la fecha emision</span>
            </div>
            <div>
                <input type="text"name="expir_poli" value="<?php echo isset($usuario['fecha_expiracion']) ? $usuario['fecha_expiracion'] : ''; ?>">
                <span>Ingrese la fecha expiracion</span>
            </div>
            <div>
                <input type="text" name="servicio_poli" value="<?php echo isset($usuario['servicio']) ? $usuario['servicio'] : ''; ?>">
                <span>Ingrese el servicio</span>
            </div>
            <div>
                <input type="number" name="cob_poli" value="<?php echo isset($usuario['cobertura']) ? $usuario['cobertura'] : ''; ?>">
                <span>Ingrese la cobertura</span>
            </div>
            <input type="submit" value="Modificar" id="en">
        </form>
        </div>
</div>

        <div class="div-right">
            <h2>Usuarios disponibles</h2>
              <?php
                include 'dbconn.php'; 
                $conn = new mysqli($servername, $username, $password, $dbname);
                if ($conn->connect_error) {
                  die("Connection failed: " . $conn->connect_error); #Si la conexi�n fall�, terminar la ejecuci�n
                }else{
                  
                    $sql1 = "SELECT id_usuario, nombre, tipo FROM usuarios"; #Selecciona los campos de la tabla
                    $result1 = $conn->query($sql1); #La variable result almacena una matriz con los campos seleccionados

                  echo "<table border=1>";

                  if($result1->num_rows > 0){
                    echo "<tr>";
                    echo "<th>ID</th><th>Usuario</th><th>Rol</th>";
                    echo "</tr>";
                    $tipo = 0;
                    while($row1 = $result1->fetch_assoc()) { 
                        $tipo = $row1["tipo"];
                        if($tipo == 1){
                            $tipo = "Administrador";
                        }else if($tipo == 2){
                            $tipo = "Usuario";
                        }else{
                            $tipo = "Cliente";
                        }
                        echo "<tr>";
                        echo "<td>" . $row1["id_usuario"] ."</td>";
                        echo "<td>" . $row1["nombre"] ."</td>";
                        echo "<td>" . $tipo ."</td>";
                        echo "</tr>";
                  }
                  }
                  echo "</table>";
                }
              ?>
        </div>
    </div>
</div>

<?php


    include 'dbconn.php'; 
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }else{
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $opcion_seleccionada = $_POST['opcion_seleccionada'];
            if($opcion_seleccionada == "opcion6"){

              $us = $_POST['idus_mod'];
              $sql1 = "SELECT * FROM usuarios WHERE id_usuario = '$us'";
              $result1 = $conn->query($sql1);
              if($result1->num_rows <= 0){
                  echo "<script>alert('No existe usuario con ese ID');</script>";
              } else {
                  $usuario = $result1->fetch_assoc();
              }
                $id = $_POST['id_mod'];
                $seguro = $_POST['seg_mod'];
                $pago = $_POST['pago_mod'];
                $correo = $_POST['corr_mod'];
                $tel = $_POST['tel_mod'];
                $dire = $_POST['dire_mod'];
                if($pago<0){
                    echo "<script>alert('El pago debe ser mayor a 0');</script>"; //Checar tel
                }else{
                    $sql = "UPDATE usuarios SET seguro='" . $seguro . "', plan_pago='" . $pago . "', correo='" . $correo . "', telefono='" . $tel . "', direccion='" . $dire . "' WHERE id_usuario='" . $id . "'"; 
                    if($conn->query($sql) === TRUE){
                      echo "<script>alert('Modificado exitosamente');</script>";
                  }
                }

                
            }else if($opcion_seleccionada == "opcion3"){
                if (isset($_POST['id_us'])) {
                    $us = $_POST['id_us'];
                    $sql1 = "SELECT * FROM usuarios WHERE id_usuario = '$us'";
                    $result1 = $conn->query($sql1);
                    if ($result1->num_rows > 0) {
                        $sql = "DELETE FROM usuarios WHERE id_usuario = $us"; 
                        if ($conn->query($sql) === TRUE) {
                            echo "<script>alert('Se eliminó exitosamente la cuenta');</script>";
                            // Redirección después de eliminar la cuenta
                            $sql = "DELETE FROM polizas WHERE id_cliente = $us"; 
                            if($conn->query($sql) === TRUE){
                                echo "<script>alert('Polizas asociadas eliminadas');</script>";
                            }else{

                            }
                            echo '<script>';
                            echo 'window.location.reload();';
                            echo '</script>';
                        }
                    } else {
                        echo "<script>alert('No existe ese ID asociado a una cuenta');</script>";
                    }
                }
                }else if($opcion_seleccionada == "opcion5"){
                    $us = $_POST['id_poli'];
                    $sql1 = "SELECT * FROM polizas WHERE id_poliza = '$us'";
                    $result1 = $conn->query($sql1);
                    if($result1->num_rows <= 0){
                        echo "<script>alert('No existe poliza con ese ID');</script>";
                    } else {
                        $usuario = $result1->fetch_assoc();
                    }
                      $id = $_POST['idus_poli'];
                      $nom = $_POST['nom_poli'];
                      $emi = $_POST['emision_poli'];
                      $exp = $_POST['expir_poli'];
                      $ser = $_POST['servicio_poli'];
                      $cob = $_POST['cob_poli'];
                      if($cob<0){
                        echo "<script>alert('Ingrese una cobertura valida');</script>";
                      }else{
                        $sql = "UPDATE polizas SET nombre_cliente='" . $nom . "', fecha_emision='" . $emi . "', fecha_expiracion='" . $exp . "', servicio='" . $ser .  "', cobertura='" . $cob . "' WHERE id_poliza='" . $id . "'"; 
                        if($conn->query($sql) === TRUE){
                          echo "<script>alert('Modificado exitosamente');</script>";
                      }
                      }
      

                }
            }
    }

?>

<script>
  function mostrarContenido(opcionSeleccionada) {
    var contenidoOpcion1 = document.getElementById("contenido-opcion1");
    var contenidoOpcion2 = document.getElementById("contenido-opcion2");
    var contenidoOpcion3 = document.getElementById("contenido-opcion3");
    var contenidoOpcion4 = document.getElementById("contenido-opcion4");

    contenidoOpcion1.style.display = "none";
    contenidoOpcion2.style.display = "none";
    contenidoOpcion3.style.display = "none";
    contenidoOpcion4.style.display = "none";

    if (opcionSeleccionada === "opcion1") {
      contenidoOpcion1.style.display = "block";
      document.querySelector("#contenido-opcion1 input[name='opcion_seleccionada']").value = opcionSeleccionada;
    } else if (opcionSeleccionada === "opcion2") {
      contenidoOpcion2.style.display = "block";
      document.querySelector("#contenido-opcion2 input[name='opcion_seleccionada']").value = opcionSeleccionada;
    } else if (opcionSeleccionada === "opcion3") {
      contenidoOpcion3.style.display = "block";
      document.querySelector("#contenido-opcion3 input[name='opcion_seleccionada']").value = opcionSeleccionada;
    } else if (opcionSeleccionada === "opcion4") {
      contenidoOpcion4.style.display = "block";
      document.querySelector("#contenido-opcion4 input[name='opcion_seleccionada']").value = opcionSeleccionada;
    }
  }

  var select = document.getElementById("opciones");

  mostrarContenido(select.value);

  select.addEventListener("change", function() {
    mostrarContenido(select.value);
  });
</script>

</body>
</html>

