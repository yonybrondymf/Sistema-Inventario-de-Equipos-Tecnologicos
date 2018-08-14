<section class="content-header">
    <h1>
        Monitores <small>Editar</small>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <div class="row">
                <div class="col-md-6 col-sm-8 col-xs-12">
                    <form action="<?php echo base_url();?>equipos/monitores/update" method="POST">
                        <input type="hidden" name="idMonitor" value="<?php echo $monitor->id;?>">
                        <?php if ($this->session->flashdata("success")): ?>
                            <script>
                                swal("Registro Exitoso!", "Haz click en el botón para continuar registrando.", "success");
                            </script>
                        <?php endif ?>
                        <?php if ($this->session->flashdata("error")): ?>
                            <script>
                                swal("Error al Registrar!", "Haz click en el botón para volver intentarlo.", "error");
                            </script>
                        <?php endif ?>
                        
                        <div class="form-group">
                            <label for="codigo">Codigo:</label>
                            <input type="text" name="codigo" id="codigo" class="form-control" required="required" value="<?php echo $monitor->codigo;?>">
                        </div>
                        <div class="form-group">
                            <label for="tamaño">Tamaño:</label>
                            <input type="text" name="tamaño" id="tamaño" class="form-control" required="required" value="<?php echo $monitor->tamaño;?>">
                        </div>
                        <div class="form-group">
                            <label for="proveedor">Proveedor:</label>
                            <select name="proveedor" id="proveedor" class="form-control" required="required">
                                <option value="">Elija proveedor</option>
                                <?php foreach ($proveedores as $proveedor): ?>
                                    <option value="<?php echo $proveedor->id;?>" <?php echo $proveedor->id==$monitor->proveedor_id?"selected":"";?>><?php echo $proveedor->nombre;?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="finca">Finca:</label>
                            <select name="finca" id="finca" class="form-control" required="required">
                                <option value="">Elija finca</option>
                                <?php foreach ($fincas as $finca): ?>
                                    <option value="<?php echo $finca->id;?>" <?php echo $finca->id==$monitor->finca_id?"selected":"";?>><?php echo $finca->nombre;?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="area">Area:</label>
                            <select name="area" id="area" class="form-control" required="required">
                                <option value="">Elija area</option>
                                <?php foreach ($areas as $area): ?>
                                    <option value="<?php echo $area->id;?>" <?php echo $area->id==$monitor->area_id?"selected":"";?>><?php echo $area->nombre;?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="contacto">Contacto:</label>
                            <input type="text" name="contacto" id="contacto" class="form-control" required="required" value="<?php echo $monitor->contacto;?>">
                        </div>
                        <div class="form-group">
                            <label for="fabricante">Fabricante:</label>
                            <select name="fabricante" id="fabricante" class="form-control" required="required">
                                <option value="">Elija Fabricante</option>
                                <?php foreach ($fabricantes as $fabricante): ?>
                                    <option value="<?php echo $fabricante->id;?>" <?php echo $fabricante->id==$monitor->fabricante_id?"selected":"";?>><?php echo $fabricante->nombre;?></option>
                                <?php endforeach ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="referencia">Referencia:</label>
                            <input type="text" name="referencia" id="referencia" class="form-control" required="required" value="<?php echo $monitor->referencia;?>">
                        </div>
                        <div class="form-group">
                            <label for="serial_fabricante">Serial Fabricante:</label>
                            <input type="text" name="serial_fabricante" id="serial_fabricante" class="form-control" required="required" value="<?php echo $monitor->serial_fabricante;?>">
                        </div>
                        <div class="form-group">
                            <label for="bitacora">Bitacora:</label>
                            <input type="text" name="bitacora" id="bitacora" class="form-control" required="required" value="<?php echo $monitor->bitacora;?>">
                        </div>
                        <?php if ($monitor->estado == 0): ?>
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