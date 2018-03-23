<?php 

	require_once 'classDatabase.php';

	class Cliente{

		private $cliente;

		public function selectClientAll(){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT cli_id, cli_nombre, cli_rut, cli_fono, cli_celular, cli_giro, cli_direccion, cli_comuna
										FROM cliente');
			$sql->execute();
			$this->cliente = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->cliente;

		}

		public function insertClient($clientName, $clientRut, $clientPhone, $clientCel, $clientGir, $clientAddress, $clientCom){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO cliente (cli_nombre, cli_rut, cli_fono, cli_celular, cli_giro, cli_direccion, cli_comuna) 
										VALUES (:clientName, :clientRut, :clientPhone, :clientCel, :clientGir, :clientAddress, :clientCom)');
		
			$sql->bindParam(':clientName', $clientName);
			$sql->bindParam(':clientRut', $clientRut);
			$sql->bindParam(':clientPhone', $clientPhone);
			$sql->bindParam(':clientCel', $clientCel);
			$sql->bindParam(':clientGir', $clientGir);
			$sql->bindParam(':clientAddress', $clientAddress);
			$sql->bindParam(':clientCom', $clientCom);
            
            if(!(array)$this->selectClient($clientName, $clientRut, $clientPhone, $clientCel, $clientGir, $clientAddress, $clientCom)){
				$this->cliente = $sql->execute();
			}

			return $this->cliente;

		}
        
        public function selectClient($clientName, $clientRut, $clientPhone, $clientCel, $clientGir, $clientAddress, $clientCom){

			$objConn = new Database();
			$sql = $objConn->prepare('  SELECT cli_nombre FROM cliente 
                                        WHERE cli_nombre = :clientName
                                        AND cli_rut = :clientRut
                                        AND cli_fono = :clientPhone
                                        AND cli_celular = :clientCel
                                        AND cli_giro = :clientGir
                                        AND cli_direccion = :clientAddress
                                        AND cli_comuna = :clientCom');
			
            $sql->bindParam(':clientName', $clientName);
			$sql->bindParam(':clientRut', $clientRut);
			$sql->bindParam(':clientPhone', $clientPhone);
			$sql->bindParam(':clientCel', $clientCel);
			$sql->bindParam(':clientGir', $clientGir);
			$sql->bindParam(':clientAddress', $clientAddress);
			$sql->bindParam(':clientCom', $clientCom);
            
			$sql->execute();
			$this->cliente = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->cliente;
            
		}

		public function updateClient($cliId, $clientName, $clientRut, $clientPhone, $clientCel, $clientGir, $clientAddress, $clientCom){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE cliente 
										SET cli_rut = :clientRut, cli_nombre = :clientName, cli_fono = :clientPhone, cli_celular = :clientCel, cli_direccion = :clientAddress, cli_comuna = :clientCom, cli_giro = :clientGir 
										WHERE cli_id = :cliId');

			$sql->bindParam(':cliId', $cliId);
			$sql->bindParam(':clientName', $clientName);
			$sql->bindParam(':clientRut', $clientRut);
			$sql->bindParam(':clientPhone', $clientPhone);
			$sql->bindParam(':clientCel', $clientCel);
			$sql->bindParam(':clientGir', $clientGir);
			$sql->bindParam(':clientAddress', $clientAddress);
			$sql->bindParam(':clientCom', $clientCom);

			$this->cliente = $sql->execute();

			return $this->cliente;

		}

		public function deleteClient($cliId){

			$objConn = new Database();
			$sql = $objConn->prepare('	DELETE FROM cliente WHERE cli_id = :cliId');

			$sql->bindParam(':cliId', $cliId);

			$this->cliente = $sql->execute();

			return $this->cliente;
		}

	}

?>