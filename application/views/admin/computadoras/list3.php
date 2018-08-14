<section class="content-header">
    <h1>
        Computadoras <small> Listado</small>
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
            <input type="hidden" id="modulo" value="computadoras">

            <div class="row">
                <div class="col-md-3">
                    <a href="<?php echo base_url();?>equipos/computadoras/add" class="btn btn-primary btn-flat"><span class="fa fa-plus"></span>Agregar Computadora</a>
                </div>
                <div class="col-md-9 text-right">
                    <form action="<?php echo base_url();?>equipos/computadoras/excel" method="POST">
                        <button type="submit" class="btn btn-success btn-flat">
                            <span class="fa fa-file-excel-o"></span> Exportar a Excel
                        </button>
                    </form>
                </div>
                
            </div>
            <hr>
            <div class="row">
                <form action="<?php echo current_url();?>" method="POST">
                    <div class="form-group">
                        <div class="col-md-2">
                            <input type="text" class="form-control" name="search" placeholder="Buscar registro">
                        </div>
                        <!-- <div class="col-md-2">
                            <div class="radio">
                                <label><input type="radio" name="optradio">Incluir fecha de rango</label>
                            </div>
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="fecinicio" id="fecinicio" class="form-control" disabled="disabled">
                        </div>
                        <div class="col-md-2">
                            <input type="date" name="fecfin" id="fecfin" class="form-control" disabled="disabled">
                        </div> -->
                        <div class="col-md-4">
                            <button type="submit" class="btn btn-success btn-flat">Buscar</button>
                            <a href="<?php echo base_url();?>equipos/computadoras" class="btn btn-danger btn-flat">Reestablecer</a>
                        </div>
                    </div>
                </form>
            </div>
            
            <div class="row">
                <div class="col-md-12">
                    <hr>
                    <div class="table-responsive">
                        <table  class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Codigo</th>
                                    <th>Finca</th>
                                    <th>Area</th>
                                    <th>Procesador</th>
                                    <th>Disco Duro</th>
                                    <th>Monitor</th>
                                    <th>Memoria RAM</th>
                                    <th>Serial S.O</th>
                                    <th>Usuario</th>
                                    <th>Estado</th>
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($computadoras as $computadora): ?>
                                    <tr>
                                        
                                        <td><?php echo $computadora->codigo?></td>
                                        <td><?php echo $computadora->finca?></td>
                                        <td><?php echo $computadora->area?></td>
                                        <td><?php echo $computadora->velocidad?></td>
                                        <td><?php echo $computadora->disco?></td>
                                        <td><?php echo $computadora->monitor?></td>
                                        <td><?php echo $computadora->memoria?></td>
                                        <td><?php echo $computadora->serial_so?></td>
                                        <td><?php echo $computadora->nombres?></td>
                                        <td><?php echo $computadora->estado == 0 ?"Inactivo":"Activo";?></td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-flat btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $computadora->id;?>" title="Ver">
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                                <a href="<?php echo base_url();?>equipos/computadoras/edit/<?php echo $computadora->id?>" class="btn btn-warning btn-flat" title="Editar"><span class="fa fa-pencil"></span></a>
                                                <?php if ($this->session->userdata("rol") == 1): ?>
                                                    <a href="<?php echo base_url();?>equipos/computadoras/delete/<?php echo $computadora->id?>" class="btn btn-danger btn-flat btn-delete" title="Eliminar">
                                                        <span class="fa fa-times"></span>
                                                    </a>
                                                <?php endif;?>
                                                
                                                <button type="button" class="btn btn-info btn-flat btn-mante" data-toggle="modal" data-target="#modal-mantenimiento" title="Mantenimientos" value="<?php echo $computadora->id;?>">
                                                    <span class="fa fa-wrench"></span>
                                                </button>
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                        <div class="text-center">
                            <?php echo $this->pagination->create_links(); ?>
                        </div>
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
        <h4 class="modal-title">Informacion de la Computadora</h4>
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
                <form action="<?php echo base_url();?>equipos/computadoras/addmantenimiento" method="POST">
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
                        <textarea name="descripcion" id="descripcion"  rows="3" class="form-control"></textarea>
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