<?php
require_once 'conexion.php';
class vehiculo{
    private $id_vehicu;
    private $modelo;
    private $marca;
    private $placa;
    private $color;
    private $tipo_vehiculo;
    private $id_duenio;
    const TABLA='vehiculo as ve';
    const TABLATIPO='tipovehiculo as ti';
    const TABLACLIEN='cliente as cli';

    public function getId(){
        return $this->id_vehicu;
    }
    public function getModelo(){
        return $this->modelo;
    }
    public function getMarca(){
        return $this->marca;
    }
    public function getPlaca(){
        return $this->placa;
    }
    public function getColor(){
        return $this->color;
    }
    public function getTipo(){
        return $this->tipo_vehiculo;
    }
    public function getDuenio(){
        return $this->id_duenio;
    }
    public function setId($id_vehicu){
        $this->id_vehicu = $id_vehicu;
    }
    public function setModelo($modelo){
        $this->modelo = $modelo;
    }
    public function setMarca($marca){
        $this->marca = $marca;
    }
    public function setPlaca($placa){
        $this->placa = $placa;
    }
    public function setColor($color){
        $this->color = $color;
    }
    public function setTipo($tipo_vehiculo){
        $this->tipo_vehiculo = $tipo_vehiculo;
    }
    public function setDuenio($id_duenio){
        $this->id_duenio = $id_duenio;
    }
    public function __construct($modelo,$marca,$placa,$color,$tipo_vehiculo,$id_duenio, $id_vehicu=null){
        $this->modelo=$modelo;
        $this->marca=$marca;
        $this->placa=$placa;
        $this->color=$color;
        $this->tipo_vehiculo=$tipo_vehiculo;
        $this->id_duenio=$id_duenio;
        $this->id_vehicu=$id_vehicu;
    }
    public function guardar(){
        $conexion = new Conexion();
        if ($this->id_vehicu)/*modifica*/{
            $consulta= $conexion->prepare('UPDATE ' . self::TABLA .' SET modelo= :modelo, marca = :marca, placa = :placa,
            color = :color, id_tipo_vehiculo = :id_tipo_vehiculo, id_duenio = :id_duenio WHERE id=:id');
            $consulta->bindParam(':modelo', $this->modelo);
            $consulta->bindParam(':marca', $this->marca);
            $consulta->bindParam(':placa', $this->placa);
            $consulta->bindParam(':color', $this->color);
            $consulta->bindParam(':id_tipo_vehiculo', $this->tipo_vehiculo);
            $consulta->bindParam(':id_duenio', $this->id_duenio);
            $consulta->bindParam(':id',$this ->id_vehicu);
            $consulta->execute();
        }else /*insertar*/{
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (modelo, marca, placa, color, id_tipo_vehiculo, id_duenio) 
            VALUES(:modelo, :marca, :placa, :color, :id_tipo_vehiculo, :id_duenio)');
            $consulta->bindParam(':modelo', $this->modelo);
            $consulta->bindParam(':marca', $this->marca);
            $consulta->bindParam(':placa', $this->placa);
            $consulta->bindParam(':color', $this->color);
            $consulta->bindParam(':id_tipo_vehiculo', $this->tipo_vehiculo);
            $consulta->bindParam(':id_duenio', $this->id_duenio);
            $consulta->execute();
            $this->id_vehicu = $conexion->lastInsertId();
        }
        $conexion = null;
     }
    public static function eliminar($id_vehicu){
        $conexion = new conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id_vehicu);
        $consulta->execute();
        $registro = $consulta->fetch();
    } 
    public static function recuperarTodos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT ve.id, ve.modelo, ve.marca, ve.placa, ve.color, ti.tipo_vehiculo, CONCAT(cli.nombre," ",cli.apellido) as duenio
        FROM ' . self::TABLA . ' INNER JOIN '.self::TABLATIPO.' ON ve.id_tipo_vehiculo = ti.id INNER JOIN '.self::TABLACLIEN.' on ve.id_duenio = cli.id ORDER BY id');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
    public static function buscarPorId($id_vehicu){
        $conexion= new Conexion();
        $consulta = $conexion->prepare('SELECT*FROM '  .self ::TABLA .' WHERE id= :id');
        $consulta->bindParam(':id',$id_vehicu);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro; 
    }
}
?>