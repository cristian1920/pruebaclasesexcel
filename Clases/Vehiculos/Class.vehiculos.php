<?php
class Vehiculo
{

    function __construct()
    {
        require_once('../../Clases/Conexion/conexion.php');
        require_once('../../Vistas/sesion.php');
        $conexion = new ConexionMysql();
        $this->conectar = $conexion->conexion();
        return $this->conectar;
    }

    function Carros(){
        $sql = "SELECT * FROM carros";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
        
        

    }

    function Insertar($Referencia,$NombreCarro,$PlantaProduccion,$FechaProduccion,$Modelo,$CiudadAlmacenamiento){
        // utf8_encode(utf8_decode($pregunta));
        $Date = date("Y-m-d");
        $query = $this->conectar->prepare('INSERT INTO carros (IdReferencia,NombreCarro,PlantaProduce,FechaEnsamble,Modelo,CiudadAlmacen,FechaIngreso,Estado) 
        VALUES(:IdReferencia,:NombreCarro,:PlantaProduce,:FechaEnsamble,:Modelo,:CiudadAlmacen,:FechaIngreso,:Estado)');
        $query->execute([
        "IdReferencia" => $Referencia, "NombreCarro" => $NombreCarro, "PlantaProduce" => $PlantaProduccion, "FechaEnsamble" => $FechaProduccion, "Modelo" => $Modelo,
        "CiudadAlmacen" => $CiudadAlmacenamiento,"FechaIngreso"=>$Date,"Estado"=>'1'
        ]);
        if ($query) {
        return 1;
        } else {
        return 0;
        }
        

    }

    function Individual($IdReferencia)
    {
        $sql = "SELECT * FROM carros where idcarro = $IdReferencia";
        if ($sentencia = $this->conectar->query($sql)) {
            return $sentencia->fetchAll(PDO::FETCH_OBJ);
        } else {
            echo "Falló en la consulta";
            exit();
        }
    }

    function EditarInformacion($EReferencia, $ENombreCarro, $EPlantaProduccion, $EFechaProduccion,$EModelo, $ECiudadAlmacenamiento)
    {

        $sql = ("UPDATE carros SET IdReferencia=$EReferencia,NombreCarro='$ENombreCarro',PlantaProduce='$EPlantaProduccion',FechaEnsamble='$EFechaProduccion',Modelo=$EModelo,CiudadAlmacen='$ECiudadAlmacenamiento',Estado=1 WHERE idReferencia=$EReferencia");
        $query = $this->conectar->prepare($sql);
        $query->execute();
        if ($query) {
            return 1;
        } else {
            echo "Hubo problemas con la actualizacion";
        }
    }

}
?>