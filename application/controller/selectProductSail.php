<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#paginationProductsSail').DataTable( {
			"pagingType": "full_numbers"
		} );
	} );
</script>
<div id="dataClient">
	<div class="fontItem">LISTADO DE PRODUCTOS</div>
	<table id="paginationProductsSail" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp display" cellspacing="0">
		<thead style="  cursor: pointer;">
			<tr>
				<th>Stock</th>
				<th class="mdl-data-table__cell--non-numeric">Código</th>
				<th class="mdl-data-table__cell--non-numeric">Marca</th>
				<th class="mdl-data-table__cell--non-numeric">Color</th>
				<th class="mdl-data-table__cell--non-numeric">Descripción</th>
				<th>Cantidad</th>
				<th>P. Unitario</th>
				<th>Total</th>
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
					<tr id="row<?php echo $value['pro_id']; ?>">
						<td><?php echo $value['pro_stock']; ?><input id="stock<?php echo $value['pro_id']; ?>" type="hidden" value="<?php echo $value['pro_stock']; ?>" /></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['pro_codigo']; ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['mar_nombre']; ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['col_nombre']; ?></td>
						<td class="mdl-data-table__cell--non-numeric"><?php echo $value['pro_descripcion']; ?></td>
						<td><input onkeyup="updatePrice(<?php echo $value['pro_id']; ?>)" type="text" id="addUnidad<?php echo $value['pro_id']; ?>" ></td>
						<td><input onkeyup="updatePrice(<?php echo $value['pro_id']; ?>)" type="text" id="addPrecio<?php echo $value['pro_id']; ?>" ></td>
						<td><input type="text" id="addTotal<?php echo $value['pro_id']; ?>" name="" value="" disabled></td>
						<td><button onclick="addProduct(
														<?php echo $value['pro_id']; ?>,
														'<?php echo $value['pro_codigo']; ?>',
														'<?php echo $value['pro_descripcion']; ?>')" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">add_shopping_cart</i></button></td>
					</tr>
					<?php
				}
			}
			?>
		</tbody>
	</table>
</div>