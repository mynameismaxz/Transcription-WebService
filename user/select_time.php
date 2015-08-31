<?php
    require("config.php");
    if(empty($_SESSION['user'])) 
    {
        header("Location: index.php");
        die("Redirecting to index.php"); 
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <!-- This file has been downloaded from Bootsnipp.com. Enjoy! -->
    <title>Sign Up - Bootsnipp.com</title>
        <meta name="viewport" content="width=device-width, initial-scale=1">
	<link href="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"> 
          <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	
	
	<!-- jq-->
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
       
  
	   
    <style type="text/css">
         body { padding-top:30px; 
		width:400px; /* จำเป็นต้องกำหนดความกว้างให้คงที่ */
position:absolute;
left:50%; /* ด้านซ้ายครึ่งจอ */
margin-left:-150px; /*margin-left ติดลบครึ่งหนึ่งของความกว้าง */ }
.form-control { margin-bottom: 10px; }
    </style>
   
   
   
   <!-- boostrap help-->
   <link href="css/bootstrap-form-helpers.min.css" rel="stylesheet" >
    <script src="js/bootstrap-formhelpers.min.js"></script>
	          <script src="js/bootstrap-formhelpers-timepicker.js"></script>  
              <script src="js/bootstrap-formhelpers-datepicker.js"></script>
   
	
	   <link href="js/jquery-ui-timepicker-addon.css" rel="stylesheet" media="all">
<script src="js/jquery-ui-timepicker-addon.js"></script>

</head>
<body>
<div class="container">
    <div class="row">
	  
        <div class="  well well-sm">
            <legend><a href="http://www.jquery2dotnet.com"><i class="glyphicon glyphicon-globe"></i></a> Prepare Broadcast</legend>
			
</div>
            <form action="confirm.php" method="post" class="form" role="form" >
			
           <input type="hidden" name="user" id="user" value="<?php echo htmlentities($_SESSION['user']['username'], ENT_QUOTES, 'UTF-8'); ?>" />
                
            
			
			 
            <input class="form-control" name="topic" placeholder="Topic" type="text"  />
            <div class="">
                    <input class="form-control" name="timestart" placeholder="Time Start" type="text" id="timepicker"
                         />
                </div>
                <div class="">
                    <input class="form-control" name="timeend" placeholder="Time END" type="text" id="timepicker2" />
                </div>
			 <input class="form-control" name="datestart" placeholder="Date Start" type="text" id="datepicker" />
             
			
            
		
			

			
			
			<label for="">
               <!-- Birth Date</label>
            <div class="row">
                <div class="col-xs-4 col-md-4">
                    <select class="form-control">
                        <option value="Month">Month</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control">
                        <option value="Day">Day</option>
                    </select>
                </div>
                <div class="col-xs-4 col-md-4">
                    <select class="form-control">
                        <option value="Year">Year</option>
                    </select>
                </div>
            </div>
            <label class="radio-inline">
                <input type="radio" name="sex" id="inlineCheckbox1" value="male" />
                Male
            </label>
            <label class="radio-inline">
                <input type="radio" name="sex" id="inlineCheckbox2" value="female" />
                Female
            </label>
			-->
            <br />
            <br />
            <button class="btn btn-lg btn-primary btn-block" type="submit">
                Confirm</button>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
  $(function() {
    $( "#datepicker" ).datepicker();
	
  });
  
 $(function() {
$("#timepicker").timepicker();
});

$(function() {
$("#timepicker2").timepicker();
});
 
   
    




    </script>
</body>
</html>
