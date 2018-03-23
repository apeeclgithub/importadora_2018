<?php 
	require_once 'classDatabase.php';

	class Anular{

		private $anular;

		public function existeVenta($id){

			$objConn = new Database();
			$sql = $objConn->prepare('SELECT ven_id FROM venta WHERE ven_id = :id');
			$sql->bindParam(':id', $id);
			$sql->execute();
			$this->anular = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->anular;
		}

		public function buscarProductos($id){

			$objConn = new Database();
			$sql = $objConn->prepare('SELECT producto_pro_id, det_cantidad FROM detalle WHERE venta_ven_id = :id');
			$sql->bindParam(':id', $id);
			$sql->execute();
			$this->anular = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $this->anular;
		
		}

		public function agregarProductos($id, $cant){

			$objConn = new Database();
			$sql = $objConn->prepare('UPDATE producto SET pro_stock = pro_stock+:cant WHERE pro_id = :id');
			$sql->bindParam(':id', $id);
			$sql->bindParam(':cant', $cant);
			$sql->execute();
			return $this->anular;
		
		}

		public function borrarVenta($id){

			$objConn = new Database();
			$sql = $objConn->prepare('DELETE FROM venta WHERE ven_id = :id');
			$sql->bindParam(':id', $id);
			$sql->execute();
			$sql1 = $objConn->prepare('DELETE FROM tipo WHERE venta_ven_id = :id');
			$sql1->bindParam(':id', $id);
			$sql1->execute();
			$sql2 = $objConn->prepare('DELETE FROM cheque WHERE tipo_tip_id = :id');
			$sql2->bindParam(':id', $id);
			$sql2->execute();
			$sql3 = $objConn->prepare('DELETE FROM detalle WHERE venta_ven_id = :id');
			$sql3->bindParam(':id', $id);
			$sql3->execute();
			return $this->anular;
		
		}
		
	}

	/*$objAnular = new Anular();
	$objAnular->agregarProductos(2,5);
	var_dump($objAnular);*/

 ?>