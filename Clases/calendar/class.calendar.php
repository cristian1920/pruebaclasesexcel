<?php
header('Content-Type: application/json');
$pdo=new PDO("mysql:dbname=prueba;host=127.0.0.1","root","");

$query=$pdo->prepare("SELECT COUNT(*) as total,FechaReserva FROM reserva GROUP by FechaReserva;");
$query->execute();
$resultado=$query->fetchAll(PDO::FETCH_ASSOC);
$eventos = array();    

foreach($resultado as $resultado){
    $title = $resultado['total'];
    $start = $resultado['FechaReserva'];
    $end = $resultado['FechaReserva'];
    $clase = "reserva-realizadas";
    
    $eventos[] = array('title' => $title.' Reservas', 'start' => $start, 'end' => $end, 'className' => $clase);
}
    
$arrayJson = json_encode($eventos, JSON_UNESCAPED_UNICODE);
print_r($arrayJson);

?>


  