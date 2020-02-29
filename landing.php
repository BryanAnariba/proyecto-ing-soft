<?php
    session_start();
    require('./php-connect-db/db-connection.php');
    if (isset($_SESSION['USER_ID'])) {
        $id = $_SESSION['USER_ID'];
        $nombres = '';
        $apellidos = '';
        $correo = '';
        $fotografia = '';
        $cargo = '';
        $sql = "SELECT A.ID_PERSONA ,A.NOMBRE_PERSONA ,A.APELLIDO_PERSONA ,B.CORREO_EMPLEADO ,B.FOTOGRAFIA_EMPLEADO ,C.DESCRIPCION_CARGO_EMPLEADO FROM TBL_PERSONAS A LEFT JOIN TBL_EMPLEADOS B ON (A.ID_PERSONA = B.ID_EMPLEADO) LEFT JOIN TBL_CARGO_EMPLEADO C ON (B.ID_CARGO_EMPLEADO = C.ID_CARGO_EMPLEADO) WHERE ID_PERSONA = $id";
        $resultados = mysqli_query($conexion, $sql);
        while (($row = mysqli_fetch_array($resultados, MYSQLI_ASSOC))) {
            $nombres = $row['NOMBRE_PERSONA'];
            $apellidos = $row['APELLIDO_PERSONA'];
            $correo = $row['CORREO_EMPLEADO'];
            $fotografia = $row['FOTOGRAFIA_EMPLEADO'];
            $cargo = $row['DESCRIPCION_CARGO_EMPLEADO'];
        }
    } else {
        $nombres = "No existe la var sesion";
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App De Telefonia</title>
    <!--link rel="stylesheet" href="assets/css/animate.css"-->
    <link rel="stylesheet" href="assets/css/bootstrap-personalizado-3.min.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto&display=swap" rel="stylesheet">
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"-->
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body style="font-family: 'Roboto', ;">
<?php
    if (isset($_SESSION['STATUS'])) :
?>
    <?php include('partials/header/header.php'); ?>
    <br><br><br>
    <div class="container efecto2" id="contenedor-inicial">
        <div class="row">
            <div class="col-lg-12 col-sm-12">
                <div class="card">
                    <div class="card-header bg-dark">
                        <h2 class="text-center" style="color:#FFC312;">
                            Datos Personales del Empleado
                        </h2>
                    </div>
                    <div class="card-body efecto3" style="background:#FAFAFA;">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-3 col-sm-12  mx-auto">
                                    <div class="card">
                                        <div class="card bg-dark">
                                            <div class="card-header">
                                                <h4 class="text-center text-white">
                                                    Fotografia
                                                </h4>
                                            </div>
                                            <div id="fotografia" class="card-body" style="padding: 0;">
                                                <img src="assets/img/uploads/fotografias-empleados/<?php echo $fotografia; ?>" class="img-fluid" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-9 col-sm-12 mx-auto">
                                    <div class="card" style="background:#FAFAFA; border: none;">
                                        <div class="form-group">
                                            <hr style="border: 2px solid #FFC312;">
                                            <p class=" text-center">
                                                <b style="font-size: 20px">
                                                    Nombres Empleado:
                                                </b>
                                                <?php echo $nombres; ?>
                                            </p>
                                            <hr style="border: 2px solid #FFC312;">
                                            <p class=" text-center">
                                                <b style="font-size: 20px">
                                                    Apellidos Empleado:
                                                </b>
                                                <?php echo $apellidos; ?>
                                            </p>
                                            <hr style="border: 2px solid #FFC312;">
                                            <p class=" text-center">
                                                <b style="font-size: 20px">Correo:
                                                </b>
                                                <?php echo $correo; ?>
                                            </p>
                                            <hr style="border: 2px solid #FFC312;">
                                            <p class=" text-center">
                                                <b style="font-size: 20px">Cargo:
                                                </b>
                                                <?php echo $cargo; ?>
                                            </p>
                                            <hr style="border: 2px solid #FFC312;">
                                        </div>
                                    </div>
                                    <div class="card-footer bg-dark text-center">
                                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
                                            Añadir Fotografia
                                        </button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark">
                                                        <h5 class="modal-title text-white" id="exampleModalLabel">Formulario Para Añadir Una Fotografia</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span> </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <center>
                                                            <form method="POST" id="formulario" enctype="multipart/form-data">
                                                                <h4 class="text-white text-center"><b>Subir Imagen:</b></h4>
                                                                <input type="file" name="imagen" id="imagen" class="btn btn-success"><br><br>
                                                                <input type="button" value="Enviar Imagen" class="btn btn-success" id="btn-enviar">
                                                            </form><br>
                                                            <button type="button" class="btn btn-danger" data-dismiss="modal">Salir Sin Hacer Nada</button>
                                                        </center>
                                                    </div>
                                                    <div class="modal-footer bg-dark">
                                                        <!--button type="button" class="btn btn-danger" data-dismiss="modal">Salir Sin Hacer Nada</button-->
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <button type="button" class="btn btn-info">
                                            Cambiar Clave
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-dark">
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a8b47806ff.js" crossorigin="anonymous"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/landing-controller.js"></script>

    <?php include('partials/footer/footer.php'); ?>
<?php
else :
    header('Location: page-not-found.php');
?>
<?php
    endif;
?>
</body>
</html>