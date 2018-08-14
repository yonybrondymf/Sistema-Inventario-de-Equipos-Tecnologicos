<section class="content-header">
    <h1>
        Proveedores <small>Editar</small>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <form action="<?php echo base_url();?>configuraciones/proveedores/update" method="POST" enctype="multipart/form-data">
                        <?php if ($this->session->flashdata("success")): ?>
                            <script>
                                swal("Registro Actualizado!", "Haz click en el botón para continuar actualizando.", "success");
                            </script>
                        <?php endif ?>
                        <?php if ($this->session->flashdata("error")): ?>
                            <script>
                                swal("Error al Registrar!", "Haz click en el botón para volver intentarlo.", "error");
                            </script>
                        <?php endif ?>
                        <input type="hidden" name="idProveedor" value="<?php echo $proveedor->id;?>">
                        
                        <div class="form-group">
                            <label for="">Nombre:</label>
                            <input type="text" name="nombre" class="form-control" required="required" value="<?php echo !empty(set_value('nombre')) ? set_value('nombre'):$proveedor->nombre; ?>">
                        </div>
                        <div class="form-group">
                            <label for="nit">NIT:</label>
                            <input type="text" name="nit" class="form-control" required="required" value="<?php echo !empty(set_value('nit')) ? set_value('nit'):$proveedor->nit; ?>">
                        </div>

                        <div class="form-group">
                            <label for="direccion">Direccion:</label>
                            <input type="text" name="direccion" class="form-control" required="required" value="<?php echo $proveedor->direccion; ?>">
                        </div>
                        <div class="form-group">
                            <label for="correo">Correo:</label>
                            <input type="text" name="correo" class="form-control" required="required" value="<?php echo !empty(set_value('correo')) ? set_value('correo'):$proveedor->correo; ?>">
                        </div>

                        <?php if ($proveedor->estado == 0): ?>
                            <div class="form-group">
                                <label for="">Estado:</label>
                                <select name="estado" id="estado" required class="form-control">
                                    <option value="1">Activo</option>
                                    <option value="2" selected>Inactivo</option>
                                </select>
                            </div>
                        <?php endif ?>
                        
                        <div class="form-group">
                            <input type="submit" name="guardar" class="btn btn-success btn-flat" value="Guardar">
                            <a href="<?php echo base_url();?>reportes/proveedores" class="btn btn-danger btn-flat">Volver</a>
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