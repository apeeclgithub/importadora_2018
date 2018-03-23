<?php
	require_once '../model/classAnular.php';
	$venta = $_POST['ventaId'];
	$objVenta = new Anular();
	$objVenta->existeVenta($venta);
	$json['success'] = false;
	$isOK = false;
				

	foreach ((array) $objVenta as $key) {
		foreach ($key as $value) {
			if($value['ven_id'] == $venta){
				$isOK = true;
				$json['success'] = true;
			}
		}
    }

    if($isOK == true){
    	$objVenta->buscarProductos($venta);
    	foreach ((array) $objVenta as $key) {
			foreach ($key as $value) {
				$objVenta->agregarProductos($value['producto_pro_id'], $value['det_cantidad']);
			}
		}
    }
	$objVenta->borrarVenta($venta);

echo json_encode($json);

?>