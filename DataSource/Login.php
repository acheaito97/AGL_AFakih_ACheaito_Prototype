<?php	
	include('dbconnect.php');
	function Login($user,$pw)
	{
		$con=connect();		
		if ($user!= "" && $pw != ""){

			$sql_query = "select count(*) as cntUser from Company where ID='".$user."' and password='".$pw."'";
			$result = mysqli_query($con,$sql_query);
			$row = mysqli_fetch_array($result);
			
			$count = $row['cntUser'];

			if($count > 0){
				$id=$_POST['uname'];
				header('Location:interfaces/CompanyHome.php');
			}else{
				$sql_query = "select count(*) as cntUser from Client where ID='".$user."' and password='".$pw."'";
				$result = mysqli_query($con,$sql_query);
				$row = mysqli_fetch_array($result);
			
				$count = $row['cntUser'];

				if($count > 0){
				$id=$_POST['uname'];
				header('Location:interfaces/CandidateHome.php');
				}else{
					alert('Username or password incorrect');
				}
			}
			$con->close();
		}
	}
	function alert($msg) {
		echo "<script type='text/javascript'>alert('$msg');</script>";
	}	
?>