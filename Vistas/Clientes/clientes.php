<?php
include('../Principal/principal.php');
require_once("../../Controladores/Clientes/clientes.controller.php");
?>
<div class="row">
    <div class="col-lg-4">
        <div class="card">
            <div class="card-body">
                <div class="d-flex no-block">
                    <div class="m-r-20 align-self-center"><span class="lstick m-r-20"></span><img src="../../assets/images/icon/income.png" alt="Income" /></div>
                    <div class="align-self-center">
                        <h6 class="text-muted m-t-10 m-b-0">Total Vehiculos</h6>
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
                        <h6 class="text-muted m-t-10 m-b-0">Total Vehiculos disponibles</h6>
                        <h2 class="m-t-0"><?php if (isset($$totalvehiculosreservados)) {
                                                echo $$totalvehiculosreservados;
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
                <h4 class="card-title">Banco de preguntas</h4>
                <h6 class="card-subtitle">Exportar datos en Excel, PDF & Print</h6>
                <div class="table-responsive m-t-40">
                    <table id="example23" class="display nowrap table table-hover table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Cedula</th>
                                <th>Nombre Cliente</th>
                                <th>Apellido Cliente</th>
                                <td>Acciones</td>
                           
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>Cedula</th>
                                <th>Nombre Cliente</th>
                                <th>Apellido Cliente</th>
                                <td>Acciones</td>
                            </tr>
                        </tfoot>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($clientes as $dato) {
                            ?>
                                <tr>
                                    <th><?php echo $i++; ?></th>
                                    <th><?php echo $dato->Cedula; ?></th>
                                    <th><?php echo $dato->NombreCliente; ?></th>
                                    <th><?php echo $dato->ApellidoCliente; ?></th>
                                    <th>
                                        <a type="button" class="btn btn-warning" data-toggle="modal" onclick="Editarcliente('<?php echo $dato->idCliente; ?>');">Editar</a>
                                        <!-- <button type="button" class="btn btn-danger" style="background-color: red; color: white;">Eliminar</button> -->
                                    </th>
                                </tr>
                            <?php

                                include('./editarc.php');
                            } ?>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_simple_numbers">
                    </div>
                    <tr>
                        <td colspan="2">
                            <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#addnew2">Agregar</button>
                            
                        </td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('./registrar.php');
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