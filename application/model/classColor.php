<?php 
	require_once 'classDatabase.php';
	class Color{

		private $color;

		public function listColor(){

			$objConn = new Database();
			$sql = $objConn->prepare('SELECT col_id, col_nombre FROM color');
			$sql->execute();
			$this->color = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->color;

		}

		public function insertColor($colNombre){

			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO color (col_nombre) VALUES (:colNombre)');
			$sql->bindParam(':colNombre', $colNombre);

			if(!(array)$this->selectColor($colNombre)){
				$this->color = $sql->execute();
			}

			return $this->color;

		}

		public function selectColor($color){

			$objConn = new Database();
			$sql = $objConn->prepare('SELECT col_nombre FROM color WHERE col_nombre = :color');
			$sql->bindParam(':color', $color);
			$sql->execute();
			$this->color = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->color;
		}

	}

 ?>