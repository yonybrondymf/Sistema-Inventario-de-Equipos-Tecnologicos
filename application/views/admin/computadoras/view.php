<div class="row">
	<div class="col-xs-12">
		<h2><strong>Codigo de la Computadora : </strong> <?php echo $computadora->codigo; ?> </h2>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th style="background-color: #f4f4f4;">Presentacion</th>
					<td><?php echo $computadora->presentacion; ?></td>
					<th style="background-color: #f4f4f4;">Proveedor</th>
					<td><?php echo $computadora->proveedor; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Finca</th>
					<td><?php echo $computadora->finca; ?></td>
					<th style="background-color: #f4f4f4;">Area</th>
					<td><?php echo $computadora->area; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Contacto</th>
					<td><?php echo $computadora->contacto; ?></td>
					<th style="background-color: #f4f4f4;">Fabricante</th>
					<td><?php echo $computadora->fabricante; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Procesador</th>
					<td><?php echo $computadora->referencia." ".$computadora->velocidad; ?></td>
					<th style="background-color: #f4f4f4;">Memoria RAM</th>
					<td><?php echo $computadora->memoria; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Disco Duro</th>
					<td><?php echo $computadora->disco; ?></td>
					<th style="background-color: #f4f4f4;">Sistema Operativo</th>
					<td><?php echo $computadora->sistema; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Serial S.O</th>
					<td><?php echo $computadora->serial_so; ?></td>
					<th style="background-color: #f4f4f4;">Office</th>
					<td><?php echo $computadora->office; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Serial Office</th>
					<td><?php echo $computadora->serial_office; ?></td>
					<th style="background-color: #f4f4f4;">Antivirus</th>
					<td><?php echo $computadora->antivirus; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">IP</th>
					<td><?php echo $computadora->ip; ?></td>
					<th style="background-color: #f4f4f4;">MAC</th>
					<td><?php echo $computadora->mac; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Bitacora</th>
					<td><?php echo $computadora->bitacora; ?></td>
					<th style="background-color: #f4f4f4;">Estado</th>
					<td><?php echo $computadora->estado == 1?"Activo":"Inactivo"; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Monitor</th>
					<td><?php echo $computadora->monitor; ?></td>
					<th style="background-color: #f4f4f4;"></th>
					<td></td>
				</tr>
				<tr>
					<th style="background-color: #3c8dbc; color: #FFF;" class="text-center" colspan="4">Ultimos Mantenimientos</th>
				</tr>
				<tr>
					<th>Fecha</th>
					<th>Tecnico</th>
					<th colspan="2">Descripcion</th>
				</tr>
				<?php if (!empty($mantenimientos)): ?>
					<?php foreach ($mantenimientos as $mantenimiento): ?>
						<tr>
							<td><?php echo $mantenimiento->fecha;?></td>
							<td><?php echo $mantenimiento->tecnico;?></td>
							<td colspan="2"><?php echo $mantenimiento->descripcion;?></td>
						</tr>
					<?php endforeach ?>
					
				<?php else: ?>
					<tr>
						<td colspan="4">No se ha realizo ningun mantenimiento</td>
					</tr>
				<?php endif ?>
			</tbody>
		</table>
	</div>
</div>