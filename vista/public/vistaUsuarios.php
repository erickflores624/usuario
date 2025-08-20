<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <title>Document</title>
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
                    <img src="../assets/img/galeria/PHP.png" alt="Logo" width="40" height="40" class="d-inline-block aling-text-top"> DPW-207
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggler="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item lead"> <a class="nav-link active" aria-current="page" href="bd.php">Salir del Sistema</a></li>
                        <li class="nav-item lead"> <a class="nav-link" href="#">Mostrar Galeria</a></li>
                        <li class="nav-item lead"> <a class="nav-link" href="registrarUsuario.php">Registrar Nuevo Usuario</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <h1 class="display-4 mb-3 fw-bold text-center">Usuarios Registrados</h1>
        <table class="table table-striped table-hover text-center">
            <thead class="table-dark">
                <th>ID</th>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Usuario</th>
                <th>Contraseña</th>
                <th>Cargo</th>
                <th>Acciones</th>
            </thead>

            <tbody>
                <?php
                    require_once '../../controlador/ControladorUsuario.php';
                    $controlador = new ControladorUsuario();
                    $controlador->obtenerUsuarios();
                ?>
            </tbody>
        </table>
        <a href="../public/registrarUsuario.php" class="btn btn-success">Volver Atras</a>
    </div>
    <script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>