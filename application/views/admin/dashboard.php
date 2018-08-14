<section class="content-header">
    <h1>
        Tablero Principal
    </h1>
</section>

<!-- Main content -->
<section class="content">
    <!-- Default box -->
    <div class="row">
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-aqua">
            <div class="inner">
              <h3><?php echo $totalcomp;?></h3>

              <p>Computadoras</p>
            </div>
            <div class="icon">
              <i class="ion ion-card"></i>
            </div>
            <a href="<?php echo base_url();?>equipos/computadoras" class="small-box-footer">Ver Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-green">
            <div class="inner">
              <h3><?php echo $totalmon;?></h3>

              <p>Monitores</p>
            </div>
            <div class="icon">
              <i class="ion ion-ios-compose"></i>
            </div>
            <a href="<?php echo base_url();?>equipos/monitores" class="small-box-footer">Ver Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-yellow">
            <div class="inner">
              <h3><?php echo $totalimp;?></h3>

              <p>Impresoras</p>
            </div>
            <div class="icon">
              <i class="ion ion-closed-captioning"></i>
            </div>
            <a href="<?php echo base_url();?>equipos/impresoras" class="small-box-footer" >Ver Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xs-6">
          <!-- small box -->
          <div class="small-box bg-red">
            <div class="inner">
              <h3><?php echo $totalusu;?></h3>

              <p>Usuarios</p>
            </div>
            <div class="icon">
              <i class="ion ion-android-car"></i>
            </div>
            <a href="<?php echo base_url();?>administrador/usuarios" class="small-box-footer">Ver Información <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
        <!-- ./col -->
    </div>
   




</section>
<!-- /.content -->