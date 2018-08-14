<div class="row">
	<div class="col-xs-12">
		<h2><strong>Codigo del Lector de Codigo : </strong> <?php echo $lector->codigo; ?> </h2>
		<table class="table table-bordered">
			<tbody>
				
				
				<tr>
					<th style="background-color: #f4f4f4;">Fabricante</th>
					<td><?php echo $lector->fabricante; ?></td>
				</tr>
				<tr>
					
					<th style="background-color: #f4f4f4;">Modelo</th>
					<td><?php echo $lector->modelo; ?></td>
				</tr>
				
				<tr>
					<th style="background-color: #f4f4f4;">Descripcion</th>
					<td><?php echo $lector->descripcion; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Estado</th>
					<td><?php echo $lector->estado == 1 ? "Activo":"Inactivo"; ?></td>
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