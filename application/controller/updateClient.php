<?php 

	require '../model/classCliente.php';

	$cliId   		= $_POST['cliId'];
	$clientName 	= $_POST['clientName'];
	$clientRut		= $_POST['clientRut'];
	$clientPhone 	= $_POST['clientPhone'];
	$clientCel		= $_POST['clientCel'];
	$clientGir		= $_POST['clientGir'];
  	$clientAddress 	= $_POST['clientAddress'];
  	$clientCom		= $_POST['clientCom'];


	$objClient = new Cliente();
	$json['success'] = false;
	$json['success'] = $objClient->updateClient($cliId, $clientName, $clientRut, $clientPhone, $clientCel,  $clientGir, $clientAddress, $clientCom);
    echo json_encode($json);

?>