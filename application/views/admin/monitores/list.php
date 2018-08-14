<section class="content-header">
    <h1>
        Monitores <small> Listado</small>
    </h1>

</section>
<?php if ($this->session->flashdata("success")): ?>
    <script>
        swal("Registro Actualizado!","<?php echo $this->session->flashdata("success"); ?>", "success");
    </script>
<?php endif ?>
<?php if ($this->session->flashdata("error")): ?>
    <script>
        swal("Error al Registrar!", "Haz click en el botón para volver intentarlo.", "error");
    </script>
<?php endif ?>
<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <input type="hidden" id="modulo" value="monitores">
            <div class="row">
                <div class="col-md-12">
                    <a href="<?php echo base_url();?>equipos/monitores/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span> Agregar Monitor</a>
                    <hr>
                    <div class="table-responsive">
                        <table id="tb-without-buttons" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Codigo</th>
                                    <th>Tamaño</th>
                                    <th>Finca</th>
                                    <th>Area</th>
                                    <th>Bitacora</th>
                                    <th>Usuario</th>
                                    <th>Fec. Registro</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($monitores as $monitor): ?>
                                    <tr>
                                        <td><?php echo $monitor->id?></td>
                                        <td><?php echo $monitor->codigo?></td>
                                        <td><?php echo $monitor->tamaño?></td>
                                        <td><?php echo $monitor->finca?></td>
                                        <td><?php echo $monitor->area?></td>
                                        <td><?php echo $monitor->bitacora?></td>
                                        <td><?php echo $monitor->nombres?></td>
                                        <td><?php echo $monitor->fecregistro?></td>
                                        <td><?php echo $monitor->estado == 0 ?"Inactivo":"Activo";?></td>
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-flat btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $monitor->id;?>" title="Ver">
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                                <a href="<?php echo base_url();?>equipos/monitores/edit/<?php echo $monitor->id?>" class="btn btn-warning btn-flat" title="Editar"><span class="fa fa-pencil"></span></a>
                                                <?php if ($this->session->userdata("rol") == 1): ?>
                                                    <a href="<?php echo base_url();?>equipos/monitores/delete/<?php echo $monitor->id?>" class="btn btn-danger btn-flat btn-delete" title="Eliminar">
                                                    <span class="fa fa-times"></span>
                                                </a>
                                                <?php endif ?>
                                                
                                                <button type="button" class="btn btn-info btn-flat btn-mante" data-toggle="modal" data-target="#modal-mantenimiento" title="Mantenimientos" value="<?php echo $monitor->id;?>">
                                                    <span class="fa fa-wrench"></span>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.box-body -->
        
    </div>
    <!-- /.box -->
</section>
<!-- /.content -->


<div class="modal fade" id="modal-default">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Informacion del Sistema</h4>
      </div>
      <div class="modal-body">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger pull-left" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary btn-print"><span class="fa fa-print"> </span>Imprimir</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


<div class="modal fade" id="modal-mantenimiento">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">Mantenimiento</h4>
      </div>
      <div class="modal-body">

        <ul class="nav nav-tabs">
            <li class="active"><a data-toggle="tab" href="#listado">Listado</a></li>
            <li><a data-toggle="tab" href="#agregar">Agregar</a></li>
            
        </ul>

        <div class="tab-content">
            <div id="listado" class="tab-pane fade in active">
                <h2>Ultimos Mantenimientos</h2>
                <table class="table table-bordered" id="tbmantenimientos">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Fecha</th>
                            <th>Tecnico</th>
                            <th>Descripcion</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
            <div id="agregar" class="tab-pane fade">
                <h2>Nuevo Mantenimiento</h2>
                <form action="<?php echo base_url();?>equipos/monitores/addmantenimiento" method="POST">
                    <input type="hidden" name="idequipo" id="idequipo">
                    <div class="form-group">
                        <label for="">Fecha</label>
                        <input type="date" class="form-control" name="fecha" value="<?php echo date("Y-m-d")?>" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Tecnico</label>
                        <input type="text" class="form-control" name="tecnico" required="required">
                    </div>
                    <div class="form-group">
                        <label for="">Descripcion</label>
                        <textarea name="descripcion" id="descripcion"  rows="3" class="form-control" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                </form>
            </div>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->