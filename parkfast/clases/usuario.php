<?php
require_once 'conexion.php';
class usuario{
    private $id_usu;
    private $nombre_usu;
    private $apellido_usu;
    private $usuario_usu;
    private $password_usu;
    const TABLA = 'usuario';

    public function getId(){
        return $this->id_usu;
    }
    public function getNombre(){
        return $this->nombre_usu;
    }
    public function getDireccion(){
        return $this->apellido_usu;
    }
    public function getEntrada(){
        return $this->usuario_usu;
    }
    public function getSalida(){
        return $this->password_usu;
    }
    public function setId($id_usu){
        $this->id_usu = $id_usu;
    }
    public function setNombre($nombre_usu){
        $this->nombre_usu = $nombre_usu;
    }
    public function setDireccion($apellido_usu){
        $this->apellido_usu = $apellido_usu;
    }
    public function setEntrada($usuario_usu){
        $this->usuario_usu = $usuario_usu;
    }
    public function setSalida($password_usu){
        $this->password_usu = $password_usu;
    }
    
    public function __construct($nombre_usu, $apellido_usu, $usuario_usu, $password_usu, $id_usu=null){
        $this->nombre_usu = $nombre_usu;
        $this->apellido_usu = $apellido_usu;
        $this->usuario_usu = $usuario_usu;
        $this->password_usu = $password_usu;
        $this->id_usu = $id_usu;
    }
    public function guardar(){
        $conexion = new Conexion();
        if ($this->id_usu)/*modifica*/{
            $consulta= $conexion->prepare('UPDATE ' . self::TABLA .' SET nombre= :nombre, direccion = :direccion, horarioAbrir = :horarioAbrir,
             horarioCierre = :horarioCierre WHERE id=:id');
            $consulta->bindParam(':nombre', $this->nombre_usu);
            $consulta->bindParam(':direccion', $this->apellido_usu);
            $consulta->bindParam(':horarioAbrir', $this->usuario_usu);
            $consulta->bindParam(':horarioCierre', $this->password_usu);
            $consulta->bindParam(':id',$this ->id_usu);
            $consulta->execute();
        }else /*insertar*/{
            $consulta = $conexion->prepare('INSERT INTO ' . self::TABLA . ' (nombre, direccion, horarioAbrir, horarioCierre) VALUES(:nombre, :direccion,
             :horarioAbrir, :horarioCierre)');
            $consulta->bindParam(':nombre', $this->nombre_usu);
            $consulta->bindParam(':direccion', $this->apellido_usu);
            $consulta->bindParam(':horarioAbrir', $this->usuario_usu);
            $consulta->bindParam(':horarioCierre', $this->password_usu);
            $consulta->execute();
            $this->id_usu = $conexion->lastInsertId();
        }
        $conexion = null;
     }
    public static function eliminar($id_usu){
        $conexion = new conexion();
        $consulta = $conexion->prepare('DELETE FROM ' . self::TABLA . ' WHERE id = :id');
        $consulta->bindParam(':id', $id_usu);
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
    public static function buscarPorId($id_usu){
        $conexion= new Conexion();
        $consulta = $conexion->prepare('SELECT*FROM '  .self ::TABLA .' WHERE id= :id');
        $consulta->bindParam(':id',$id_usu);
        $consulta->execute();
        $registro = $consulta->fetch();
        return $registro; 
    }
    public static function iniciarSesion($usuario_usu, $password_usu){
        $conexion= new Conexion();
        $consulta = $conexion->prepare('SELECT*FROM '  .self ::TABLA .' WHERE usuario= :usuario and password= :password');
        $consulta->bindParam(':usuario',$usuario_usu);
        $consulta->bindParam(':password',$password_usu);
        $consulta->execute();
        
        $nr = $consulta->rowCount();
        return $nr;
    }
}
?>