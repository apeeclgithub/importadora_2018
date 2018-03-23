<div class="mdl-selectfield">
	<label>Color</label>
	<select class="browser-default" name="productColor" id="editColor">
		<option value="" disabled selected>Color</option>
		<?php 
			require_once '../model/classColor.php';
			$objColor = new Color();
			$objColor->listColor();

			foreach ((array)$objColor as $key) {
				foreach ($key as $key2 => $value) {
					echo '<option value="'.$value['col_id'].'">'.$value['col_nombre'].'</option>';
				}
			}
		?>
	</select>
</div>