

<!DOCTYPE html>
<html lang="en">
      <head>  
           <title>Candidates</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
    <body>
		<?php
			session_start();
		?>	
	   <div class="container">  
                <br />  
                <br />  
		<h2 align="left">List Candidates</h2> 
                <div class="form-group">  
                     <form method="post">  
                          <div class="table-responsive">
									<?php
										include('../Busniess Logic/Company BL.php');
										CandidateList($_SESSION['ID']);
									?>									
							</div>
						</form>
					</div>
				</div>
    </body>
</html>