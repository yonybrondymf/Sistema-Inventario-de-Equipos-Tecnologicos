<section class="content-header">
    <h1>
        Usuarios <small> Listado</small>
    </h1>

</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="box box-solid">
    
        <div class="box-body">   
            <div class="row">
                <div class="col-md-12">
                    <div class="table-responsive">
                        <table id="tbusuario" class="table table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Cedula</th>
                                    <th>Nombres</th>
                                    <th>Email</th>
                                    <th>Rol</th>
                                    <th>Estado</th>
                                    <th>Accion</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($usuarios as $usuario): ?>
                                    <tr>
                                        <td><?php echo $usuario->id?></td>
                                        <td><?php echo $usuario->cedula?></td>
                                        <td><?php echo $usuario->nombres?></td>
                                        <td><?php echo $usuario->email?></td>
                                        <td><?php echo $usuario->nombre;?></td>
                                        <td><?php echo $usuario->estado == 0 ? "Inactivo":"activo";?></td>
                                        
                                        <td>
                                            <div class="btn-group">
                                                <a href="<?php echo base_url()?>administrador/usuarios/edit/<?php echo $usuario->id;?>" class="btn btn-warning btn-flat"><i class="fa fa-pencil"></i></a>
                                                <button type="button" class="btn btn-danger bn-flat btn-deshabilitar" value="<?php echo $usuario->id;?>">
                                                    <i class="fa fa-times"></i>
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
        <h4 class="modal-title">FIRMA DEL USUARIO</h4>
      </div>
      <form action="#" method="POST"  id="form-change-firma" enctype="multipart/form-data">
      <div class="modal-body">
        <div class="imagen text-center">
                
        </div>
        
        <div class="form-group">
            <label class="label-imagen">Subir Firma:</label>
            <input type="file" name="file" class="form-control">
            <input type="hidden" name="idUsuario" id="idUsuario">
            <span class="help-block">Seleccione archivos con extension .jpg y .png</span>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger btn-flat pull-left" data-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-success btn-flat">Guardar</button>
      </div>
      </form>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->