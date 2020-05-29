<?php
	include('dbconnect.php');
	
	function CreateCV($idclient,$GraduationUniversity,$GraduationUniversityDate,$GraduationUniversityCourse,$HighSchoolName,$SecondaryDate,$SecondaryName,$LanguageList,$WorkTypeList,$WorkYearsList,$WorkNameList,$SkillsList,$ProjectList){
			$con=connect();	
			
			if($GraduationUniversity!=""){
				$sql = "insert into cv_education values(".$idclient.",'".$GraduationUniversityCourse."','".$GraduationUniversityDate."','".$GraduationUniversity."')";
				mysqli_query($con, $sql);			
			}
			if($HighSchoolName!=""){
				$sql = "insert into cv_education values(".$idclient.",'HighSchool','".$HighSchoolDate."','".$HighSchoolName."')";
				mysqli_query($con, $sql);					
			}
			if($SecondaryName!=""){
				$sql = "insert into cv_education values(".$idclient.",'Secondary','".$SecondaryDate."','".$SecondaryName."')";
				mysqli_query($con, $sql);					
			}			
			
			 for($i=0; $i<count($LanguageList); $i++)  
			{  
				if($LanguageList[$i]!=""){
					$sql = "insert into cv_languages values(".$idclient.",'".$LanguageList[$i]."')";
					mysqli_query($con, $sql);
				}
			}
			for($i=0; $i<count($WorkTypeList); $i++)  
			{  
				if($WorkTypeList[$i]!="" || $WorkNameList[$i]!=""){
					$sql = "insert into cv_experience values(".$idclient.",'".$WorkTypeList[$i]."','".$WorkYearsList[$i]."','".$WorkNameList[$i]."')";
					mysqli_query($con, $sql);
				}					
			}
			for($i=0; $i<count($SkillsList); $i++)  
			{  
				if($SkillsList[$i]!=""){
					$sql = "insert into cv_skills values(".$idclient.",'".$SkillsList[$i]."')";
					mysqli_query($con, $sql);	
				}					
			}	
			for($i=0; $i<count($ProjectList); $i++)  
			{  
				if($ProjectList[$i]!=""){
					$sql = "insert into cv_projects values(".$idclient.",'".$ProjectList[$i]."')";
					mysqli_query($con, $sql);	
				}
			}	
				
			echo 'CV Created !!';
			
		$con->close();	
	}
	function JobSearch($term,$ID){
		$con=connect();
			echo '<table class="table table-bordered">';
			echo '			<thead>
				<tr style="text-align:center;">
				<th>Title</th>
				<th width="100px"><center>Date</center></th>
				<th width="500px">Description</th>
				<th width="120px">Required years</th>
				<th>Company</th>
				<th width="50px"></th>
				</tr>
				</thead>';    

			$sql = "SELECT j.*,c.name as namec FROM job j,Company c where (j.title LIKE '%".$term."%' OR j.description LIKE '%".$term."%') and j.status=1 and c.id=j.companyid and j.id not in(Select idjob from request_job where idclient=".$ID.")"; 
			$r_query = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($r_query)){  
				echo '<tr>';
				echo '<td>' .$row['title'].'</td>';  
				echo '<td><center>' .$row['date'].'</center></td>';  
				echo '<td>' .$row['description'].'</td>'; 
				echo '<td><center>'.strval($row['yearsReq']).'</center></td>'; 
				echo '<td>' .$row['namec'].'</td>'; 
				echo '<td><a href="Quiz.php?id='.$row['id'].'"  class="btn btn-info"/>Enroll</a></td>';
 												
				echo '</tr>';
			}  
			echo '</table>';
	}	

	function DOQuiz($idJob){
		$con=connect();	
		$counter=1;
		$sql = "SELECT * FROM quiz_questions where idjob=".$idJob.""; 
		$r_query = mysqli_query($con,$sql);
		while ($row = mysqli_fetch_array($r_query)){
			echo '<tr>';
			echo '<td>';
			echo '<label style="float: left;">Question '.$counter.'</label>';
			echo '<input type="text" class="form-control name_list" value="'.$row['question'].'" disabled>';
			echo '<label style="float: left;padding-top:10px;">Solution</label>';
			echo '<select name="Solutions[]" class="form-control name_list" id="RightSolution">';
			$IDReponse=array();
			$sql = "SELECT * FROM quiz_reponse where idQuestion=".$row['id']; 
			$r_query1 = mysqli_query($con,$sql);
			
			while ($row1 = mysqli_fetch_array($r_query1)){ 			
				echo '<option value="'.$row1['ID'].'">'.$row1['reponse'].'</option>';			
			}
			echo '</select>';
			echo '</td>';
			echo '</tr>';
			$counter++;
		}
	}
	
	function SubmitQuiz($Solutions,$idjob,$idclient){
		$con=connect();	
		$Somme=0;
		$TotalPoints=0;
		for($i=0; $i<count($Solutions); $i++){
			$sql = "SELECT status,IDQuestion FROM quiz_reponse where id=".$Solutions[$i].""; 
			$r_query = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($r_query);
			
			$idQuestion=$row['IDQuestion'];
			
			$sql = "SELECT rate FROM quiz_questions where id=".$idQuestion.""; 
			$r_query = mysqli_query($con,$sql);
			$row1 = mysqli_fetch_array($r_query);
			
			$Somme=$Somme+$row1['rate'];
			if($row['status']==1){
				$TotalPoints=$TotalPoints+$row1['rate'];
			}
			
		}
		$sql = "insert into request_job values(".$idclient.",".$idjob.",CURDATE(),null,".$TotalPoints.")";
		mysqli_query($con, $sql);
		$con->close();
		echo 'Your Rate is '.$TotalPoints.' / '.$Somme;
	}
	function JobsCV($IDClient){
		$con=connect();
			echo '<table class="table table-bordered">';
			echo '			<thead>
				<tr style="text-align:center;">
				<th>Title</th>
				<th width="100px"><center>Date</center></th>
				<th width="500px">Description</th>
				<th width="120px">Required years</th>
				<th>Company</th>
				<th width="50px"></th>
				</tr>
				</thead>';    
			$sql = "SELECT SUM(year) as exp FROM cv_experience where idclient=".$IDClient.""; 
			$r_query = mysqli_query($con,$sql);
			$row = mysqli_fetch_array($r_query);
			$ExperienceYears=$row['exp'];
			$sql = "SELECT DISTINCT J.*,c.name as namec FROM job J,cv_skills S,company c where S.idclient=".$IDClient." AND (J.title LIKE CONCAT('%', S.description,'%') OR J.description LIKE CONCAT('%', S.description,'%')) and J.yearsReq<=".$ExperienceYears." and J.status=1 and c.id=J.companyid and J.id not in(Select idjob from request_job where idclient=".$IDClient.")"; 
			$r_query = mysqli_query($con,$sql);
			while ($row = mysqli_fetch_array($r_query)){  
				echo '<tr>';
				echo '<td>' .$row['title'].'</td>';  
				echo '<td><center>' .$row['date'].'</center></td>';  
				echo '<td>' .$row['description'].'</td>'; 
				echo '<td><center>'.strval($row['yearsReq']).'</center></td>'; 
				echo '<td>' .$row['namec'].'</td>';
				echo '<td><a href="Quiz.php?id='.$row['id'].'"  class="btn btn-info"/>Enroll</a></td>';
 												
				echo '</tr>';
			}  
			echo '</table>';
	}	
?>