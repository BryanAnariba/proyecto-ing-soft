document.getElementById("btn-login").addEventListener('click' , function(){
    document.getElementById("contenedor-email").style.display = "block";
    document.getElementById("contenedor-password").style.display = "none";
    document.getElementById("principal").style.display = "none";
    
});



$("#btn-next").click(function() {
    const email = document.getElementById("email").value;
    const parametros = `txt-email=${email}`;
    console.log(parametros);
    $.ajax({
        url:'ajax/procesar-inicio-sesion.php',
        method: 'POST',
        dataType: 'json',
        data: parametros ,
        success:function(response) {
            if(response === 'error' || response.length === 0) {
                respuesta.innerHTML = 
                `<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>
                        Email Vacio o No Encontrado, 
                        Escribe tu Correo Electronico Correctamente.
                    </strong> 
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                   </button>
                </div>`;
            } else {
                console.log(response);
                document.getElementById("contenedor-email").style.display = "none";
                document.getElementById("contenedor-password").style.display = "block";
            }
        },
        error:function (error) {    
            console.log(error);
        }
    });
});
