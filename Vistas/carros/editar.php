<div class="modal fade" id="EditarInformacion" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 932px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="Cerrarmodal()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            <form>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="recipient-name" class="col-form-label">Referencia: *</label>
                            <input type="number" class="form-control" id="EditReferencia">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Nombre Carro: *</label>
                            <input type="text" class="form-control" id="EditNombreCarro" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Planta Produccion: *</label>
                            <input type="text" class="form-control" id="EditPlantaProduccion" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="recipient-name" class="col-form-label">Fecha Produccion: *</label>
                            <input type="date" class="form-control" id="EditFechaProduccion" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Modelo: *</label>
                            <input type="number" class="form-control" id="EditModelo" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Ciuedad Almacenamiento: *</label>
                            <input type="text" class="form-control" id="EditCiuedadAlmacenamiento" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="Cerrarmodal()" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="EditarInformacionBD()">Actualizar</button>
            </div>
        </div>
    </div>
</div>