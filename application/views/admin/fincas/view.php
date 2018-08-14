<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th style="background-color: #f4f4f4;">NIT</th>
					<td><?php echo $finca->nit; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Nombre</th>
					<td><?php echo $finca->nombre; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Direccion</th>
					<td><?php echo $finca->direccion; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Telefono</th>
					<td><?php echo $finca->telefono; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Descripcion</th>
					<td><?php echo $finca->descripcion; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Estado</th>
					<td><?php echo $finca->estado == 1 ? "Activo":"Inactivo"; ?></td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>