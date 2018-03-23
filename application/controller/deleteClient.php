<?php 

	require '../model/classCliente.php';

	$cliId    = $_POST['cliId']; 

	$objCliente = new Cliente();
	$json['success'] = false;
	$json['success'] = $objCliente->deleteClient($cliId);
    echo json_encode($json);

?>