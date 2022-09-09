<?php

include("../../Clases/Reserva/Class.reserva.php");

foreach ($_POST as $clave => $valor) {
    $$clave = addslashes(trim($valor));
}

$config = new Reserva();
$historico = $config->historico();

if (!isset($task)) {
    $task = "";
} else {
    $task = $task;
}
switch ($task) {

    case 'Cliente':      
        try{
            $Respuesta = $config->Reserva($idcliente, $idcarro);
            // header("location: ../../Vistas/BancoPreguntas/Preguntas.php");
        }
        catch(PDOException $e){
            $_SESSION['message'] = $e->getMessage();
        }
        break;
    }