    <html>  
      <head>  
           <title>Add Job</title>  
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

                <h2 align="left">Add New Job</h2> 
                <div class="form-group">  
                     <form method="post">  
                          <div class="table-responsive">
								<table class="table table-bordered"> 					
								  <tr>  
									<td>
									  <label style="float: left;">Title</label>
									  <input type="text" class="form-control name_list" name="Title" placeholder="Title" Required>
									</td>
									</tr>
									<tr>
									<td>
									  <label style="float: left;">Required Years</label>
									  <input type="number" class="form-control name_list" name="year" placeholder="Years Experience Required" Required>
									</td>									
								  </tr>
									<tr>
									  <td>
										<label style="float: left;">Description</label>
										<textarea name="Desc" class="form-control name_list" rows="12" cols="40" Required></textarea>
									  </td> 
									</tr>					  
								 </table>						  					   
                               <input type="submit" name="submit" id="submit" class="btn btn-info" value="Add" />  
                          </div>  
                     </form>  
                </div>  
           </div>
			<?php
				include('../Busniess Logic/Company BL.php');
				if(isset($_POST['submit'])){
					JobCreator($_SESSION["ID"],$_POST['Desc'],$_POST['Title'],$_POST['year']);
				}
								
			?>
      </body>  
 </html>  