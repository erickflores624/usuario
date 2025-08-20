<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <title>Registrar Reserva</title>
</head>
<body class="bg-dark bg-gradient vh-100">
    <div class="container mt-5 p-4 bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary py-3 shadow-sm mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../assets/img/galeria/PHP.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top"> Sistema de Reservas
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item lead"> <a class="nav-link active" href="bd.php">Salir del Sistema</a></li>
                        <li class="nav-item lead"> <a class="nav-link" href="vistaReservas.php">Mostrar lista de Reservas</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="../assets/img/galeria/hoteles.jpg" alt="Imagen" class="img-fluid img-thumbnail">
            </div>

            <div class="col-md-6">
                <center><h2 class="display-6 mb-3 text-uppercase">Formulario para Registrar Reserva</h2></center>
                <form action="../../controlador/ControladorReserva.php" method="POST" id="formuReserva">
                    <?php
                        if(isset($_GET['msg'])) {
                            echo "<center> <div class='alert alert-danger'><span>".$_GET['msg']."</span></div></center>";
                        }
                    ?>
                    <div class="mb-3">
                        <label for="fecha_reserva" class="form-label">Fecha de Reserva</label>
                        <input type="date" class="form-control" name="fecha_reserva" id="fecha_reserva" placeholder="Fecha de la reserva">
                    </div>

                    <div class="mb-3">
                    <select name="id_cliente" class="form-select">
                        <option value="">Seleccionar cliente</option>
                        <?php
                            require_once "../../modelo/Database3.php";
                            $db = new Database();
                            $result = $db->conn->query("SELECT id_cliente, nombre_cliente FROM Clientes");

                            while ($row = $result->fetch_assoc()) {
                                echo "<option value='{$row['id_cliente']}'>{$row['nombre_cliente']}</option>";
                            }
                        ?>
                    </select>
                    </div>

                    <div class="mb-3">
                        <select name="id_habitacion" class="form-select">
                            <option value="">Seleccionar habitación</option>
                            <?php
                                // Llenar el dropdown con las habitaciones disponibles
                                $resultHabitaciones = $db->conn->query("SELECT id_habitacion, numero_habitacion FROM Habitaciones");

                                if ($resultHabitaciones->num_rows > 0) {
                                    while ($row = $resultHabitaciones->fetch_assoc()) {
                                        echo "<option value='{$row['id_habitacion']}'>{$row['numero_habitacion']}</option>";
                                    }
                                } else {
                                    echo "<option value=''>No hay habitaciones disponibles</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Registrar Reserva</button>
                        <a href="registrarReserva.php" class="btn btn-success">Limpiar Datos</a>
                    </div>
                </form>

            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
