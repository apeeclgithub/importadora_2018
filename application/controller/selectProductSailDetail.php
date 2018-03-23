<script type="text/javascript" language="javascript" class="init">
	$(document).ready(function() {
		$('#paginationProductsSailDetail').DataTable( {
			"pagingType": "full_numbers"
		} );
	} );
</script>
<div id="dataClient">
	<div class="fontItem">PRODUCTOS AGREGADOS A LA VENTA</div>
	<table id="paginationProductsSailDetail" class="mdl-data-table mdl-js-data-table mdl-shadow--2dp display" cellspacing="0">
		<thead style="  cursor: pointer;">
			<tr>
				<th class="mdl-data-table__cell--non-numeric">Código</th>
				<th class="mdl-data-table__cell--non-numeric">Descripción</th>
				<th>Cantidad</th>
				<th>P. Unitario</th>
				<th>Total</th>
				<th></th>
			</tr>
		</thead>
		<tbody id="asd">
			<?php
			if(!@session_start()){session_start();}
			require_once '../model/classCarrito.php';
			$carrito->get_content();
			$carro = $carrito;
			foreach ((array)$carro as $key) {
				foreach ((array)$key as $value) {
					if(is_array($value)){
						?>
						<tr>
							<td class="mdl-data-table__cell--non-numeric"><?php echo $value['codigo']; ?></td>
							<td class="mdl-data-table__cell--non-numeric"><?php echo $value['descripcion']; ?></td>
							<input type="hidden" id="viejo<?php echo $value['id']; ?>" value="<?php echo $value['cantidad']; ?>" />
							<td><input onchange="updatePriceSail(<?php echo $value['id']; ?>,'<?php echo $value['codigo']; ?>','<?php echo $value['descripcion']; ?>')" type="text" id="sailUnidad<?php echo $value['id']; ?>" value="<?php echo $value['cantidad']; ?>"></td>
							<td><input onchange="updatePriceSail(<?php echo $value['id']; ?>,'<?php echo $value['codigo']; ?>','<?php echo $value['descripcion']; ?>')" type="text" id="sailPrecio<?php echo $value['id']; ?>" value="<?php echo $value['precio']; ?>" disabled></td>
							<td><input type="text" id="sailTotal<?php echo $value['id']; ?>" value="<?php echo $value['precio']*$value['cantidad']; ?>" disabled></td>
							<td><button onclick="delProduct('<?php echo $value['unique_id']; ?>')" class="mdl-button mdl-js-button mdl-button--icon"><i class="material-icons">highlight_off</i></button></td>
						</tr>
						<?php
					}
				}
			}
			?>
		</tbody>
	</table>
</div>
 