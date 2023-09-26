<?php
class pqrs{
    private $fecha_cracion;
    private $cliente_realiza;
    private $fecha_incidente;
    private $descripcion;
    private $tipo_pqrs;
    private $estado_pqrs;
    private $empleado_atiende;
    private $fecha_resuelve;

    function constructor($fecha,$cliente_realiza,$fecha_incidente,$descripcion,$tipo_pqrs,$estado_pqrs,$empleado_atiende,$fecha_resuelve){
        $this->fecha=$fecha;
        $this->cliente_realiza=$cliente_realiza;
        $this->fecha_incidente=$fecha_incidente;
        $this->descripcion=$descripcion;
        $this->tipo_pqrs=$tipo_pqrs;
        $this->estado_pqrs=$estado_pqrs;
        $this->empleado_atiende=$empleado_atiende;
        $this->fecha_resuelve=$fecha_resuelve;
    }

    public function crear_pqrs(){

    }
}  
?>