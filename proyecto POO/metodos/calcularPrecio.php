<?php
require_once "../clases/ticket.php";

$calTiempo = new ticket();
$calTiempo->hora_entrada = strtotime('2001-03-11 13:13:12');
$calTiempo->hora_salida = strtotime('2001-03-11 13:14:12');
$calTiempo->tipo_vehiculo = "moto";

function calcularPrecio($calTiempo){
    $segundos = ($calTiempo->hora_salida-$calTiempo->hora_entrada);

    if($calTiempo->tipo_vehiculo == "carro"){
        $precioFinal = $segundos * 7;
        echo "Total a pagar: ".$precioFinal; 
    }
    else if ($calTiempo->tipo_vehiculo == "moto"){
        $precioFinal = $segundos * 5;
        echo "Total a pagar: ".$precioFinal; 
    }
};

calcularPrecio($calTiempo);