<!-- Agregar Nuevos Registros -->
<div class="modal fade" id="addnew" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 932px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Registrar usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="Cerrarmodal1()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="recipient-name" class="col-form-label">Referencia: *</label>
                            <input type="number" class="form-control registrar" id="Referencia">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Nombre Carro: *</label>
                            <input type="text" class="form-control registrar" id="NombreCarro" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Planta Produccion: *</label>
                            <input type="text" class="form-control registrar" id="PlantaProduccion" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="recipient-name" class="col-form-label">Fecha Produccion: *</label>
                            <input type="date" class="form-control registrar"  id="FechaProduccion" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Modelo: *</label>
                            <input type="number" class="form-control registrar" id="Modelo" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Ciuedad Almacenamiento: *</label>
                            <input type="text" class="form-control registrar" id="CiudadAlmacenamiento" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary"  onclick="Cerrarmodal1()"data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="Registrar()">Registrar</button>
            </div>
        </div>
    </div>
</div>