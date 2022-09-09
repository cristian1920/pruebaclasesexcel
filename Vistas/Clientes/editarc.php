<div class="modal fade" id="Editarcliente" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="max-width: 932px!important;">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Actualizar Registro</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="Cerrarmodalc()" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <label for="recipient-name" class="col-form-label">Nombre: *</label>
                            <input type="text" class="form-control editarc" id="ENombrec">
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Apellido: *</label>
                            <input type="text" class="form-control editarc" id="EApellidoc" required>
                        </div>
                        <div class="form-group col-md-4">
                            <label for="message-text" class="col-form-label">Cedula: *</label>
                            <input type="hidden" class="form-control editarc" id="ECedulaco">
                            <input type="number" class="form-control editarc" id="ECedulac" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" onclick="Cerrarmodalc()" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                <button type="button" class="btn btn-primary" onclick="EditarclienteBD()">Actualizar</button>
            </div>
        </div>
    </div>
</div>