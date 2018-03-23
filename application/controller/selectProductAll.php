<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#paginationProducts').DataTable( {
			"pagingType": "full_numbers"
		} );
	} );
</script>
<div id="dataClient">
	<div class="fontItem">LISTADO DE PRODUCTOS</div>
	<table id="paginationProducts" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp display" cellspacing="0">
		<thead style="  cursor: pointer;">
			<tr>
				<th class="mdl-data-table__cell--non-numeric">Código</th>
				<th class="mdl-data-table__cell--non-numeric">Marca</th>
				<th class="mdl-data-table__cell--non-numeric">Color</th>
				<th>Stock</th>
				<th class="mdl-data-table__cell--non-numeric">Descripción</th>
				<th></th>
			</tr>
		</thead>
		<tbody>
			<?php
			require_once '../model/classProducto.php';
			$objProducto = new Producto();
			$objProducto->selectProductAll();

			foreach ((array)$objProducto as $key) {
				foreach ($key as $key2 => $value) {
					?>
					<tr>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['pro_codigo']; ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['mar_nombre']; ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['col_nombre']; ?></td>
						<td><?php echo $value['pro_stock']; ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['pro_descripcion']; ?></td>
						<td>
							<div class="btnRight">
								<div class="interior">
									<a onclick="loadModalProduct(
									<?php echo $value['pro_id']; ?>,
									'<?php echo $value['pro_codigo']; ?>', 
									'<?php echo $value['mar_nombre']; ?>',
									'<?php echo $value['col_nombre']; ?>',
									<?php echo $value['pro_stock']; ?>,
                                    '<?php echo $value['pro_descripcion']; ?>')" class="btnIcons" href="#open-modal-edit"><i class="material-icons">edit</i></a>&nbsp;&nbsp;&nbsp;
								</div>
								<div class="interior">
									<a onclick="loadModalProduct(
									<?php echo $value['pro_id']; ?>,
									'<?php echo $value['pro_codigo']; ?>', 
									'<?php echo $value['mar_nombre']; ?>',
									'<?php echo $value['col_nombre']; ?>',
									<?php echo $value['pro_stock']; ?>,
                                    '<?php echo $value['pro_descripcion']; ?>')" class="btnIcons" href="#open-modal-delete"><i class="material-icons">delete</i></a>
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