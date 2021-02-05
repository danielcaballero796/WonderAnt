<?php 
	
class Database{
		private $dbservername = "localhost";
		private $dbusername = "dbuser";
		private $dbpassword = "password";
		private $dbname = "dbname";
		
	function getConnection(){
		$conn = new mysqli($this->dbservername, $this->dbusername, $this->dbpassword, $this->dbname);

		if($conn->connect_error){
			echo "mala conexion<br>";
		}else{
			return $conn;
		}
	}
}

?>
