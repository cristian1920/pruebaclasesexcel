<?php

include("../../Clases/Clientes/Class.clientes.php");

foreach ($_POST as $clave => $valor) {
    $$clave = addslashes(trim($valor));
}

$config = new Clientes();
$totalvehiculos = $config->totalvehiculos();
$totalvehiculosreservados = $config->totalvehiculosreservaados();
$clientes=$config->clientes();

if (!isset($task)) {
    $task = "";
} else {
    $task = $task;
}
switch ($task) {

    case 'registrarc':      
        try{
            $Respuesta = $config->Insertarc($Nombre,$Apellido,$Cedula);
            // header("location: ../../Vistas/BancoPreguntas/Preguntas.php");
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
        break;
    case 'Consulta':
        // echo $idRegistro;
        $Respuesta = $config->Individual($Idcliente);
        if ($Respuesta > 0) {
            echo json_encode($Respuesta);
        } else {
            echo "No se encontro registros";
        }
        break;
        
    case 'Editar':
            $Respuesta = $config->Editarcliente($eNombre,$eApellido,$eCedula,$eCedula2);
            // header("location: ../../Vistas/BancoPreguntas/Preguntas.php");
            if ($Respuesta > 0) {
                echo json_encode($Respuesta);
            } else {
                echo "No se encontro registros";
            }
        break;
       
       
        

}