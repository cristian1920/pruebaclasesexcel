<?php
include('../Principal/principal.php');
require_once("../../Controladores/vehiculos/vehiculos.controller.php");
?>
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
                                <th>Referencia</th>
                                <th>Nombre Carro</th>
                                <th>Planta Produccion</th>
                                <th>Fecha Produccion</th>
                                <th>Modelo</th>
                                <th>Ciuedad Almacenamiento</th>
                                <th>Fecha Ingreso</th>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>$</th>
                                <th>Referencia</th>
                                <th>Nombre Carro</th>
                                <th>Planta Produccion</th>
                                <th>Fecha Produccion</th>
                                <th>Modelo</th>
                                <th>Ciuedad Almacenamiento</th>
                                <th>Fecha Ingreso</th>
                                <td>Acciones</td>
                            </tr>
                        </tfoot>
                        <tbody>
                        <?php
                            $i=1;
                                            foreach ($carros as $dato) {
                                            ?>
                                                <tr>
                                                    <th><?php echo $i++; ?></th>
                                                    <th><?php echo $dato->IdReferencia; ?></th>
                                                    <th><?php echo $dato->NombreCarro; ?></th>
                                                    <th><?php echo $dato->PlantaProduce; ?></th>
                                                    <th><?php echo $dato->FechaEnsamble; ?></th>
                                                    <th><?php echo $dato->Modelo; ?></th>
                                                    <th><?php echo $dato->CiudadAlmacen; ?></th>
                                                    <th><?php echo $dato->FechaIngreso; ?></th>
                                                    <th>
                                                        <a type="button" class="btn btn-warning" data-toggle="modal" onclick="EditarInformacion('<?php echo $dato->idcarro; ?>');">Editar</a>
                                                        <!-- <button type="button" class="btn btn-danger" style="background-color: red; color: white;">Eliminar</button> -->
                                                    </th>
                                                </tr>
                                            <?php 
                                        
                                        include('./Editar.php');
                                        } ?>
                        </tbody>
                    </table>
                    <div class="dataTables_paginate paging_simple_numbers">
                    </div>
                    <tr>
                        <td colspan="2">
                        <button type="button" class="btn btn-info btn-rounded" data-toggle="modal" data-target="#addnew">Agregar</button>
                        </td>
                    </tr>
                </div>
            </div>
        </div>
    </div>
</div>



<?php
include('./registrar.php');
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