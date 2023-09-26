<?php
require_once 'conexion.php';
class empleado{
    private $id_emplea;
    private $nombre_emplea;
    private $apellido_emplea;
    private $cedula_emplea;
    private $correo_emplea;
    private $horaria_entra_emplea;
    private $horaria_sali_emplea;
    private $estacionamiento;
    const TABLA='empleado as e';
    const TABLAESTACI='estacionamiento as es';

    public function getId(){
        return $this->id_emplea;
    }
    public function getNombre(){
        return $this->nombre_emplea;
    }
    public function getApellido(){
        return $this->apellido_emplea;
    }
    public function getCedula(){
        return $this->cedula_emplea;
    }
    public function getCorreo(){
        return $this->correo_emplea;
    }
    public function getEntrada(){
        return $this->horaria_entra_emplea;
    }
    public function getSalida(){
        return $this->horaria_sali_emplea;
    }
    public function getEstacionamiento(){
        return $this->estacionamiento;
    }
    public function setId($id_emplea){
        $this->id_emplea = $id_emplea;
    }
    public function setNombre($nombre_emplea){
        $this->nombre_emplea = $nombre_emplea;
    }
    public function setApellido($apellido_emplea){
        $this->apellido_emplea = $apellido_emplea;
    }
    public function setCedula($cedula_emplea){
        $this->cedula_emplea = $cedula_emplea;
    }
    public function setCorreo($correo_emplea){
        $this->correo_emplea = $correo_emplea;
    }
    public function setEntrada($horaria_entra_emplea){
        $this->horaria_entra_emplea = $horaria_entra_emplea;
    }
    public function setSalida($horaria_sali_emplea){
        $this->horaria_sali_emplea = $horaria_sali_emplea;
    }
    public function setEstacionamiento($estacionamiento){
        $this->estacionamiento = $estacionamiento;
    }

    public function __construct($nombre_emplea,$apellido_emplea,$cedula_emplea,$correo_emplea,$horaria_entra_emplea,$horaria_sali_emplea,$estacionamiento,$id_emplea=null){
        $this->nombre_emplea=$nombre_emplea;
        $this->apellido_emplea=$apellido_emplea;
        $this->cedula_emplea=$cedula_emplea;
        $this->correo_emplea=$correo_emplea;
        $this->horaria_entra_emplea=$horaria_entra_emplea;
        $this->horaria_sali_emplea=$horaria_sali_emplea;
        $this->estacionamiento=$estacionamiento;
        $this->id_emplea=$id_emplea; 
    }
    public function guardar(){
        $conexion = new conexion();
        if ($this->id_emplea)/*modifica*/{
           $consulta= $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre= :nombre, apellido = :apellido, cedula = :cedula, horarioEntrada = :horarioEntrada,
           horarioSalida = :horarioSalida, correo = :correo, id_estacionamiento = :id_estacionamiento WHERE id = :id');
           $consulta->bindParam(':nombre', $this->nombre_emplea);
           $consulta->bindParam(':apellido', $this->apellido_emplea);
           $consulta->bindParam(':cedula', $this->cedula_emplea);
           $consulta->bindParam(':horarioEntrada', $this->horaria_entra_emplea);
           $consulta->bindParam(':horarioSalida', $this->horaria_sali_emplea);
           $consulta->bindParam(':correo', $this->correo_emplea);
           $consulta->bindParam(':id_estacionamiento', $this->estacionamiento);
           $consulta->bindParam(':id',$this ->id_emplea);
           $consulta->execute();
        }else /*insertar*/{
           $consulta = $conexion->prepare('INSERT INTO ' .self::TABLA. ' (nombre, apellido, cedula, horarioEntrada, horarioSalida, correo, id_estacionamiento)
            VALUES(:nombre, :apellido, :cedula, :horarioEntrada, :horarioSalida, :correo, :id_estacionamiento)');
           $consulta->bindParam(':nombre', $this->nombre_emplea);
           $consulta->bindParam(':apellido', $this->apellido_emplea);
           $consulta->bindParam(':cedula', $this->cedula_emplea);
           $consulta->bindParam(':horarioEntrada', $this->horaria_entra_emplea);
           $consulta->bindParam(':horarioSalida', $this->horaria_sali_emplea);
           $consulta->bindParam(':correo', $this->correo_emplea);
           $consulta->bindParam(':id_estacionamiento', $this->estacionamiento);
           $consulta->execute();
           $this->id_emplea = $conexion->lastInsertId();
        }
        $conexion = null;
     }
     public static function eliminar($id_emplea){
        $conexion = new conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id_emplea);
        $consulta->execute();
        $registro = $consulta->fetch();
    } 
     public static function recuperarTodos(){
        $conexion = new Conexion();
        $consulta = $conexion->prepare('SELECT e.id, e.nombre, e.apellido, e.cedula, e.horarioEntrada, e.horarioSalida, es.nombre as estacionamiento
         FROM ' . self::TABLA .' INNER JOIN '.self::TABLAESTACI. ' on e.id_estacionamiento = es.id ORDER BY id');
        $consulta->execute();
        $registros = $consulta->fetchAll();
        return $registros;
    }
    public static function buscarPorId($id_emplea){
        $conexion= new Conexion();
        $consulta = $conexion->prepare('SELECT*FROM '  .self ::TABLA .' WHERE id= :id');
        $consulta->bindParam(':id',$id_emplea);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro; 
    }
}
?>