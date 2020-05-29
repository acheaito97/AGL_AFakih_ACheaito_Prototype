    <html>  
      <head>  
           <title>CV Creator</title>  
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

                <h2 align="left">Create CV</h2> 
                <div class="form-group">  
                     <form name="Call_PHP" id="Call_PHP">  
                          <div class="table-responsive">
								<table class="table table-bordered" id="dynamic_field_gradu"> 					
								  <tr>  
									<td>
									  <label style="float: left;">Graduation</label>
									</td>
								  </tr>
									<tr>
									  <td>
										<label style="float: left;">University</label>
										<input type="text" class="form-control name_list" id="boardGradu" name="boardGradu" placeholder="University">
									  </td> 
									</tr>					  
									<tr>
									  <td>
										<label style="float: left;">Course</label>
										<input type="text" class="form-control name_list" id="courseGradu" name="courseGradu" placeholder="Course">
									  </td> 
									</tr>
									<tr>
									  <td>
										<label style="float: left;">Passing Year</label>
										<input type="number" class="form-control name_list" id="pYearGradu" name="pYearGradu" placeholder="Your Passing Year">
									  </td> 
									</tr>
								 </table>						  
								  <table class="table table-bordered" id="dynamic_field_hs"> 
								   <tr>
									<td>
									  <label style="float: left;">Higher Secondary</label>
									</td>
								  </tr>
								  <tr>
									<td>
										<label style="float: left;">School Name</label>
										<input type="text" class="form-control name_list" id="schoolNameHs" name="schoolNameHs" placeholder="Your School Name">
									</td> 
								  </tr>
								  <tr>
									  <td>
										<label style="float: left;">Passing Year</label>
										<input type="number" class="form-control name_list" id="pYearHs" name="pYearHs" placeholder="Your Passing Year">
									  </td> 
								  </tr>
								</table>						  
								  <table class="table table-bordered" id="dynamic_field_sc"> 
									   <tr>
										<td>
										  <label style="float: left;">Secondary</label>
										</td>
									  </tr>
									  <tr>
										<td>
											<label style="float: left;">School Name</label>
											<input type="text" class="form-control name_list" id="schoolNameSc" name="schoolNameSc" placeholder="Your School Name">
										</td> 
									  </tr>
									  <tr>
										  <td>
											<label style="float: left;">Passing Year</label>
											<input type="number" class="form-control name_list" id="pYearSc" name="pYearSc" placeholder="Your Passing Year">
										  </td> 
									  </tr>
								</table>						  
								<table class="table table-bordered" id="skill_field">  
									<tr>  
										<td>
											<label style="float: left;">Skills</label>
											<input type="text" name="skills[]" class="form-control name_list" placeholder="Your awesome skills"/>
										</td>
										<td width="90px"><button type="button" name="addskill" id="addskill" class="btn btn-success">+</button></td>
								</table>						  
								<table class="table table-bordered" id="proj_field">  
									<tr>  
										<td>
											<label style="float: left;">Projects</label>
											<input type="text" name="projects[]" class="form-control name_list" placeholder="Your Super Projects"/>
										</td>
										<td width="90px"><button type="button" name="addproj" id="addproj" class="btn btn-success">+</button></td>
								</table>
                               <table class="table table-bordered" id="Work_field">  
                                    <tr>  	
                                         <td>
											  <label style="float: left;">Work Experiences</label>
											  <input type="number" name="years[]" class="form-control name_list" placeholder="Years Of Experiences">
											  <input type="text" name="Cname[]" class="form-control name_list" placeholder="Company Name">
											  <input type="text" name="workType[]" class="form-control name_list" placeholder="Field Of Work">
										 </td>  
                                         <td width="90px"><button type="button" name="addWork" id="addWork" class="btn btn-success">+</button></td>  
                                    </tr>  
                               </table>							  
                               <table class="table table-bordered" id="Language_field">  
                                    <tr>  	
                                         <td>
											 <label style="float: left;">Languages</label>
											 <input type="text" name="language[]" placeholder="Language" class="form-control name_list" />
										 </td>  
                                         <td width="90px"><button type="button" name="addlang" id="addlang" class="btn btn-success">+</button></td>  
                                    </tr>  
                               </table>							   
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Create" onclick="goBack()"/>  
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#addlang').click(function(){  
           i++;  
           $('#Language_field').append('<tr id="row'+i+'"><td><input type="text" name="language[]" placeholder="Language" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });    
      $('#addWork').click(function(){  
           i++;  
           $('#Work_field').append('<tr id="row'+i+'"><td><input type="text" name="years[]" placeholder="Years Of Experiences" class="form-control name_list" /><input type="text" name="Cname[]" class="form-control name_list" placeholder="Company Name"><input type="text" name="workType[]" class="form-control name_list" placeholder="Field Of Work"></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $('#addproj').click(function(){  
           i++;  
           $('#proj_field').append('<tr id="row'+i+'"><td><input type="text" name="projects[]" class="form-control name_list" placeholder="Your Super Projects"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  	  
      $('#addskill').click(function(){  
           i++;  
           $('#skill_field').append('<tr id="row'+i+'"><td><input type="text" name="skills[]" class="form-control name_list" placeholder="Your awesome skills"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  	  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });	  
      $('#submit').click(function(){            
           $.ajax({  
                url:"../Busniess Logic/Company BL.php?funct=CreateCV",  
                method:"POST",  
                data:$('#Call_PHP').serialize(),  
                success:function(data) 
                {  
                     alert(data);  
                     $('#Call_PHP')[0].reset();  
                }  
           });  
      });  
 });  
 </script>
  <script>
function goBack() {
   window.history.back();
}
</script>