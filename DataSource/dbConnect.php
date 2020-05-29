<?php 

	function connect()
	{
		$host="localhost:3308";
		$user="root";
		$pass="";
		$dbname="jobsystem";
		$con = mysqli_connect($host, $user, $pass, $dbname);
		return $con;
	}
 
?>  
