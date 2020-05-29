

<!DOCTYPE html>
<html lang="en">
      <head>  
           <title>Search Job</title>  
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
		<h2 align="left">Search</h2> 
                <div class="form-group">  
                     <form method="post">  
                          <div class="table-responsive">
								<table class="table table-bordered"> 					
								  <tr>  
									<td>
									  
									  <input type="text" class="form-control name_list" name="Title" placeholder="Title Job Search" Required>
									  
									</td>
									<td  width="90px">
										<input type="submit" name="submit" id="submit" class="btn btn-info" value="Search" /> 
									</td>
									</tr>
									<?php
										include('../Busniess Logic/Candidate BL.php');
										if(isset($_POST['submit'])){
											Search($_POST['Title'],$_SESSION['ID']);
										}
									?>									
							</div>
						</form>
					</div>
				</div>
    </body>
</html>