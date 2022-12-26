<div class="modal fade" id="modal-update-element">
    <form action="{{ route('color.content.update') }}" method="post" id="form-update-slider" class="modal-dialog" enctype="multipart/form-data">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Actualizar color</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
                </button>
            </div>
        <div class="modal-body">
            <input type="hidden" name="id">
            <div class="form-group">
                <input type="text" name="reference" class="form-control" placeholder="Referencia de la empresa">
            </div>
            <div class="form-group">
                <input type="text" name="name" class="form-control">
            </div>
            <div class="form-group">
                <input type="file" name="exa" class="form-control-file">
            </div>  
        </div>
        <div class="modal-footer justify-content-between">
            <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
            <button type="submit" class="btn btn-primary">Actualizar</button>
        </div>
        </div>
        <!-- /.modal-content -->
    </form>
    <!-- /.modal-dialog -->
</div>