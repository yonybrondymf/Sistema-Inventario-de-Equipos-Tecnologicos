<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th style="background-color: #f4f4f4;">Capacidad</th>
					<td><?php echo $memoria->capacidad; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Fabricante</th>
					<td><?php echo $memoria->nombre;?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Estado</th>
					<td><?php echo $memoria->estado == 1 ? "Activo":"Inactivo"; ?></td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>