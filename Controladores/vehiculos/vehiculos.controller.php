<?php

include("../../Clases/Vehiculos/Class.vehiculos.php");

foreach ($_POST as $clave => $valor) {
    $$clave = addslashes(trim($valor));
}

$config = new Vehiculo();
$carros = $config->carros();


if (!isset($task)) {
    $task = "";
} else {
    $task = $task;
}
switch ($task) {

    case 'registrar':      
        try{
            $Respuesta = $config->Insertar($Referencia,$NombreCarro,$PlantaProduccion,$FechaProduccion,$Modelo,$CiudadAlmacenamiento);
            // header("location: ../../Vistas/BancoPreguntas/Preguntas.php");
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
        break;

    
    case 'ConsultaIndividual':
        // echo $idRegistro;
        $Respuesta = $config->Individual($IdReferencia);
        if ($Respuesta > 0) {
            echo json_encode($Respuesta);
        } else {
            echo "No se encontro registros";
        }
        break;
        
    case 'EditarInformacion':
        $Respuesta = $config->EditarInformacion($EReferencia, $ENombreCarro, $EPlantaProduccion, $EFechaProduccion,$EModelo, $ECiudadAlmacenamiento);
        if ($Respuesta > 0) {
            echo json_encode($Respuesta);
        } else {
            echo "No se encontro registros";
        }
        break;
   
   
    }


