<?php 

	require_once 'classDatabase.php';
	
	class Marca{

		private $marca;
		
		public function listMarca(){

			$objConn = new Database();
			$sql = $objConn->prepare('SELECT mar_id, mar_nombre FROM marca');
			$sql->execute();
			$this->marca = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->marca;

		}

		public function insertMarca($colMarca){

			$objConn = new Database();

			$sql = $objConn->prepare('INSERT INTO marca (mar_nombre) VALUES (:colMarca)');
			$sql->bindParam(':colMarca', $colMarca);

			if(!(array)$this->selectMarca($colMarca)){
				$this->marca = $sql->execute();
			}

			return $this->marca;

		}

		public function selectMarca($marca){

			$objConn = new Database();
			$sql = $objConn->prepare('SELECT mar_nombre FROM marca WHERE mar_nombre = :marca');
			$sql->bindParam(':marca', $marca);
			$sql->execute();
			$this->marca = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->marca;
			
		}

	}

?>