<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <title>Ventas Registradas</title>
</head>
<body class="bg-dark bg-gradient vh-100">
    <div class="container bg-light p-5 rounded mt-4">
        <?php
            if (isset($_GET['msg'])) {
                echo "<center><div class='alert alert-info fst-italic text-end'>";
                echo "<span>" . htmlspecialchars($_GET['msg']) . "<br> Fecha: " . date("d-m-Y") . " Hora: " . date("h:i:s") . "</span>";
                echo "</div></center>";
            }
        ?>
        
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary py-3 shadow-sm">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../assets/img/galeria/PHP.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top"> Sistema de Ventas
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item lead"> <a class="nav-link active" href="bd.php">Salir del Sistema</a></li>
                        <li class="nav-item lead"> <a class="nav-link" href="registrarVenta.php">Registrar Nueva Venta</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        
        <h2 class="display-6 text-center text-dark mb-4">Ventas Registradas</h2>
        <div class="table-responsive">
            <table class="table table-bordered table-hover table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre Cliente</th>
                        <th>Nombre Producto</th>
                        <th>Cantidad</th>
                        <th>Vendedor</th>
                        <th>Fecha</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        require_once "../../controlador/ControladorVenta.php";
                        $controladorVenta = new ControladorVenta();
                        $controladorVenta->obtenerVentas();
                    ?>
                </tbody>
            </table>
            <a href="registrarVenta.php" class="btn btn-success">Volver Atras</a>
        </div>
    </div>
    
    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
