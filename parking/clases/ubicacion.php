<?php
require_once 'conexion.php';
class ubicacion{
    private $id_ubica;
    private $nombre_ubica;
    private $estado_ubica;
    private $piso_ubica;
    private $lugar_ubica;
    private $id_estacionamiento;
    const TABLA = 'ubicacion';

    public function getId(){
        return $this->id_ubica;
    }
    public function getNombre(){
        return $this->nombre_ubica;
    }
    public function getEstado(){
        return $this->estado_ubica;
    }
    public function getPiso(){
        return $this->piso_ubica;
    }
    public function getLugar(){
        return $this->lugar_ubica;
    }
    public function getEstacionamiento(){
        return $this->id_estacionamiento;
    }
    public function setId($id_ubica){
        $this->id_ubica = $id_ubica;
    }
    public function setModelo($nombre_ubica){
        $this->nombre_ubica = $nombre_ubica;
    }
    public function setMarca($estado_ubica){
        $this->estado_ubica = $estado_ubica;
    }
    public function setPlaca($piso_ubica){
        $this->piso_ubica = $piso_ubica;
    }
    public function setColor($lugar_ubica){
        $this->lugar_ubica = $lugar_ubica;
    }
    public function setTipo($id_estacionamiento){
        $this->id_estacionamiento = $id_estacionamiento;
    }
    function __construct($nombre_ubica,$estado_ubica,$piso_ubica,$lugar_ubica, $id_estacionamiento,$id_ubica=null){
        $this->nombre_ubica=$nombre_ubica;
        $this->estado_ubica=$estado_ubica;
        $this->piso_ubica=$piso_ubica;
        $this->lugar_ubica=$lugar_ubica;
        $this->id_estacionamiento=$id_estacionamiento;
        $this->id_ubica=$id_ubica;
    }
    public function guardar(){
        $conexion = new Conexion();
        if ($this->id_ubica)/*modifica*/{
            $consulta= $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre= :nombre, estado = :estado, piso = :piso,
            lugarDeEstacionamiento = :lugarDeEstacionamiento, id_estacionamiento = :id_estacionamiento WHERE id=:id');
            $consulta->bindParam(':nombre', $this->nombre_ubica);
            $consulta->bindParam(':estado', $this->estado_ubica);
            $consulta->bindParam(':piso', $this->piso_ubica);
            $consulta->bindParam(':lugarDeEstacionamiento', $this->lugar_ubica);
            $consulta->bindParam(':id_estacionamiento', $this->id_estacionamiento);
            $consulta->bindParam(':id',$this ->id_ubica);
            $consulta->execute();
        }else /*insertar*/{
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, estado, piso, lugarDeEstacionamiento, id_estacionamiento) 
            VALUES(:nombre, :estado, :piso, :lugarDeEstacionamiento, :id_estacionamiento)');
            $consulta->bindParam(':nombre', $this->nombre_ubica);
            $consulta->bindParam(':estado', $this->estado_ubica);
            $consulta->bindParam(':piso', $this->piso_ubica);
            $consulta->bindParam(':lugarDeEstacionamiento', $this->lugar_ubica);
            $consulta->bindParam(':id_estacionamiento', $this->id_estacionamiento);
            $consulta->execute();
            $this->id_ubica = $conexion->lastInsertId();
        }
        $conexion = null;
     }
    public static function eliminar($id_ubica){
        $conexion = new conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id_ubica);
        $consulta->execute();
        $registro = $consulta->fetch();
    } 
    public static function recuperarTodos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT*FROM ' . self::TABLA . ' ORDER BY id');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
    public static function buscarPorId($id_ubica){
        $conexion= new Conexion();
        $consulta = $conexion->prepare('SELECT*FROM '  .self ::TABLA .' WHERE id= :id');
        $consulta->bindParam(':id',$id_ubica);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro; 
    }
}
?>