<section class="content-header">
    <h1>
        Reportes <small> Tablets</small>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">
            <input type="hidden" id="modulo" value="tablets">

            <form action="<?php echo current_url();?>" method="POST">
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group" style="padding-top: 5px;">
                            <label for="">Rango de fechas:</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" name="fecinicio" class="form-control" value="<?php echo isset($fecinicio) ? $fecinicio:date("Y-m-d");?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="date" name="fecfin" class="form-control" value="<?php echo isset($fecfin) ? $fecfin:date("Y-m-d");?>">
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <input type="submit" name="buscar" class="btn btn-success btn-flat" value="Buscar">
                            <a href="<?php echo base_url();?>reportes/tablets" class="btn btn-danger btn-flat">Reestablecer</a>
                        </div>
                    </div>
                </div>
                <hr>
            </form>
            
            <div class="row">
                <div class="col-md-12">
                
                    <div class="table-responsive">
                        <table id="tb-without-buttons" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    
                                    <th>Codigo</th>
                                    <th>Fabricante</th>
                                    <th>Modelo</th>
                                    <th>Usuario</th>
                                    <th>Fec. Registro</th>
                                    
                                    <th>Opciones</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($tablets as $tablet): ?>
                                    <tr>
                                        
                                        <td><?php echo $tablet->codigo?></td>
                                        <td><?php echo $tablet->fabricante?></td>
                                        <td><?php echo $tablet->modelo?></td>
                                        
                                        <td><?php echo $tablet->nombres?></td>
                                        <?php $fecha = new DateTime($tablet->fecregistro); ?>
                                        <td><?php echo $fecha->format("d-m-Y");?></td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-primary btn-flat btn-view" data-toggle="modal" data-target="#modal-default" value="<?php echo $tablet->id;?>" title="Ver">
                                                    <span class="fa fa-eye"></span>
                                                </button>
                                                
                                            </div>
                                        </td>

                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                            
                        </table>
                        
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <form action="<?php echo base_url();?>reportes/tablets/exportar" method="POST">
                                <input type="hidden" id="fechainicio" name="fechainicio" value="<?php echo isset($fecinicio) ? $fecinicio:"";?>">
                                <input type="hidden" id="fechafin" name="fechafin" value="<?php echo isset($fecfin) ? $fecfin:"";?>">
                                <input type="hidden" id="searchfecha" name="searchfecha" value="0">
                                <input type="hidden" id="search" name="search">
                                <input type="hidden" name="tipoarchivo" id="tipoarchivo">
                                <button id="file-excel" type="submit" class="btn btn-success btn-flat">
                                    <span class="fa fa-file-excel-o"></span> Exportar a Excel
                                </button>
                                <button id="file-pdf" type="submit" class="btn btn-danger btn-flat">
                                    <span class="fa fa-file-pdf-o"></span> Exportar a PDF
                                </button>
                            </form>
                        </div>
                        <div class="col-md-8">
                            <div class="paginacionTab text-center">
                           
                            </div>
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
        <h4 class="modal-title">Informacion de la Tablet</h4>
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