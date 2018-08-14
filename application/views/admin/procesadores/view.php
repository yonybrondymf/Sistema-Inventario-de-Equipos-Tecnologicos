<div class="row">
	<div class="col-xs-12">
		<table class="table table-bordered">
			<tbody>
				<tr>
					<th style="background-color: #f4f4f4;">Referencia</th>
					<td><?php echo $procesador->referencia; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Velocidad</th>
					<td><?php echo $procesador->velocidad; ?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Fabricante</th>
					<td><?php echo $procesador->nombre;?></td>
				</tr>
				<tr>
					<th style="background-color: #f4f4f4;">Estado</th>
					<td><?php echo $procesador->estado == 1 ? "Activo":"Inactivo"; ?></td>
				</tr>
				
			</tbody>
		</table>
	</div>
</div>