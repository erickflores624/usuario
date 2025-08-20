<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <title>Registrar Venta</title>
</head>
<body class="bg-dark bg-gradient vh-100">
    <div class="container mt-5 p-4 bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary py-3 shadow-sm mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../assets/img/galeria/PHP.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top"> Sistema de Ventas
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item lead"> <a class="nav-link active" href="bd.php">Salir del Sistema</a></li>
                        <li class="nav-item lead"> <a class="nav-link" href="vistaVentas.php">Mostrar lista de Ventas</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <h2 class="display-6 text-center mb-3">Formulario para Registrar Venta</h2>
        
        <div class="row">
            <!-- Columna para la imagen -->
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="../assets/img/galeria/ventas.png" alt="Imagen" class="img-fluid img-thumbnail">
            </div>

            <!-- Columna para el formulario -->
            <div class="col-md-6">
                <form action="../../controlador/ControladorVenta.php" method="POST">
                    <?php
                        if(isset($_GET['msg'])) {
                            echo "<center> <div class='alert alert-danger'><span>".$_GET['msg']."</span></div></center>";
                        }
                    ?>
                    
                    <div class="mb-3">
                        <label for="fecha" class="form-label">Fecha de la Venta</label>
                        <input type="date" class="form-control" name="fecha" id="fecha">
                    </div>

                    <div class="mb-3">
                        <label for="id_vendedor" class="form-label">Vendedor</label>
                        <select name="id_vendedor" class="form-select">
                            <option value="">Seleccionar Vendedor</option>
                            <?php
                                require_once "../../modelo/Database.php";
                                $db = new Database();
                                $result = $db->conn->query("SELECT id, nombre FROM vendedores");

                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_cliente" class="form-label">Cliente</label>
                        <select name="id_cliente" class="form-select">
                            <option value="">Seleccionar Cliente</option>
                            <?php
                                $result = $db->conn->query("SELECT id, nombre FROM clientes");

                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="id_producto" class="form-label">Producto</label>
                        <select name="id_producto" class="form-select">
                            <option value="">Seleccionar Producto</option>
                            <?php
                                $result = $db->conn->query("SELECT id, nombre FROM productos");

                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id']}'>{$row['nombre']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" name="cantidad" id="cantidad">
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Registrar Venta</button>
                        <a href="registrarVenta.php" class="btn btn-success">Limpiar Datos</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
