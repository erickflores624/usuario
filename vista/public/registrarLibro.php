<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/navbar.css">
    <title>Registrar Libro</title>
</head>
<body class="bg-dark bg-gradient vh-100">
    <div class="container mt-5 p-4 bg-light">
        <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary py-3 shadow-sm mb-3">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../assets/img/galeria/PHP.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top"> Biblioteca
                </a>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item lead"> <a class="nav-link active" href="bd.php">Salir del Sistema</a></li>
                        <li class="nav-item lead"> <a class="nav-link" href="vistaLibros.php">Mostrar lista de Libros</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-6 d-flex align-items-center justify-content-center">
                <img src="../assets/img/galeria/biblioteca.jpg" alt="Imagen" class="img-fluid img-thumbnail">
            </div>

            <div class="col-md-6">
                <center><h2 class="display-6 mb-3 text-uppercase">Formulario para Registrar Libro</h2></center>
                <form action="../../controlador/ControladorLibro.php" method="POST" id="formuLibro">
                    <?php
                        if(isset($_GET['msg'])) {
                            echo "<center> <div class='alert alert-danger'><span>".$_GET['msg']."</span></div></center>";
                        }
                    ?>
                    <div class="mb-3">
                        <input type="text" class="form-control" name="titulo" id="titulo" placeholder="Título del libro">
                    </div>
                    <div class="mb-3">
                        <input type="number" class="form-control" name="anio_publicacion" id="anio_publicacion" placeholder="Año de publicación">
                    </div>

                    <div class="mb-3">
                        <select name="id_autor" class="form-select">
                            <option value="">Seleccionar autor</option>
                            <?php
                                // Llenar el dropdown con los autores
                                require_once "../../modelo/Database2.php";
                                $db = new Database();
                                $result = $db->conn->query("SELECT id_autor, nombre FROM Autores");

                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id_autor']}'>{$row['nombre']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select name="id_categoria" class="form-select">
                            <option value="">Seleccionar categoría</option>
                            <?php
                                // Llenar el dropdown con las categorías
                                $result = $db->conn->query("SELECT id_categoria, categoria FROM Categorias");

                                while ($row = $result->fetch_assoc()) {
                                    echo "<option value='{$row['id_categoria']}'>{$row['categoria']}</option>";
                                }
                            ?>
                        </select>
                    </div>

                    <div class="text-center">
                        <button type="submit" class="btn btn-primary">Registrar Libro</button>
                        <a href="registrarLibro.php" class="btn btn-success">Limpiar Datos</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="../assets/bootstrap/js/bootstrap.bundle.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
