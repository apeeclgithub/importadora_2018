<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#paginationClientsSailAdd').DataTable( {
			"scrollY":        "300px",
	        "scrollCollapse": true,
	        "paging":         false
		} );
	} );
</script>
<div id="dataClient">
	<div class="fontItem">LISTADO DE CLIENTES</div>
	<table id="paginationClientsSailAdd" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp display" cellspacing="0">
		<thead style="  cursor: pointer;">
			<tr>
				<th class="mdl-data-table__cell--non-numeric">Nombre</th>
				<th class="mdl-data-table__cell--non-numeric">Rut</th>
				<th >Teléfono</th>
				<th >Celular</th>
				<th class="mdl-data-table__cell--non-numeric">Dirección</th>
				<th class="mdl-data-table__cell--non-numeric">Comuna</th>
				<th class="mdl-data-table__cell--non-numeric">Giro</th>
				<th>Añadir a la venta</th>
			</tr>
		</thead>
		<tbody>
			<?php
				require_once '../model/classCliente.php';
				$objClient = new Cliente();
				$objClient->selectClientAll();

				foreach ((array) $objClient as $key) {
					foreach ($key as $key2 => $value) {
						?>
						<tr>
							<td class="mdl-data-table__cell--non-numeric"><?php echo $value['cli_nombre']; ?></td>
							<td class="mdl-data-table__cell--non-numeric"><?php echo $value['cli_rut']; ?></td>
							<td><?php echo $value['cli_fono']; ?></td>
							<td><?php echo $value['cli_celular']; ?></td>
							<td class="mdl-data-table__cell--non-numeric"><?php echo $value['cli_direccion']; ?></td>
							<td class="mdl-data-table__cell--non-numeric"><?php echo $value['cli_comuna']; ?></td>
							<td class="mdl-data-table__cell--non-numeric"><?php echo $value['cli_giro']; ?></td>
							<td><button onclick="addClient(<?php echo $value['cli_id']; ?>, '<?php echo $value['cli_nombre']; ?>', '<?php echo $value['cli_rut']; ?>')" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">add_circle_outline</i></button></td>
						</tr>
						<?php
					}
				}
			?>				
		</tbody>
	</table>
</div>