<?php
	include('dbconnect.php');
	
	function AddJob($IDCompany,$Desc,$Title,$year){
			$con=connect();	
			$sql_query = "select status from company where id=".$IDCompany;
			$result = mysqli_query($con,$sql_query);
			$row = mysqli_fetch_array($result);	
			$IDJOB;
			if($row['status']==1){
				$sql_query = "select id from job order by id desc limit 1";
				$result = mysqli_query($con,$sql_query);
				$row = mysqli_fetch_array($result);
				$IDJOB=$row['id']+1;
				$sql = "insert into job values(".($row['id']+1).",CURDATE(),".$IDCompany.",'".$Desc."','".$Title."',1,".$year.")";
				mysqli_query($con, $sql);	
			}
			$con->close();
			header('Location:AddQuiz.php?id='.$IDJOB.'');
	}
	
	function CreateQuizforJob($idJob,$Questions,$Solutions1,$Solutions2,$Solutions3,$RightSolutions,$Rates){
		$con=connect();
		$y=0;
		for($i=0; $i<count($Questions); $i++)  
		{  
			$sql_query = "select id from quiz_questions order by id desc limit 1";
			$result = mysqli_query($con,$sql_query);
			$row = mysqli_fetch_array($result);	
			$NEWID=$row['id']+1;
			$sql = "insert into quiz_questions values(".$NEWID.",".$idJob.",'".$Questions[$i]."',".$Rates[$i].")";
			mysqli_query($con, $sql);
			
			
			$sql_query = "select id from quiz_reponse order by id desc limit 1";
			$result = mysqli_query($con,$sql_query);
			$row = mysqli_fetch_array($result);	
			$NEWID_reponse=$row['id']+1;
			
			$sql = "insert into quiz_reponse values(".$NEWID_reponse.",'".$Solutions1[$i]."',".($RightSolutions[$i]==1?1:0).",".$NEWID.")";
			mysqli_query($con, $sql);
			$sql = "insert into quiz_reponse values(".($NEWID_reponse+1).",'".$Solutions2[$i]."',".($RightSolutions[$i]==2?1:0).",".$NEWID.")";
			mysqli_query($con, $sql);			
			$sql = "insert into quiz_reponse values(".($NEWID_reponse+2).",'".$Solutions1[$i]."',".($RightSolutions[$i]==3?1:0).",".$NEWID.")";
			mysqli_query($con, $sql);			
		}
		echo 'Job Created !!';
		$con->close();
	}
	function ListCandidate($ID){
			$con=connect();
			echo '<table class="table table-bordered">';
			echo '			<thead>
				<tr style="text-align:center;">
					<th>ID</th>
					<th>Name</th>
					<th>Address</th>
					<th>Phone</th>
					<th>Job</th>
					<th>Quiz Rate</th>
				</tr>
				</thead>';    

			$sql = "SELECT c.*,r.quizrate rateQuiz,b.title as titlejob FROM client c,job b,request_job r where b.companyid=".$ID." and b.id=idjob and c.id=r.idclient"; 
			$r_query = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($r_query)){  
				echo '<tr>';
				echo '<td>' .$row['id'].'</td>';  
				echo '<td>' .$row['name'].'</td>';  
				echo '<td>' .$row['address'].'</td>'; 
				echo '<td>'.$row['phone'].'</td>'; 
 				echo '<td>'.$row['titlejob'].'</td>'; 	
				echo '<td>'.$row['rateQuiz'].'</td>'; 						
				echo '</tr>';
			}  
			echo '</table>';
	}
?>