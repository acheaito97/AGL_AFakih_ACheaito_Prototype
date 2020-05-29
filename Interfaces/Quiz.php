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

                <h2 align="left">Quiz</h2> 
                <div class="form-group">  
                     <form name="Call_PHP" id="Call_PHP">  
                          <div class="table-responsive">
                               <table class="table table-bordered" id="Work_field">  
									<?php
										include('../Busniess Logic/Candidate BL.php');
										JobQuiz($_GET['id']);
									?>
                               </table>							   
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" onclick="goBack()"/>  
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
      $('#submit').click(function(){            
           $.ajax({  
                url:"../Controllers/Candidate Controller.php?funct=SubmitQuiz&id="+IDJOB,  
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