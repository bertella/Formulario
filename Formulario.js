 $("#formulario").submit(function(event){
     event.preventDefault();// almacena los datos del form sin refrescar
     enviar();

 });

 function enviar() {

    var datos =$("#formulario").serialize();//toma los datos de todo el for y  los almacena en un arreglo
    console.log(datos);

    $.ajax({
        type: "post",
        url: "formulario.php",
        data: datos,
         
        success: function (texto) {
            if (texto.trim()==="exito") {
                
                correcto();
                
            } else {

                phperror(texto);

            }
        }
    })
 }
 function correcto() {

    $("#mensajeExito").removeClass("d-none");
    $("#mensajeErrorPHP").addClass("d-none");
 }    

 function phperror(texto) {

    $("#mensajeError").removeClass("d-none");
    $("#mensajeError").html(texto);
 }