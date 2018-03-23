<?php 
	session_start();
	require '../model/classUsuario.php'; 

	$userName = $_POST['userName'];
	$userPass = $_POST['userPass'];

	$objUsuario = new Usuario();
	$json['success'] = false;
	$objUsuario->selectUsuario($userName, $userPass);

	foreach ((array)$objUsuario as $key ) {
		foreach ($key as $key2 => $value) {
			if(is_numeric($value['usu_id'])){
				$_SESSION['usuario'] = $value['usu_id'];
				$json['success'] = true;
			}		
		}
	}	
	
    echo json_encode($json);

?>