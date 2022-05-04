<?php
	class DBController {
		// credenciais de acesso ao servidor
		private $host = "localhost";
		private $user = "root";
		private $password = "";
		private $database = "systems";
		private $conn;
		
		// o construtor chama automaticamente o método connectDB()
		function __construct() {
			$this->conn = $this->connectDB();
		}
		
		function connectDB() {
			$conn = new mysqli($this->host,$this->user,$this->password,$this->database);
			$conn->set_charset("utf8");
			return $conn;
		}
		
		// Aplicar somente o comando SELECT
		function runQuery($query) {
			if($result = $this->conn->query($query)){
				while($row = $result->fetch_assoc()) {
					// copia todos os registos para o array
					$resultset[] = $row;
				}		
				// verifica se existem registos
				if(!empty($resultset))
					return $resultset;
			}
		}
		
		function numRows($query) {
			if($result  = $this->conn->query($query)){
				return $result->num_rows;
			}
		}
	}
?>