<?php
require_once 'conexion.php';
class estacionamiento{
    private $id_estac;
    private $nombre_estac;
    private $direccion_estac;
    private $horario_entrada;
    private $horario_salida;
    const TABLA = 'estacionamiento';

    public function getId(){
        return $this->id_estac;
    }
    public function getNombre(){
        return $this->nombre_estac;
    }
    public function getDireccion(){
        return $this->direccion_estac;
    }
    public function getEntrada(){
        return $this->horario_entrada;
    }
    public function getSalida(){
        return $this->horario_salida;
    }
    public function setId($id_estac){
        $this->id_estac = $id_estac;
    }
    public function setNombre($nombre_estac){
        $this->nombre_estac = $nombre_estac;
    }
    public function setDireccion($direccion_estac){
        $this->direccion_estac = $direccion_estac;
    }
    public function setEntrada($horario_entrada){
        $this->horario_entrada = $horario_entrada;
    }
    public function setSalida($horario_salida){
        $this->horario_salida = $horario_salida;
    }
    
    public function __construct($nombre_estac, $direccion_estac, $horario_entrada, $horario_salida, $id_estac=null){
        $this->nombre_estac = $nombre_estac;
        $this->direccion_estac = $direccion_estac;
        $this->horario_entrada = $horario_entrada;
        $this->horario_salida = $horario_salida;
        $this->id_estac = $id_estac;
    }
    public function guardar(){
        $conexion = new Conexion();
        if ($this->id_estac)/*modifica*/{
            $consulta= $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre= :nombre, direccion = :direccion, horarioAbrir = :horarioAbrir,
             horarioCierre = :horarioCierre WHERE id=:id');
            $consulta->bindParam(':nombre', $this->nombre_estac);
            $consulta->bindParam(':direccion', $this->direccion_estac);
            $consulta->bindParam(':horarioAbrir', $this->horario_entrada);
            $consulta->bindParam(':horarioCierre', $this->horario_salida);
            $consulta->bindParam(':id',$this ->id_estac);
            $consulta->execute();
        }else /*insertar*/{
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, direccion, horarioAbrir, horarioCierre) VALUES(:nombre, :direccion,
             :horarioAbrir, :horarioCierre)');
            $consulta->bindParam(':nombre', $this->nombre_estac);
            $consulta->bindParam(':direccion', $this->direccion_estac);
            $consulta->bindParam(':horarioAbrir', $this->horario_entrada);
            $consulta->bindParam(':horarioCierre', $this->horario_salida);
            $consulta->execute();
            $this->id_estac = $conexion->lastInsertId();
        }
        $conexion = null;
     }
    public static function eliminar($id_estac){
        $conexion = new conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id_estac);
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
    public static function buscarPorId($id_estac){
        $conexion= new Conexion();
        $consulta = $conexion->prepare('SELECT*FROM '  .self ::TABLA .' WHERE id= :id');
        $consulta->bindParam(':id',$id_estac);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro; 
    }
}
?>