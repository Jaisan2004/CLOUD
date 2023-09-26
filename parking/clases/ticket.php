<?php
class ticket{
    public $id_ticket;
    public $hora_entrada;
    public $hora_salida;
    public $precio_ticket;
    private $ubicacion_auto;
    public $tipo_vehiculo;
    private $cedula_clien;

    function constructor($id_ticket,$hora_entrada,$hora_salida,$precio_ticket,$ubicacion_auto,$auto,$cedula_clien){
        $this->id_ticket=$id_ticket;
        $this->hora_entrada=$hora_entrada;
        $this->hora_salida=$hora_salida;
        $this->precio_ticket=$precio_ticket;
        $this->ubicacion_auto=$ubicacion_auto;
        $this->tipo_vehiculo=$tipo_vehiculo;
        $this->cedula_clien=$cedula_clien;
    }   
}

    
   
?>