<?php 
	
	require_once '../model/classVenta.php';
	require_once '../model/classCheque.php';

	$objVenta = new Venta();
	$objVenta->selectVenta();

	$numVenta = 0;

	foreach ((array)$objVenta as $key) {
		foreach ($key as $value) {
			$numVenta = $value['MAX(ven_id)']+1;
		}
	}

	$json['success'] = true;
	$objVenta->insertVenta($numVenta, $_POST['fecha'],$_POST['valor'], $_POST['cliId']);
	if($objVenta){
		$json['msg'] = 'Venta creada.';
        
	}

	$objTipo = new Venta();
	$cheque = new Cheque();
	if($_POST['cheque']!=0){
		$objTipo->insertTipo($_POST['fecha'], $numVenta);

		foreach ($_POST['array'] as $key => $value) {
			
			$numero = $value['numero'];
			$banco = $value['banco'];
			$fechaCheque = $value['fechaCheque'];
			$titular = $value['titular'];
			$monto = $value['monto'];

			$cheque->insertCheque($numero, $banco, $fechaCheque, $titular, $monto, $numVenta);
		}

	}	

	session_start();
	$objProducto = new Venta();
	require_once '../model/classCarrito.php';
	$carrito->get_content();
	$carro = $carrito;
	foreach ((array)$carro as $key) {
		foreach ((array)$key as $value) {
			if(is_array($value)){
				$objProducto->insertProducto($value['cantidad'], $numVenta, $value['id'], $value['precio']);
				$objProducto->updateCantidad( $value['id'], $value['cantidad']);
			}
		}
	}

    $carrito->destroy();
    $json['id'] = $numVenta;
    echo json_encode($json);

?>