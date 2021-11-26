<?php
	require 'config.php';
	
	class db_class extends db_connect{	
		
		public function __construct(){
			$this->connect();
		}
		
		public function create($firstname, $lastname){
			$stmt = $this->conn->prepare("INSERT INTO `member` (`firstname`, `lastname`) VALUES (?, ?)") or die($this->conn->error);
			$stmt->bind_param("ss", $firstname, $lastname);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function read(){
			$stmt = $this->conn->prepare("SELECT * FROM `member` ORDER BY `lastname` ASC") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$stmt->close();
				$this->conn->close();
				return $result;
			}
		}
		
		public function member_id($mem_id){
			$stmt = $this->conn->prepare("SELECT * FROM `member` WHERE `mem_id` = '$mem_id'") or die($this->conn->error);
			if($stmt->execute()){
				$result = $stmt->get_result();
				$fetch = $result->fetch_array();
				$stmt->close();
				$this->conn->close();
				return $fetch;
			}
		}
		
		public function delete($mem_id){
			$stmt = $this->conn->prepare("DELETE FROM `member` WHERE `mem_id` = '$mem_id'") or die($this->conn->error);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
		
		public function update($firstname, $lastname, $mem_id){
			$stmt = $this->conn->prepare("UPDATE `member` SET `firstname` = '$firstname', `lastname` = '$lastname' WHERE `mem_id` = '$mem_id'") or die($this->conn->error);
			if($stmt->execute()){
				$stmt->close();
				$this->conn->close();
				return true;
			}
		}
 	}	
?>