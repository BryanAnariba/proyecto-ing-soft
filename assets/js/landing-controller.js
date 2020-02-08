$(document).ready(function () {
    //console.log("Estamos listos");
    //document.getElementById("configuraciones").style.display = "none";
    //document.getElementById("contenedor-signup").style.display = "none";


    // Desplegar la opcion de configuraciones
    $("#configuraciones-nav").click(function (){ 
        document.getElementById("configuraciones").style.display = 'block';
        document.getElementById("contenedor-signup").style.display = "none";
        document.getElementById("contenedor-inicial").style.display = "none";
    });


    // Desplegar el contenedor de registro de ususarios
    $("#btn-signup").click(function () {
        document.getElementById("contenedor-signup").style.display = "block";
        document.getElementById("contenedor-inicial").style.display = "none";
        document.getElementById("configuraciones").style.display = "none";

        // Peticion para Mostrar en select los generos
        $.ajax({
            url:'ajax/procesar-generos.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                for(let i=0;i<response.length;i++) {
                    $("#option-genero").append(`
                        <option value="${response[i].idGenero}">
                            ${response[i].genero}
                        </option>
                    `);
                }
            },
            error:function(error) {
                //console.log(error);
            }
        });

        // Peticion para Mostrar en select los estados civiles
        $.ajax({
            url:'ajax/procesar-estados-civiles.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                for(let i=0;i<response.length;i++) {
                    $("#opcion-est-civil").append(`
                        <option value="${response[i].idEstado}">
                            ${response[i].estado}
                        </option>
                    `);
                }
            },
            error:function(error) {
                console.log(error);
            }
        });

        // Peticion para Mostrar en select las sucursales
        $.ajax({
            url:'ajax/procesar-sucursales.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                for(let i=0;i<response.length;i++) {
                    $("#sucursal-option").append(`
                        <option value="${response[i].idSucursal}">
                            ${response[i].sucursal}
                        </option>
                    `);
                }
            },
            error:function(error) {
                console.log(error);
            }
        });

        // Muestra cargo de los empleados
        $.ajax({
            url:'ajax/procesar-cargos-empleado.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                for(let i=0;i<response.length;i++) {
                    $("#cargo-option").append(`
                        <option value="${response[i].idCargo}">
                            ${response[i].descripcion}
                        </option>
                    `);
                }
            },
            error:function(error) {
                console.log(error);
            }
        });

        // Muestra Titulaciones de los empleados
        $.ajax({
            url:'ajax/procesar-titulaciones.php',
            method:'GET',
            dataType:'json',
            success:function(response) {
                //console.log(response);
                for(let i=0;i<response.length;i++) {
                    $("#titulacion-option").append(`
                        <option value="${response[i].idTitulacion}">
                            ${response[i].titulacion}
                        </option>
                    `);
                }
            },
            error:function(error) {
                console.log(error);
            }
        });
    });
    
    //------------------------------------------------------------------------------------------------------
    // Enviar datos del form signup con sus correspondientes validaciones
    $("#btn-send-information").click(function () {
        //alert("Code Here");
        let errores = '';
        let numIdentidad , nombres , genero , apellidos , fecha , estadoCivil, direccion , cargo , sucursal , titulacion , email , verifEmail;

        numIdentidad = document.getElementById("txt-identificacion").value;
        nombres = document.getElementById("txt-nombre").value;
        apellidos = document.getElementById("txt-apellido").value;
        fecha = document.getElementById("txt-fecha-nac").value;
        genero = document.getElementById("option-genero").value;
        estadoCivil = document.getElementById("opcion-est-civil").value;
        direccion = document.getElementById("txt-direccion").value;
        cargo = document.getElementById("cargo-option").value;
        sucursal = document.getElementById("sucursal-option").value;
        titulacion = document.getElementById("titulacion-option").value;
        email = document.getElementById("txt-email").value;
        verifEmail = document.getElementById("txt-email-verif").value;

        if(numIdentidad === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Identidad Vacio</p>';
            $('#txt-identificacion').css('border-bottom-color','#F14B4B');
        } else if (!(numIdentidad==='')) {
            document.getElementById("txt-identificacion").style.borderBottom = 'none';
        }
        if(numIdentidad.length > 25) {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Identidad Debe ser menor o igual a 25 Caracteres</p>';
            $('#txt-identificacion').css('border-bottom-color','#F14B4B');
        } else if (numIdentidad.length > 25) {
            document.getElementById("txt-identificacion").style.borderBottom = 'none';
        }
        if(nombres === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Nombre Vacio</p>';
            $('#txt-nombre').css('border-bottom-color','#F14B4B');
        } else if (nombres != ''){
            document.getElementById("txt-nombre").style.borderBottom = 'none';
        }
        if(nombres.length > 60) {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Nombre Debe ser menor o igual a 60 Caracteres</p>';
            $('#txt-nombre').css('border-bottom-color','#F14B4B');
        } else if(nombres.length <= 60){
            document.getElementById("txt-nombre").style.borderBottom = 'none';
        }
        if(apellidos === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Apellidos Vacio</p>';
            document.getElementById("txt-apellido").style.borderBottom = '2px solid red';
        } else {
            document.getElementById("txt-apellido").style.borderBottom = 'none';
        }
        if(apellidos.length > 60) {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> Campo Apellidos Debe ser menor o igual a 60 Caracteres</p>';
            document.getElementById("txt-apellido").style.borderBottom = '2px solid red';
        } else {
            document.getElementById("txt-apellido").style.borderBottom = 'none';
        }
        if(fecha === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No Ha Seleccionado una Fecha</p>';
        }
        if(genero === '#'){
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado el genero del Empleado</p>';
        }
        if(estadoCivil === '#'){
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado el Estado Civil del Empleado</p>';
        }
        if(direccion === '') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> El Campo de Direccion del Empleado esta Vacio</p>';
            document.getElementById("txt-direccion").style.borderBottom = '2px solid red';
        } else {
            document.getElementById("txt-direccion").style.borderBottom = 'none';
        }
        if(direccion.length > 150){
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> El Campo Direccion debe ser menor o igual a 150 caracteres</p>'
            document.getElementById("txt-direccion").style.borderBottom = '2px solid red';
        } else {
            document.getElementById("txt-direccion").style.borderBottom = 'none';
        }
        if(cargo === '#') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado el Cargo del Empleado</p>';
        }
        if(sucursal === '#') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado la sucursal de trabajo para el futuro Empleado</p>';
        }
        if(titulacion === '#') {
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No ha Seleccionado la certificacion que tiene el futuro Empleado</p>';
        }

        //validando correos con expresion regular
        let expresion = /\w+@\w+\.+[a-z]/;
        if(!expresion.test(email)) {
            console.log("No es un correo");
            errores += '<p><img src="assets/img/borrar.svg" width="15px"> No Escribio un correo Correctamente o esta vacio</p>';
        } else {
            if(email === verifEmail) {
                console.log("Los correos son iguales y correctos");
            } else {
                errores += '<p><img src="assets/img/borrar.svg" width="15px"> Los Correo No coinciden</p>';
            }
        }

        if(errores) {
            var despliegueModal = 
            '<div class="modal-wrap" id="modal-wrap">'+
                '<div class="container">'+
                    '<br><br>'+
                    '<div class="row ">'+
                        '<div class="col-lg-6 col-sm-12 mx-auto">'+
                            '<div class="mensaje_modal">'+
                                '<h3 class="text-center">Errores encontrados</h3>'+
                                    '<hr>'+ 
                                        errores+
                                    '<hr>'+
                                    '<span id="btn-cerrar">Cerrar</span></div>'+
                            '</div>'+
                        '</div>'+
                    '</div>'+
                '</div>'+
            '</div>';

            $("body").append(despliegueModal);
            $("#btn-cerrar").click(function () {
                $('#modal-wrap').remove();
            });
        } else {
            //alert(errores);
            const parametros = `identidad=${numIdentidad}&nombres=${nombres}&apellidos=${apellidos}&fecha=${fecha}&genero=${genero}&estadoCivil=${estadoCivil}&direccion=${direccion}&cargo=${cargo}&sucursal=${sucursal}&titulacion=${titulacion}&email=${email}&telefono=${$("#txt-telefono").val()}&celular=${$("#txt-cel").val()}&obs=${$("#txt-obs").val()}`;
            console.log(parametros)

            $.ajax({
                url: 'ajax/procesar-insercion-empleado.php' ,
                method: 'POST' ,
                dataType: 'json' ,
                data: parametros ,
                success:function (respuesta) {
                    console.log(respuesta);
                },
                error:function (error) {
                    console.log(error);
                }
            });
        }
    });
    //------------------------------------------------------------------------------------------------------
    //   Subir Imagen al servidor
    $("#btn-enviar").click(function() {
        //console.log("works");

        //PARA LA IMAGEN DE LA PERSONA EN EL SERVIDOR
        var formData = new FormData($("#formulario")[0]);
        var ruta = "ajax/procesar-imagen-empleado.php";
        console.log(formData);
        $.ajax({
            url: ruta ,
            type: "POST" ,
            data: formData ,
            contentType: false ,
            processData: false ,
            success:function(datos){
                console.log(datos);
                location.href ="landing.php";
            },
            error:function(error){
                $("#respuesta").append(error.responseText);
            }
        });
    });
    // Volver a inicio sin recargar
    document.getElementById('control-inicio').addEventListener('click' , () => {
        document.getElementById("configuraciones").style.display = 'none';
        document.getElementById("contenedor-signup").style.display = 'none';
        document.getElementById("contenedor-inicial").style.display = 'block';
    });
});