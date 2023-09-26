<?php
require_once "../clases/ticket.php";

$calTiempo = new ticket();
$calTiempo->hora_entrada = new DateTime('2001-03-12 11:13:12');
$calTiempo->hora_salida = new DateTime('2000-02-01 01:13:43');

function calculartiempo($calTiempo){
    $fechaFinal = $calTiempo->hora_entrada->diff($calTiempo->hora_salida);
    echo $fechaFinal->format('%Y años %m meses %d days %H horas %i minutos 
    %s segundos');
};

calculartiempo($calTiempo);