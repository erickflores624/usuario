<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../vista/assets/bootstrap/css/bootstrap.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="vista/assets/img/galeria/php3.png">
    <link rel="stylesheet" href="vista/assets/css/formulario.css">
    <link rel="stylesheet" href="../../vista/assets/css/estilo1.css">
    
    <title>Formulario de Datos</title>
    
</head>
<body class="bg-dark bg-gradient vh-100">
    <section class="container mt-5 border p-5 rounded">
        <main class="row d-flex align-items-center">
            <article class="col-lg-6">
                <figure class="figure my-6">
                    <img src="../../vista/assets/img/galeria/img1.jpg" class="figure-img img-fluid rounded" width="585px" style="box-shadow: 5px 4px 8px rgba(200, 200, 200, 1);">
                    <figcaption class="figure-caption text-end text-light lead">Diseño Programacion Web II</figcaption>
                </figure>

            </article>
            <article class="col-lg-6">
                <h2 class="display-5 text-center text-danger fw-semibold">SERVIDOR CON UBUNTU   Cuarta Etapa</h2>
                <h3 class="display-5 text-center text-light fw-semibold">Sistemas Operativos LINUX</h3>
                <h4 class="display-6 text-center text-warning mb-5 fw-semibold">INSTALACION Y CONFIGURACION LAMP</h4>

                <!-- Acordeón de Bootstrap -->
                <div class="accordion" id="accordionExample" style="font-size: 0.9rem;">
                <div class="accordion-item">
                    <h2 class="accordion-header" id="headingOne">
                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne" style="padding: 0.5rem;">
                            Registro de Usuarios
                        </button>
                    </h2>
                    <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                        <div class="accordion-body" style="padding: 0.5rem;">
                            <center>
                                <button type="button" class="btn btn-outline-info" onclick="window.location.href='registrarUsuario.php';">
                                    Ir al Formulario
                                </button>
                            </center>
                        </div>
                    </div>
                </div>

                
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingTwo">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo" style="padding: 0.5rem;">
                            Registro de Libros
                            </button>
                        </h2>
                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                            <div class="accordion-body" style="padding: 0.5rem;">
                                <center><button type="button" class="btn btn-outline-info" onclick="window.location.href='registrarLibro.php';">
                                Ir al Formulario
                                </button></center>
                            </div>
                        </div>
                    </div>
                    <!-- Nuevo acordeón para Vehículo -->
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingThree">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" style="padding: 0.5rem;"  >
                            Registro de Reservas
                            </button>
                        </h2>
                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                            <div class="accordion-body" style="padding: 0.5rem;">
                                <center><button type="button" class="btn btn-outline-info" onclick="window.location.href='registrarReserva.php';">
                                Ir al Formulario
                                </button></center>
                            </div>
                        </div>
                    </div>

                    <div class="accordion-item">
                        <h2 class="accordion-header" id="headingFour">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour" style="padding: 0.5rem;">  
                            registro de Ventas
                            </button>
                        </h2>
                        <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour" data-bs-parent="#accordionExample">
                            <div class="accordion-body" style="padding: 0.5rem;">
                                <center><button type="button" class="btn btn-outline-info" onclick="window.location.href='registrarVenta.php';">
                                Ir al Formulario
                                </button></center>
                            </div>
                        </div>
                    </div>

           

<script src="../assets/bootstrap/js/bootstrap.bundle.min.js"></script>

</html>
