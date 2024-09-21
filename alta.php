<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Alta</title>
  <link rel="stylesheet" href="alta.css">
</head>
<body>
  <div class="op">
    <label for="opciones">Selecciona una opción</label>
    <br>
    <select id="opciones">
      <option value="opcion1">Alta de usuario</option>
      <option value="opcion2">Alta de cliente</option>
      <option value="opcion3">Alta de factura</option>
      <option value="opcion4">Alta de poliza</option>
    </select>
    <button><a href="inicioAdmin.php">Regresar</a></button>
  </div>

  <div id="contenido-opcion1" style="display: none;" class="contorno">
    <div>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <input type="hidden" name="opcion_seleccionada" value="opcion1">
        <h1>Seguros Galdrette</h1>
        <h2>Registro usuario</h2>
        <div class="contornoIngreso">
          <input type="text" required="required" name="nombre_usuario">
          <span>Nombre completo</span>
        </div>
        <div class="contornoIngreso">
          <input type="text" required="required" name="usuario_usuario">
          <span>Usuario</span>
        </div>
        <div class="contornoIngreso">
          <input type="password" required="required" name="contra_usuario">
          <span>Contraseña</span>
        </div>
        <div class="contornoIngreso">
          <input type="date" required="required" name="nacimiento_usuario">
          <span>Fecha de nacimiento</span>
        </div>
        <div class="contornoIngreso">
          <input type="email" required="required" name="correo_us">
          <span>Correo Electronico</span>
        </div>
        <div class="contornoIngreso">
          <input type="number" required="required" name="telefono_us">
          <span>Telefono</span>
        </div>
        <div class="contornoIngreso">
          <input type="text" required="required" name="dire_us">
          <span>Direccion</span>
        </div>
        <input type="submit" value="Registrar">
      </form>
    </div>
  </div>

  <div id="contenido-opcion2" style="display: none;" class="contorno">
    <div>
      <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
        <input type="hidden" name="opcion_seleccionada" value="opcion2">
        <h1>Seguros Galdrette</h1>
        <h2>Registro cliente</h2>
        <div class="contornoIngreso">
          <input type="text" required="required" name="nombre_cliente"> 
          <span>Nombre completo</span>
        </div>
        <div class="contornoIngreso">
                <input type="number" required="required" name="edad">
                <span>Edad</span>
            </div>
            <div class="contornoIngreso">
                <input type="text" required="required" name="seguro">
                <span>Seguro</span>
            </div>
            <div class="contornoIngreso">
              <input type="number" required="required" name="pago">
              <span>Plan de pago</span>
          </div>
          <div class="contornoIngreso">
            <input type="text" required="required" name="RFC">
            <span>RFC</span>
        </div>
        <div class="contornoIngreso">
          <input type="email" required="required" name="correo">
          <span>Correo electronico</span>
      </div>
        <div class="contornoIngreso">
          <input type="number" required="required" name="tel"> 
          <span>Telefono</span>
      </div>
      <div class="contornoIngreso">
        <input type="text" required="required" name="direc">
        <span>Direccion</span>
    </div>

        <input type="submit" value="Registrar">
      </form>
    </div>

  </div>

  <div id="contenido-opcion3" style="display: none;" class="contorno">
<div>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="hidden" name="opcion_seleccionada" value="opcion3">
    <h1>Seguros Galdrette</h1>
    <h2>Registro factura</h2>
    <div class="contornoIngreso">
      <input type="number" required="required" name="IDcliente_factura">
      <span>ID Cliente</span>
    </div>
    <div class="contornoIngreso">
      <input type="number" required="required" name="monto">
      <span>Monto</span>
    </div>
    <input type="submit" value="Registrar">
  </form>
</div>
</div>

<div id="contenido-opcion4" style="display: none;" class="contorno">
<div>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
    <input type="hidden" name="opcion_seleccionada" value="opcion4">
    <h1>Seguros Galdrette</h1>
    <h2>Registro poliza</h2>
    <div class="contornoIngreso">
      <input type="number" required="required" name="IDcliente_poliza">
      <span>ID Cliente</span>
    </div>
    <div class="contornoIngreso">
      <input type="date" required="required" name="fecha_poliza">
      <span>Fecha expiracion</span>
    </div>
    <div class="contornoIngreso">
      <input type="text" required="required" name="servicio">
      <span>CHECAR SERVICIO</span>
    </div>
    <div class="contornoIngreso">
      <input type="number" required="required" name="cobertura">
      <span>Cobertura</span>
    </div>
    <input type="submit" value="Registrar">
  </form>
</div>
</div>
  

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


  <?php
  include 'dbconn.php'; 
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
  }else{

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $opcion_seleccionada = $_POST['opcion_seleccionada'];

      if($opcion_seleccionada == "opcion1"){ //Usuario
        $tipo = 2;
        $nom = $_POST['nombre_usuario'];
        $us = $_POST['usuario_usuario'];
        $contra = $_POST['contra_usuario'];
        $fecha = $_POST['nacimiento_usuario']; //Verificar???
        $correo = $_POST['correo_us'];
        $telefono = $_POST['telefono_us'];
        $direccion = $_POST['dire_us'];
        $cero = 0;
        $sql = "SELECT * FROM usuarios WHERE usuario = '$us'";
				$result1 = $conn->query($sql); 
        if($result1->num_rows != 0){
          echo "<script>alert('Ya existe alguien registrado con ese usuario');</script>";
        }else{
          if(strlen($telefono) == 10){
            $sql = "INSERT INTO usuarios (nombre, usuario, passwd, tipo, fecha_nacimiento, seguro, plan_pago, RFC, correo, telefono, direccion)
        VALUES ('".$nom."', '".$us."', '".$contra."', '".$tipo."', '".$fecha."', '".$cero."', '".$cero."', '".$cero."', '".$correo."', '".$telefono."', '".$direccion."')";

            if ($conn->query($sql) === TRUE) { 
              echo "<script>alert('Nuevo usuario añadido');</script>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error; 
            }
          }else{
            echo "<script>alert('Ingresa un telefono de 10 digitos');</script>";
          }
        }
      }else if($opcion_seleccionada == "opcion2"){ //Cliente
        $tipo = 3;
        $nom = $_POST['nombre_cliente'];
        $edad = $_POST['edad'];
        $seguro = $_POST['seguro'];
        $pago = $_POST['pago'];
        $rfc = $_POST['RFC'];
        $correo = $_POST['correo'];
        $telefono = $_POST['tel'];
        $direccion = $_POST['direc'];
        $cero = 0;
        if($edad < 18 || $edad > 80){
          echo "<script>alert('Ingresa una edad mayor a 18 y menor a 80');</script>";
        }else if($pago < 0){
          echo "<script>alert('Ingresa un monto mayor a cero');</script>";
        }else if(strlen($rfc) != 13){
          echo "<script>alert('Ingresa un RFC de 13 digitos');</script>";
        }
        else if(strlen($telefono) < 10 || strlen($telefono) > 12){
          echo "<script>alert('Ingresa un telefono valido');</script>";
        }else{ //Cambiar a CLIENTES EN VEZ DE USUARIOS
          $sql = "INSERT INTO usuarios (usuario, nombre, passwd, tipo, fecha_nacimiento, seguro, plan_pago, RFC, correo, telefono, direccion)
        VALUES ('$cero', '$nom', '$cero', '$tipo', '$cero', '$seguro', '$pago', '$rfc', '$correo', '$telefono', '$direccion')";

          if ($conn->query($sql) === TRUE) { 
            echo "<script>alert('Nuevo usuario añadido');</script>";
          } else {
            echo "Error: " . $sql . "<br>" . $conn->error; 
          }
        }
      }
      else if($opcion_seleccionada == "opcion3"){
        $ID_cliente = $_POST['IDcliente_factura'];
        $monto = $_POST['monto'];
        $fecha_hora_actual = date("Y-m-d H:i:s");

        $sql = "SELECT * FROM usuarios WHERE id_usuario = '$ID_cliente'";
				$result1 = $conn->query($sql); 
        if($result1->num_rows != 0){
          while($row1 = $result1->fetch_assoc()) { 
            $nom = $row1['nombre'];
            $RFC = $row1['RFC'];
            $seguro = $row1['seguro']; //CHECAR SI SE VA A AGERGAR A LA FACTURA
            break;
          } 
          if($monto < 0){
            echo "<script>alert('Ingresa un monto mayor a cero');</script>";
          }else if(strlen($RFC) != 13){
            echo "<script>alert('Ingresa un RFC de 13 digitos');</script>";
          }else{
            $sql = "INSERT INTO facturas (nombre_cliente, fecha, monto, RFC, id_cliente)
            VALUES ('".$nom."', '".$fecha_hora_actual."', '".$monto."', '".$RFC."', '".$ID_cliente."')";
            if ($conn->query($sql) === TRUE) { 
              echo "<script>alert('Factura creada exitosamente');</script>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error; 
            }
          }
        }else{
          echo "<script>alert('No existe ningun cliente asociado al ID ingresado');</script>";
        }
      }else{
        
        $ID_cliente = $_POST['IDcliente_poliza'];
        $cobertura = $_POST['cobertura'];
        $servicio =$_POST['servicio'];
        $fecha = date("Y-m-d");
        $fecha_termina = $_POST['fecha_poliza'];


        $sql = "SELECT * FROM usuarios WHERE id_usuario = '$ID_cliente'";
				$result1 = $conn->query($sql); 
        if($result1->num_rows != 0){
          while($row1 = $result1->fetch_assoc()) { 
            $nom = $row1['nombre'];
            break;
          } 
          if($cobertura < 0){
            echo "<script>alert('Ingresa un monto mayor a cero');</script>";
          }else{
            $sql = "INSERT INTO polizas (nombre_cliente, fecha_emision, fecha_expiracion, servicio, cobertura, id_cliente)
            VALUES ('".$nom."', '".$fecha."', '".$fecha_termina."', '".$servicio."', '".$cobertura."', '".$ID_cliente."')";
            if ($conn->query($sql) === TRUE) { 
              echo "<script>alert('Poliza creada exitosamente');</script>";
            } else {
              echo "Error: " . $sql . "<br>" . $conn->error; 
            }
          }
        }else{
          echo "<script>alert('No existe ningun cliente asociado al ID ingresado');</script>";
        }
      }
      $conn->close();
    }
  }
  ?>
</body>
</html>
