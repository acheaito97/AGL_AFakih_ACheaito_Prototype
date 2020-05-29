    <?php  
	include('../Datasource/candidate.php');
	if(array_key_exists("funct", $_GET)){
		if($_GET['funct']=="CreateCV"){	
				$GraduationUniversity=$_POST['boardGradu'];
				$GraduationUniversityCourse=$_POST['courseGradu'];
				$GraduationUniversityDate=$_POST['pYearGradu'];
				$HighSchoolName=$_POST['schoolNameHs'];
				$HighSchoolDate=$_POST['pYearHs'];
				$SecondaryName=$_POST['schoolNameSc'];
				$SecondaryDate=$_POST['pYearSc'];
				$LanguageList=$_POST['language'];
				$WorkTypeList=$_POST['workType'];
				$WorkYearsList=$_POST['years'];
				$WorkNameList=$_POST['Cname'];
				$SkillsList=$_POST['skills'];
				$ProjectList=$_POST['projects'];	
				$idclient=$_SESSION["ID"];
				CreateCV($idclient,$GraduationUniversity,$GraduationUniversityDate,$GraduationUniversityCourse,$HighSchoolName,$SecondaryDate,$SecondaryName,$LanguageList,$WorkTypeList,$WorkYearsList,$WorkNameList,$SkillsList,$ProjectList);
		}
		if($_GET['funct']=="SubmitQuiz"){	
			session_start();
			$Solutions=$_POST['Solutions'];
			$idclient=$_SESSION["ID"];
			SubmitQuiz($Solutions,$_GET['id'],$idclient);
		}
	}
	
		
		function Search($Keyword,$ID){
			JobSearch($Keyword,$ID);
		}
		
		function JobQuiz($idJob){
			DOQuiz($idJob);
		}
		function Jobs($IDClient){
			JobsCV($IDClient);
		}		

 ?> 
 