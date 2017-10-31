<?php
class DBController {
	private $host = "localhost";
	private $user = "root";
	private $password = "root";
	private $database = "ats";
	private $conn;
	
	function __construct() {
		$this->conn = $this->connectDB();
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password,$this->database);
		return $conn;
	}

	function selectQuery($query){
		$result =mysqli_query($this->conn, $query) or die ("bad query");
		while($row = mysqli_fetch_array($result)){
			echo '<option value="'. $row[0] . '"> ' .$row[1] . '</option>';
		}
	}
	
	function runQuery($query) {
		$result = mysqli_query($this->conn,$query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($query) {
		$result = mysqli_query($this->conn,$query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	function executeUpdate($query) {
        $result = mysqli_query($this->conn,$query);        
		return $result;		
    }

    

}
?>