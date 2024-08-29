<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Listado de Empleados</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta name="theme-name" content="kross-bulma" />
    <link rel="stylesheet" href="plugins/bulma/bulma.min.css">
    <link href="css/custom-estilo_Prueba.css" rel="stylesheet">
    <link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
</head>
<body>
<header>
  <nav class="navbar is-dark is-fixed-top" role="navigation" aria-label="main navigation">
    <div class="navbar-brand">
      <a class="navbar-item" href="index.html">
        <img src="images/ShopPoom_logo_white.png" width="190" height="60">
      </a>
      <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="navigation">
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
        <span aria-hidden="true"></span>
      </a>
    </div>
    <div id="navigation" class="navbar-menu">
      <div class="navbar-end">
        <a href="index.html" class="navbar-item">Home</a>
        <a href="Productos.html" class="navbar-item">Productos</a>
        <a href="Actualizar_ProdD.php" class="navbar-item">Actualizar Productos</a>
        <a href="Eliminar_Producto.php" class="navbar-item">Eliminar Producto</a>
        <a href="Carrito.html" class="navbar-item">
          <span class="icon">
            <i class="ti-shopping-cart"></i>
          </span>
          <span>Carrito (<span id="cart-count">0</span>)</span>
        </a>
      </div>
    </div>
  </nav>
</header>

<section class="section">
    <div class="container">
        <h2 class="title">Listado de Empleados</h2>
        <table class="table is-striped is-hoverable">
            <thead>
                <tr>
                    <th>ID Empleado</th>
                    <th>Nombre</th>
                    <th>Correo</th>
                    <th>Edad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                // Conexión a la base de datos
                $servername = "localhost";
                $username = "tu_usuario";
                $password = "tu_contraseña";
                $database = "nombre_de_tu_base_de_datos";

                $conn = new mysqli($servername, $username, $password, $database);

                // Verificar la conexión
                if ($conn->connect_error) {
                    die("Conexión fallida: " . $conn->connect_error);
                }

                // Consulta para obtener los datos de la tabla empleado
                $sql = "SELECT id_empleado, nombre, correo, edad FROM empleado";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    // Mostrar los datos en la tabla
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td>" . $row["id_empleado"] . "</td>";
                        echo "<td>" . $row["nombre"] . "</td>";
                        echo "<td>" . $row["correo"] . "</td>";
                        echo "<td>" . $row["edad"] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>No se encontraron empleados</td></tr>";
                }

                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
</section>

<footer class="has-background-dark footer-section">
  <div class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-4-tablet">
          <h5 class="has-text-light">Correo</h5>
          <p class="has-text-white paragraph-lg font-secondary">bpoomflores@gmail.com</p>
        </div>
        <div class="column is-4-tablet">
          <h5 class="has-text-light">Telefono</h5>
          <p class="has-text-white paragraph-lg font-secondary">+52 631 132 9478</p>
        </div>
        <div class="column is-4-tablet">
          <h5 class="has-text-light">Direccion</h5>
          <p class="has-text-white paragraph-lg font-secondary">ACACIAS 8#C, SONORA, MEXICO</p>
        </div>
      </div>
    </div>
  </div>
  <div class="section is-small has-text-centered has-border-top is-border-dark">
  <p class="has-text-light">ShopPoom ©
      <script>
        var CurrentYear = new Date().getFullYear()
        document.write(CurrentYear)
      </script> Prendimiento <a href="themefisher.com">wow</a></p>
  </div>
</footer>

<script src="plugins/jQuery/jquery.min.js"></script>
<script src="plugins/slick/slick.min.js"></script>
<script src="plugins/shuffle/shuffle.min.js"></script>
<script src="js/script.js"></script>
</body>
</html>
