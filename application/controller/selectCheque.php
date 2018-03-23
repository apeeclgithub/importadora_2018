<?php 
	require_once '../model/classCheque.php';
	$objCheque = new Cheque();
	$objCheque->listCheque($_GET['client']);

	foreach ((array)$objCheque as $key) {
		foreach ($key as $value) {?>
			
			<p>
				N°: <?php echo $value['che_numero']?> &nbsp;&nbsp;&nbsp;
				<?php echo $value['che_banco']?> &nbsp;&nbsp;&nbsp;
				Fecha: <?php echo $value['che_fecha']?> &nbsp;&nbsp;&nbsp;
				Monto: <?php echo $value['che_monto']?>
			</p>
			
		<?php 
		}
	}

?>
		