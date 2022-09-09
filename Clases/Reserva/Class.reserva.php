<?php
date_default_timezone_set('UTC');
date_default_timezone_set("America/Bogota");
class Reserva
{
    
    function __construct()
    {
        require_once('../../Clases/Conexion/conexion.php');
        require_once('../../Vistas/sesion.php');
        $conexion = new ConexionMysql();
        $this->conectar = $conexion->conexion();
        return $this->conectar;
    }



    function historico(){
        $sql = "SELECT CONCAT(cl.NombreCliente, ' ', cl.ApellidoCliente) as Cliente,CL.Cedula,c.idcarro,c.NombreCarro,c.IdReferencia,c.modelo,R.FechaReserva,c.CiudadAlmacen from carros c inner join Reserva r on R.idcarro_reserva = C.idcarro inner join clientes CL on CL.idCliente = R.idcliente_reserva;";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }

    function ValoresOption(){
        $sql = "SELECT NombreCarro, idcarro from carros where Estado =1 ORDER BY idcarro ASC;";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }

    function ValoresOption2(){
        $sql2 = "SELECT NombreCliente, idCliente from clientes ORDER BY idCliente ASC;";
        if ($sentencia2 = $this->conectar->query($sql2)) {
            return $sentencia2->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }

    function Reserva($idcliente, $idcarro){
        // utf8_encode(utf8_decode($pregunta));
        $Date = date("Y-m-d");
        $query = $this->conectar->prepare('INSERT INTO reserva (idcarro_reserva,idcliente_reserva,FechaReserva) 
        VALUES(:idcarro_reserva,:idcliente_reserva,:FechaReserva)');
        $query->execute([
        "idcarro_reserva" => $idcarro, "idcliente_reserva" => $idcliente, "FechaReserva" => $Date
        ]);

        $sql = ("UPDATE carros SET Estado=0 WHERE idcarro=$idcarro");
        $query2 = $this->conectar->prepare($sql);
        $query2->execute();
        if ($query) {
        return 1;
        } else {
        return 0;
        }
        

    }

    function Activar($idcarro,$fechareserva,$datea){
        if($fechareserva>$datea){
            $sql = ("UPDATE carros SET Estado=1 WHERE idcarro=$idcarro");
            $query2 = $this->conectar->prepare($sql);
            $query2->execute();
        }
    }

    function callendar(){
        $sql = ("SELECT COUNT(*) as total,FechaReserva FROM reserva GROUP by FechaReserva;");
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }
}