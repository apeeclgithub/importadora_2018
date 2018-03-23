<div class="mdl-selectfield">
	<label>Marca</label>
	<select class="browser-default" name="productBrand" id="productBrand">
		<option value="" disabled selected>Marca</option>
		<?php 
		require_once '../model/classMarca.php';
		$objMarca = new Marca();
		$objMarca->listMarca();

		foreach ((array)$objMarca as $key) {
			foreach ($key as $key2 => $value) {
				echo '<option value="'.$value['mar_id'].'">'.$value['mar_nombre'].'</option>';
			}
		}
		?>
	</select>
</div>