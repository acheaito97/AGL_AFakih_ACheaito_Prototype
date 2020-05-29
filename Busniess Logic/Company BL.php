    <?php  
		include('../Datasource/company.php');
		
		function JobCreator($IDCompany,$Desc,$Title,$year){
			AddJob($IDCompany,$Desc,$Title,$year);
		}
		function CandidateList($ID){
			ListCandidate($ID);
		}
		if(array_key_exists("funct", $_GET)){
			if($_GET['funct']=="CreateQuiz"){	
				$IDJob=$_GET['IDJob'];
				$Questions=$_POST['Questions'];
				$Solutions1=$_POST['Solution1'];	
				$Solutions2=$_POST['Solution2'];
				$Solutions3=$_POST['Solution3'];	
				$RightSolutions=$_POST['RightSolution'];
				$Rates=$_POST['Rates'];
				
				CreateQuizforJob($IDJob,$Questions,$Solutions1,$Solutions2,$Solutions3,$RightSolutions,$Rates);
				
			}
		}		
 ?> 