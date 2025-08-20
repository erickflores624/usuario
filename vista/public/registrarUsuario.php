<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" href="../assets/img/iconos.png">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <title>Document</title>
</head>
<body class="bg-dark bg-gradient vh-100">
    <div class="container mt-5 p-4 bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary py-3 shadow-sm mb-3">
            <div class="container-fluid">
                <a class="navbar-braand" href="#">
                    <img src="../assets/img/galeria/PHP.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top"> RDC-304
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggler="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item lead"> <a class="nav-link active" aria-current="page" href="bd.php">Salir del Sistema</a></li>
                        <li class="nav-item lead"> <a class="nav-link" href="vistaUsuarios.php">Mostrar lista de Usuarios</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="../assets/img/galeria/usuarios.jpg" alt="Imagen" class="img-fluid img-thumbnail">
            </div>

            <div class="col-md-6">
                <center><h2 class="display-6 mb-3 text-uppercase">Formulario para Registrar Usuarios</h2></center>
                <form action="../../controlador/ControladorUsuario.php" method="POST" id="formuUsuario">
                    <?php
                        if(isset($_GET['msg'])) {
                            echo "<center> <div class='alert alert-danger'><span>".$_GET['msg']."</span></div></center>";
                        }
                    ?>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombres">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="apaterno" id="apaterno" placeholder="Apallido paterno">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="amaterno" id="amaterno" placeholder="Apellido materno">
                    </div>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="usuario" id="usuario" placeholder="correo">
                    </div>
                    <div class="mb-3">
                        <input type="password" class="form-control" name="password" id="password" placeholder="contraseña">
                    </div>
                    <div class="mb-3">
                        <label for="id_cargo_fk" class="form-label">Cargo:</label>
                        <select class="form-select" name="id_cargo_fk" id="id_cargo_fk">
                            <option value="" disabled selected>Seleccione el cargo</option>
                            <option value="1">Administrador</option>
                            <option value="2">Colaborador</option>
                            <option value="3">Invitado</option>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Registrar Usuario</button>
                        <a href="registrarUsuario.php" class="btn btn-success">Limpiar Datos</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>