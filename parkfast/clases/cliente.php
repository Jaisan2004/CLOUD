<?php
require_once 'conexion.php';
class cliente{
    private $id;
    private $nombre;
    private $apellido;
    private $cedula;
    private $edad;
    const TABLA='cliente';

    public function getId(){
        return $this->id;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function getApellido(){
        return $this->apellido;
    }
    public function getCedula(){
        return $this->cedula;
    }
    public function getEdad(){
        return $this->edad;
    }
    public function setId($id){
        return $this->id;
    }
    public function setNombre($nombre){
        return $this->nombre;
    }
    public function setApellido($apellido){
        return $this->apellido;
    }
    public function setCedula($cedula){
        return $this->cedula;
    }
    public function setEdad($edad){
        return $this->edad;
    }
    

    public function __construct($nombre,$apellido,$cedula,$edad,$id=null){
        $this->nombre=$nombre;
        $this->apellido=$apellido;
        $this->cedula=$cedula;
        $this->edad=$edad;
        $this->id=$id;
    }
    public function guardar(){
        $conexion = new conexion();
        if ($this->id)/*modifica*/{
            $consulta= $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre= :nombre, apellido = :apellido, cedula = :cedula,
            edad = :edad WHERE id=:id');
             $consulta->bindParam(':nombre', $this->nombre);
             $consulta->bindParam(':apellido', $this->apellido);
             $consulta->bindParam(':cedula', $this->cedula);
             $consulta->bindParam(':edad', $this->edad);
            $consulta->bindParam(':id',$this ->id);
            $consulta->execute();
        }else /*insertar*/{
           $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA. ' (nombre, apellido, cedula, edad)
            VALUES(:nombre, :apellido, :cedula, :edad)');
           $consulta->bindParam(':nombre', $this->nombre);
           $consulta->bindParam(':apellido', $this->apellido);
           $consulta->bindParam(':cedula', $this->cedula);
           $consulta->bindParam(':edad', $this->edad);
           $consulta->execute();
           $this->id = $conexion->lastInsertId();
        }
        $conexion = null;
     }
     public static function eliminar($id){
        $conexion = new conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id);
        $consulta->execute();
        $registro = $consulta->fetch();
    } 
     public static function recuperarTodos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT *FROM ' . self::TABLA . ' ORDER BY id');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
    public static function buscarPorId($id){
        $conexion= new Conexion();
        $consulta = $conexion->prepare('SELECT*FROM '  .self ::TABLA .' WHERE id= :id');
        $consulta->bindParam(':id',$id);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro; 
    }
    
}
?>