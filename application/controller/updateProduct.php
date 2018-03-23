<?php 

	require '../model/classProducto.php';

	$proId    = $_POST['proId'];
	$proCodigo = $_POST['proCodigo'];
	$proMarca = $_POST['proMarca'];
	$proColor = $_POST['proColor'];
	$proStock = $_POST['proStock'];
    $proDescripcion = $_POST['proDescripcion'];

	$objProducto = new Producto();
	$json['success'] = false;
	$json['success'] = $objProducto->updateProduct($proId, $proCodigo, $proMarca, $proColor, $proStock, $proDescripcion);
    echo json_encode($json);

?>