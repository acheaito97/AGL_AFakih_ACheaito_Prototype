

<!DOCTYPE html>
<html lang="en">
      <head>  
           <title>Home</title>  
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
		<center><h2>Home Company</h2></center>
                <div class="form-group">  
					<div class="table-responsive">
						</br>
						<center><table class="table table-bordered" style="width:500px;"> 					
							<tr>  
									<td  style="width:200px;">
										<a href="SearchJob.php" style="width:500px;" class="btn btn-info">Search Job</a> 
									</td>
							</tr>	
							<tr>  
									<td  style="width:200px;">
										<a href="AddJob.php" style="width:500px;" class="btn btn-info">Add Job</a> 
									</td>
							</tr>
							<tr>  
									<td  style="width:200px;">
										<a href="ListCandidate.php" style="width:500px;" class="btn btn-info">List of Candidate</a> 
									</td>
							</tr>	
							<tr>  
									<td  style="width:200px;">
										<a href="../index.php" style="width:500px;background-color:#cf1f2b;" class="btn btn-info">Logout</a> 
									</td>
							</tr>								
					</table>
							</div>
					</div>
				</div>
    </body>
</html>