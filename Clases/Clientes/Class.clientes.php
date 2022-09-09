<?php
class Clientes
{

    function __construct()
    {
        require_once('../../Clases/Conexion/conexion.php');
        require_once('../../Vistas/sesion.php');
        $conexion = new ConexionMysql();
        $this->conectar = $conexion->conexion();
        return $this->conectar;
    }



    function clientes(){
        $sql = "SELECT * FROM clientes";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }

    function Insertarc($Nombre,$Apellido,$Cedula){
        // utf8_encode(utf8_decode($pregunta));
        $Date = date("Y-m-d");
        $query = $this->conectar->prepare('INSERT INTO clientes (NombreCliente,ApellidoCliente,Cedula) 
        VALUES(:NombreCliente,:ApellidoCliente,:Cedula)');
        $query->execute([
        "NombreCliente" => $Nombre, "ApellidoCliente" => $Apellido, "Cedula" => $Cedula
        ]);
        if ($query) {
        return 1;
        } else {
        return 0;
        }
        

    }
    function Individual($Idcliente)
    {
        $sql = "SELECT * FROM clientes where idCliente = $Idcliente";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }

    function Editarcliente($eNombre,$eApellido,$eCedula,$eCedula2){
        $sql = ("UPDATE clientes  SET Cedula=$eCedula,NombreCliente='$eNombre',ApellidoCliente='$eApellido' WHERE Cedula=$eCedula2");
        $query = $this->conectar->prepare($sql);
        $query->execute();
        if ($query) {
            return 1;
        } else {
            echo "Hubo problemas con la actualizacion";
        }
    }

    function totalvehiculos(){
        $sql = "SELECT COUNT(*) FROM carros where Estado=1";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchColumn();
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }

    function totalvehiculosreservaados(){
        $sql1 = "SELECT COUNT(*) FROM carros WHERE Estado=0";
        if ($sentencia1 = $this->conectar->query($sql1)) {
            return $sentencia1->fetchColumn();
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }
}