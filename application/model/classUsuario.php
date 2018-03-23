<?php 
	require_once 'classDatabase.php';
	class Usuario{

		private $usuario;

		public function selectUsuario($userName, $userPass){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT usu_id 
										FROM usuario 
										WHERE usu_nombre = :userName
										AND usu_password = :userPass');

			$sql->bindParam(':userName', $userName);
			$sql->bindParam(':userPass', $userPass);

			$this->usuario = $sql->execute();
			$this->usuario = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->usuario;

		}

	}

?>