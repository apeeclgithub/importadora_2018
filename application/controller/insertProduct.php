<?php 
	
	require '../model/classProducto.php';

	$proCodigo = $_POST['proCodigo'];
	$proMarca = $_POST['proMarca'];
	$proColor = $_POST['proColor'];
	$proStock = $_POST['proStock'];
	$proDesc = $_POST['proDesc'];

	$objProducto = new Producto();
	$json['success'] = false;
	$json['success'] = $objProducto->insertProduct($proCodigo, $proMarca, $proColor, $proStock, $proDesc);
    echo json_encode($json);

?>