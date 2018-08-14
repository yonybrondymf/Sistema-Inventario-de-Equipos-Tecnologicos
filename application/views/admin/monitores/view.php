<div class="row">
	<div class="col-xs-12">
		<h2><strong>Codigo del Monitor : </strong> <?php echo $monitor->codigo; ?> </h2>
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th style="background-color: #f4f4f4;">Tamaño</th>
					<td><?php echo $monitor->tamaño; ?></td>
					<th style="background-color: #f4f4f4;">Proveedor</th>
					<td><?php echo $monitor->proveedor; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Finca</th>
					<td><?php echo $monitor->finca; ?></td>
					<th style="background-color: #f4f4f4;">Area</th>
					<td><?php echo $monitor->area; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Contacto</th>
					<td><?php echo $monitor->contacto; ?></td>
					<th style="background-color: #f4f4f4;">Fabricante</th>
					<td><?php echo $monitor->fabricante; ?></td>
				</tr>
				
				
				<tr>
					<th style="background-color: #f4f4f4;">Serial Fab.</th>
					<td><?php echo $monitor->serial_fabricante; ?></td>
					<th style="background-color: #f4f4f4;">Referencia</th>
					<td><?php echo $monitor->referencia; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Bitacora</th>
					<td><?php echo $monitor->bitacora; ?></td>
					<th style="background-color: #f4f4f4;">Estado</th>
					<td><?php echo $monitor->estado == 1?"Activo":"Inactivo"; ?></td>
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