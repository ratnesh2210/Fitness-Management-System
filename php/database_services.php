<?php
//after connecting database 
if (!isset($database_include)) {
	include 'database_connection.php';
}
class DatabaseHelper{
	function checkLogin($table_name,$email,$password){
		$sql = "SELECT * FROM `$table_name` WHERE email = '$email'";
		$result = $GLOBALS['connection']->query($sql);
		if ($result->num_rows==1) {
			$row = $result->fetch_assoc();//convert to array
			if($password==$row['password']){
				return TRUE;
			}else{
				return FALSE;
			}
		}else{
			return FALSE;
		}
	}
	/**
	* return single row of the table
	* return type arrey
	*/
	function retrieveData($table_name,$email){
		$sql = "SELECT * FROM `$table_name` WHERE email = '$email'";
		$result = $GLOBALS['connection']->query($sql);
		if ($result->num_rows==1) {
			$row = $result->fetch_assoc();//convert to array
			return $row;
		}else{
			//return error msg
			return 0;
		}
	}

	function updateQuery($sql){
		$result = $GLOBALS['connection']->query($sql);
		return $result;
	}

	function deleteQuery($sql){
		$result = $GLOBALS['connection']->query($sql);
		return $result;
	}

	function insertQuery($sql){
		$result = $GLOBALS['connection']->query($sql);
		return $result;
	}
	function getAllData($table_name){
		$sql = "SELECT * FROM `$table_name`";
		$result = $GLOBALS['connection']->query($sql);
		return $result;
	}
	function runQuery($sql){
		$result = $GLOBALS['connection']->query($sql);
		return $result;
	}
}
?>