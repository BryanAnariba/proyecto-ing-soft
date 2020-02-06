<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>App De Telefonia</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/estilos2.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,400,500,700&display=swap" rel="stylesheet">
    <!--link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.css"-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css">
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>

<body>
    <?php include('partials/header/header.php');?>
    <br><br><br><br>
 
    <?php
        if (isset($_SESSION['USER_ID'])):
    ?>
        <div class="card mt-5">
            <div class="card-header bg-dark">
                <h3 class="text-center text-white">
                    <?php echo $_SESSION['CORREO']?>
                </h3>
            </div>
            <div class="card-body">
            
            </div>
        </div>
    <?php endif;?>
    <div class="container" id="contenedor-inicial"><!--Inicio en el navbar-->
        <div class="row mb-5">
            <div class="col-lg-4 col-sm-12">
                <div class="card">
                    <div class="card bg-dark">
                        <div class="card-header bg-primary">
                            <h4 class="text-center text-white">
                                Fotografia Empleado
                            </h4>
                        </div>
                        <div class="card-body">
                            <img src="assets/img/undraw_male_avatar_323b.png" class="img-fluid" alt="">
                        </div>
                        <div class="card-footer">
                            <input type="button" id="cambiar-fotografia" class="btn btn-success btn-block"value="Cambiar Fotografia">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-header bg-primary">
                        <h4 class="text-white text-center">Datos Empleado</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <h6 class="text-white">Nombre</h5>
                            <p class="text-white text-center">Bryan Ariel</p>
                            <h6 class="text-white">Apellido</h5>
                            <p class="text-white text-center">Sanchez Anariba</p>
                            <h6 class="text-white">Correo</h5>
                            <p class="text-white text-center">saariel115@gmail.com</p>
                            <h6 class="text-white">Cargo</h6>
                            <p class="text-white text-center">Full Stack MEAN Developer</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-header bg-primary">
                        <h4 class="text-white text-center">Cerrar Sesion</h4>
                    </div>
                    <div class="card-body">
                        <input type="button" class="btn btn-danger btn-block" value="Cerrar Sesion">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--Opcion de Configuraciones-->
    <div class="container" id="configuraciones" style="display:none;">
        <div class="row mt-5">
            <div class="col-lg-3 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-header bg-primary">
                        <h5 class="text-white text-center">Cambio de Contraseña</h5>
                        <img src="assets/img/cambio-contrasena.png" class="img-fluid" style="border-radius: 10px;">
                        
                    </div>
                    <div class="card-body">
                        <input type="button" class="btn btn-danger btn-block" value="Cambiar">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-header bg-primary">
                        <h5 class="text-white text-center">Cambiar Estatus de Un Empleado</h5>
                        <img src="assets/img/cambiar-status-empleado.png" class="img-fluid" style="border-radius: 10px">
                        <br><br>
                    </div>
                    <div class="card-body">
                        <input type="button" class="btn btn-danger btn-block" value="Cambiar Estatus">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-header bg-primary">
                        <h5 class="text-white text-center">Agregar un Nuevo Empleado</h5>
                        <img src="assets/img/new-user.png" class="img-fluid" style="border-radius: 10px">
                        
                    </div>
                    <div class="card-body">
                        <input type="button" class="btn btn-danger btn-block" id="btn-signup" value="Agregar Empleado">
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-12">
                <div class="card bg-dark">
                    <div class="card-header bg-primary ">
                        <h5 class="text-white text-center">Asignar Privilegios al Empleado</h5>
                        <img src="assets/img/asignar-privilegios.png" class="img-fluid" style="border-radius: 10px">   
                    </div>
                    <div class="card-body mt-2">
                        <input type="button" class="btn btn-danger btn-block" value="Asignar Privilegio">
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!--Contenedor para crear un nuevo usuario-->
    <div class="container animated jackInTheBox" id="contenedor-signup" style="display:none;">
        <div class="row">
            <div class="col-lg-12 col-sm-12 mx-auto">
            <img src="assets/img/product-input-fields.png" id="avatar4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <br><br>
                        <h4 class="text-white text-center">Rellene Los Siguientes Campos</h4>
                    </div>
                    <div class="card-body bg-dark text-white">
                        <form>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" id="txt-identificacion" class="form-control" placeholder="Digite Numero de Identidad o Identificacion">
                                </div>
                                <div class="col">
                                    <input type="text" id="txt-nombre" class="form-control" placeholder="Digite su Nombre Completo">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col my-auto form-group">
                                    <input type="text" id="txt-apellido" class="form-control" placeholder="Digite su Apellido Completo">
                                </div>
                                <div class="col form-group">
                                    <label for="txt-fecha-nac" class="form-control bg-dark text-white">Seleccione La Fecha de Nacimiento</label>
                                    <input type="date" id="txt-fecha-nac" class="form-control">
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class="col">
                                    <select name="" id="option-genero" class="form-control">
                                        <option value="#">Seleccione Genero</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="" id="opcion-est-civil" class="form-control">
                                        <option value="#">Seleccione Estado Civil</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" id="txt-telefono" class="form-control" placeholder="Digite Su Numero de Telefono">
                                </div>
                                <div class="col">
                                    <input type="text" id="txt-cel" class="form-control" placeholder="Digite Su Numero de Celular">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="text" id="txt-direccion" class="form-control" placeholder="Digite El Lugar De Residencia del Empleado">
                                </div>
                                <div class="col">
                                    <select name="" id="cargo-option" class="form-control">
                                        <option value="#">Seleccione Cargo del Empleado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <select name="" id="sucursal-option" class="form-control">
                                        <option value="#">Seleccione La Sucursal De Trabajo</option>
                                    </select>
                                </div>
                                <div class="col">
                                    <select name="" id="titulacion-option" class="form-control">
                                        <option value="#">Seleccione La titulacion De Trabajo</option>
                                    </select>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="email" id="txt-email" class="form-control" placeholder="Digite El Correo Electronico">
                                </div>
                                <div class="col">
                                <input type="email" id="txt-email-verif" class="form-control" placeholder="Repite El Correo Electronico">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col my-auto">
                                    <label for="txt-obs" class="bg-dark form-control text-white text-center text-bolder">
                                        Observaciones Sobre El Empleado
                                    </label>
                                </div>
                                <div class="col">
                                    <textarea name="" id="txt-obs" cols="30" rows="4" class="form-control">
                                    
                                    </textarea>
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col">
                                    <input type="button" id="btn-send-information" class="btn btn-success btn-block" value="Guardar Informacion Del Empleado">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <?php include('partials/footer/footer.php');?>
    <script src="assets/js/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/a8b47806ff.js" crossorigin="anonymous"></script>
    <script src="assets/js/main.js"></script>
    <script src="assets/js/landing-controller.js"></script>
</body>

</html>