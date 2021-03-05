<?php
//$nombre = $_POST["nombre"];

$error = '';

//VALIDANDO EL CAMPO DE NOMBRE

if (empty($_POST["nombre"])) {
    $error ='Ingresa un nombre</br>';
} else{

    $nombre = $_POST["nombre"];
    $nombre = filter_var($nombre, FILTER_SANITIZE_STRING);

}
// VALIDANDO EL CAMPO DE EMAIL
if(empty($_POST["email"])) {
    $error .= 'Ingresa un email </br>';
}else{
    $email =  $_POST["email"];
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){

        $error .= 'Ingresa un E-mail Correcto</br>';

    }else{
        $email = filter_var($email,FILTER_SANITIZE_EMAIL);

    }

}

//VALIDAR EL CAMPO MENSAJE

if (empty($_POST["mensaje"])) {
    $error .='Ingresa un mensaje</br>';
} else{

    $mensaje = $_POST["mensaje"];
    $mensaje = filter_var($nombre, FILTER_SANITIZE_STRING);

}

// CUERPO DEL MENSAJE
$cuerpo .= "nombre: ";
$cuerpo .=  $nombre;
$cuerpo .= "\n";
 

$cuerpo .= "email";
$cuerpo .=  $email;
$cuerpo .= "\n";


$cuerpo .= "Mensaje: ";
$cuerpo .=  $mensaje;
$cuerpo .= "\n";


//DIRECCION
$enviarA='bertella.galuc@gmail.com';
$asunto= 'Nuevo mensaje de mi sitio WEB';



// ENVIAR CORREO

 
 if ($error =='') {
    $success = mail($enviarA,$asunto,$cuerpo, 'de:' .$email);
      
    echo 'exito';
     
 }else{
     echo $error;
 }

 
?>

 