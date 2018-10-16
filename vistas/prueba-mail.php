<?php

$destinatario = "xuciyi@fxprix.com";
$asunto = "Prueba de email";
$mensaje = "Esto es una prueba";

$exito = mail($destinatario, $asunto, $mensaje);

if($exito){
    echo 'email enviado';
} else {
    echo 'envio fallido';
}
?>