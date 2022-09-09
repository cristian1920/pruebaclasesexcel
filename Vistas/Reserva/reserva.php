<?php
include('../Principal/principal.php');
require_once("../../Controladores/Clientes/clientes.controller.php");
require_once("../../Controladores/Reserva/reserva.controller.php");
$activar = new Reserva();
date_default_timezone_set('UTC');
date_default_timezone_set("America/Bogota");
?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../../assets/images/icon/income.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Total Vehiculos Disponibles</h6>
                        <h2 class="m-t-0"><?php if (isset($totalvehiculos)) {
                                                echo $totalvehiculos;
                                            } else {
                                                echo 0;
                                            } ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../../assets/images/icon/expense.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Total Vehiculos Reservados</h6>
                        <h2 class="m-t-0"><?php if (isset($totalvehiculosreservados)) {
                                                echo $totalvehiculosreservados;
                                            } else {
                                                echo 0;
                                            } ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../../assets/images/icon/assets.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Fecha actual</h6>
                        <h2 class="m-t-0"><?php 
                                                    $fechaactual = date("d/m/Y");
                                                    echo $fechaactual;
                                             
                                             ?></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Historico</h4>
                <h6 class="card-subtitle">Exportar datos en Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Nombre Cliente</th>
                                <th>Cedula</th>
                                <th>Nombre Carro</th>
                                <td>ID Referencia</td>
                                <td>Modelo</td>
                                <td>Fecha Reserva</td>
                                <td>Ciudad Almacen</td>
                           
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Nombre Cliente</th>
                                <th>Cedula</th>
                                <th>Nombre Carro</th>
                                <td>ID Referencia</td>
                                <td>Modelo</td>
                                <td>Fecha Reserva</td>
                                <td>Ciudad Almacen</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($historico as $dato) {
                                $fechareserva=$dato->FechaReserva;
                                $idcarro=$dato->idcarro;
                            ?>
                                <tr>
                                    <th><?php echo $i++; ?></th>
                                    <th><?php echo $dato->Cliente; ?></th>
                                    <th><?php echo $dato->Cedula; ?></th>
                                    <th><?php echo $dato->NombreCarro; ?></th>
                                    <th><?php echo $dato->IdReferencia; ?></th>
                                    <th><?php echo $dato->modelo; ?></th>
                                    <th><?php echo $dato->FechaReserva; ?></th>
                                    <th><?php echo $dato->CiudadAlmacen; ?></th>
                                </tr>
                            <?php
                                $datea=date("Y-m-d");
                                if($datea>$fechareserva){
                                    $Select = $activar->Activar($idcarro,$fechareserva,$datea);
                                }
                            }
                           
                   
                            ?>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_simple_numbers">
                    </div>
                    <tr>
                        <td colspan="2">
                            <button type="button" class="btn btn-success btn-rounded" data-toggle="modal" data-target="#asignar">Asignar</button>
                        </td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('./asignar.php');
include('../Principal/footer.php');

?>
<script>
    $(document).ready(function() {
        $('#myTable').DataTable();
        $(document).ready(function() {
            var table = $('#example').DataTable({
                "columnDefs": [{
                    "visible": false,
                    "targets": 2
                }],
                "order": [
                    [2, 'asc']
                ],
                "displayLength": 25,
                "drawCallback": function(settings) {
                    var api = this.api();
                    var rows = api.rows({
                        page: 'current'
                    }).nodes();
                    var last = null;
                    api.column(2, {
                        page: 'current'
                    }).data().each(function(group, i) {
                        if (last !== group) {
                            $(rows).eq(i).before('<tr class="group"><td colspan="5">' + group + '</td></tr>');
                            last = group;
                        }
                    });
                }
            });
            // Order by the grouping
            $('#example tbody').on('click', 'tr.group', function() {
                var currentOrder = table.order()[0];
                if (currentOrder[0] === 2 && currentOrder[1] === 'asc') {
                    table.order([2, 'desc']).draw();
                } else {
                    table.order([2, 'asc']).draw();
                }
            });
        });
    });
    $('#example23').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'excel', 'pdf', 'print'
        ]
    });
</script>