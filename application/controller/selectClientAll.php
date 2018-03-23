<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#paginationClients').DataTable( {
			"pagingType": "full_numbers"
		} );
	} );
</script>
<div id="dataClient">
	<div class="fontItem">LISTADO DE CLIENTES</div>
	<table id="paginationClients" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp display" cellspacing="0">
		<thead style="  cursor: pointer;">
			<tr>
				<th class="mdl-data-table__cell--non-numeric">Nombre</th>
				<th class="mdl-data-table__cell--non-numeric">Rut</th>
				<th >Teléfono</th>
				<th >Celular</th>
				<th class="mdl-data-table__cell--non-numeric">Dirección</th>
				<th class="mdl-data-table__cell--non-numeric">Comuna</th>
				<th class="mdl-data-table__cell--non-numeric">Giro</th>
				<th>Cheques</th>
				<th></th>
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
							<td>
								<a onclick="loadModalCheque(<?php echo $value['cli_id']; ?>)" href="#open-modal-cheque" class="btnIcons">
									<i class="material-icons">search</i>
								</a>
							</td>
							<td >
								<div class="btnRight">
									<div class="interior">
										<a onclick="loadModalClient(
											<?php echo $value['cli_id']; ?>,
											'<?php echo $value['cli_nombre']; ?>',
											'<?php echo $value['cli_rut']; ?>', 
											<?php echo $value['cli_fono']; ?>,
											<?php echo $value['cli_celular']; ?>,
											'<?php echo $value['cli_direccion']; ?>',
											'<?php echo $value['cli_comuna']; ?>',
											'<?php echo $value['cli_giro']; ?>')" href="#open-modal-edit-client" class="btnIcons"><i class="material-icons">edit</i></a>
									</div>
									<div class="interior">
										<a onclick="loadModalClient(
											<?php echo $value['cli_id']; ?>,
											'<?php echo $value['cli_nombre']; ?>',
											'<?php echo $value['cli_rut']; ?>', 
											<?php echo $value['cli_fono']; ?>,
											<?php echo $value['cli_celular']; ?>,
											'<?php echo $value['cli_direccion']; ?>',
											'<?php echo $value['cli_comuna']; ?>',
											'<?php echo $value['cli_giro']; ?>')" href="#open-modal-delete-client" class="btnIcons"><i class="material-icons">delete</i></a>
									</div>
								</div>
							</td>
						</tr>
						<?php
					}
				}
			?>				
		</tbody>
	</table>
</div>