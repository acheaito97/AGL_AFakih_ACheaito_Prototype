    <html>  
      <head>  
           <title>Quiz</title>  
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

                <h2 align="left">Create Quiz</h2> 
                <div class="form-group">  
                     <form name="Call_PHP" id="Call_PHP">  
                          <div class="table-responsive">
                               <table class="table table-bordered" id="Work_field">  
                                    <tr>  	
                                         <td>
											  <label style="float: left;">Question</label>
											  <input type="text" name="Questions[]" class="form-control name_list" placeholder="Description" required>
											  <label style="float: left;padding-top:10px;">Solutions</label>				
											  <input type="text" name="Solution1[]" class="form-control name_list" placeholder="Solution 1" required>
											  <input type="text" name="Solution2[]" class="form-control name_list" placeholder="Solution 2" required>
											  <input type="text" name="Solution3[]" class="form-control name_list" placeholder="Solution 3" required>
											  <label style="float: left;padding-top:10px;">Right Solution</label>
											  <select name="RightSolution[]" class="form-control name_list" id="RightSolution">
												<option value="1">Solution 1</option>
												<option value="2">Solution 2</option>
												<option value="3">Solution 3</option>
											  </select>											  
											  <label style="float: left;padding-top:10px;">Rate</label>
											  <input type="number" name="Rates[]" class="form-control name_list" placeholder="Rate" required>
										 </td>  
                                         <td width="90px"><button type="button" name="addWork" id="addWork" class="btn btn-success">+</button></td>  
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
	  
var getUrlParameter = function getUrlParameter(sParam) {
    var sPageURL = window.location.search.substring(1),
        sURLVariables = sPageURL.split('&'),
        sParameterName,
        i;

    for (i = 0; i < sURLVariables.length; i++) {
        sParameterName = sURLVariables[i].split('=');

        if (sParameterName[0] === sParam) {
            return sParameterName[1] === undefined ? true : decodeURIComponent(sParameterName[1]);
        }
    }
};	  
var IDJOB=getUrlParameter('id');
      $('#addWork').click(function(){  
           i++;  
           $('#Work_field').append('<tr id="row'+i+'"><td><label style="float: left;">Question</label><input type="text" name="Questions[]" placeholder="Description" class="form-control name_list" required/><label style="float: left;padding-top:10px;">Solutions</label><input type="text" name="Solution1[]" class="form-control name_list" placeholder="Solution 1" required><input type="text" name="Solution2[]" class="form-control name_list" placeholder="Solution 2" required><input type="text" name="Solution3[]" class="form-control name_list" placeholder="Solution 3" required>	<label style="float: left;padding-top:10px;">Right Solution</label>										  <select name="RightSolution[]" class="form-control name_list" id="RightSolution"><option value="1">Solution 1</option><option value="2">Solution 2</option><option value="3">Solution 3</option></select>		<label style="float: left;padding-top:10px;">Rate</label><input type="number" name="Rates[]" class="form-control name_list" placeholder="Rate" required></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  	 	  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove(); 
			i--;
      });	  
      $('#submit').click(function(){            
           $.ajax({  
                url:"../Busniess Logic/Company BL.php.php?funct=CreateQuiz&IDJob="+IDJOB,  
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
   window.history.back();
}
</script>