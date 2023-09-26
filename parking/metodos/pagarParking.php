<?php
require_once "../clases/ticket.php";
require_once "../clases/cliente.php";
require_once "../clases/empleado.php";
 
$nTicket = new ticket();
$nTicket -> id_ticket = 01;
$nTicket -> precio_ticket = 30000;

$nCliente = new cliente();
$nCliente -> nombre = "Jhon Alex";
$nCliente -> apellido = "Castaño";
$nCliente -> cedula = 46357173;

$nEmpleado = new empleado();
$nEmpleado -> nombre_emplea = "Yeison";
$nEmpleado -> apellido_emplea = "Jímenez";

function validarPago($nCliente,$nEmpleado,$nTicket){
    $pagadoCliente = 29000;
    $diferencia = $nTicket->precio_ticket-$pagadoCliente;

    if($diferencia == 0){
        echo "El cliente: ".$nCliente->nombre." ".$nCliente->apellido." ha cancelado satisfatoriamente el ticket. 
        El empleado ".$nEmpleado->nombre_emplea." ".$nEmpleado->apellido_emplea." cerfica el pago";
    }
    else if($diferencia > 0){
        echo "El cliente: ".$nCliente->nombre." ".$nCliente->apellido." tiene un valor en mora por total de: 
        ".$diferencia." 
        El empleado ".$nEmpleado->nombre_emplea." ".$nEmpleado->apellido_emplea." cerfica el ticket";
    }
}

validarPago($nCliente,$nEmpleado,$nTicket);