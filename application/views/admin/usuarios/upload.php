<section class="content-header">
    <h1>
        Importar Data 
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <form action="<?php echo base_url();?>administrador/usuarios/importar" method="POST" id="upload-data" enctype="multipart/form-data">
                        
                        <div class="form-group">
                            <label for="tabla">Seleccione Tabla:</label>
                            <select name="tabla" id="tabla" required="required" class="form-control">
                                <option value="">Elija...</option>
                                <option value="1">Computadoras</option>
                                <option value="2">Impresoras</option>
                                <option value="3">Monitores</option>
                            </select>
                        </div >
                        <div class="form-group">
                            <label for="">Seleccione archivo:</label>
                            <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required="required">
                        </div>
                        
                        <div class="form-group">
                            <input type="submit" name="guardar" class="btn btn-success btn-flat" value="Guardar">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->