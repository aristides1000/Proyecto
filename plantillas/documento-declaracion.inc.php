<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-compatible" content="IE-edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        
        <?php
        if (!isset($titulo) || empty($titulo)) {
        	$titulo='SupplyHome';
        }
        echo "<title>$titulo</title>";
        ?>

        
        
        <link href="<?php echo RUTA_CSS ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo RUTA_CSS ?>all.css" rel="stylesheet">
        <link href="<?php echo RUTA_CSS ?>estilos.css" rel="stylesheet">
        <!--inicio código para ícono-->
        <link rel="shortcut icon" href="img/icono.ico">
        <!--fin código para ícono-->
    </head>
    <body>