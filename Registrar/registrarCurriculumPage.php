<?php
 session_start();
 include 'fillDropdown(Curriculum).php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Curriculum</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="registrarCurriculum.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="header" >

			<ul style="padding-right: 0px;">

				<li><a href="registrarProfilePage.php">Profile</a></li>
				<li>Curriculum</li>
				<li><a href="registrarStudentPage.php">Student</a></li>
				<li><a href="registrarSubjectPage.php">Subject</a></li>
				<li>SIGN OUT</li>

			</ul>

			<img src="Quadrant1\logo.png">

	</div>

	<div class="row">
		<div class="col-sm-6">
			<label for="course">Course:</label>
  					<select class="form-control" id="course" onchange="selectCourse(course)">
    						<?php getCourse(); ?>				
 					</select>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6" >
			<div class="form-group">
			<h3></h3>
				<label for="curriculum">Curriculum Year:</label>
  					<select class="form-control" id="curriculum" onchange="displayCurriculum(course.value,curriculum.value)">
    					<option disabled selected hidden>NO AVAILABLE CURRICULUM</option>
 					</select>
			</div>
		</div>
	</div>
<script>


		function selectCourse(course) 
		{
		  if(course!="")
		  { 
		    
		      if (window.XMLHttpRequest) 
		      {
		        // code for IE7+, Firefox, Chrome, Opera, Safari
		        xmlhttp=new XMLHttpRequest();
		      } 
		      else 
		      {   // code for IE6, IE5
		        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		      }

		      xmlhttp.onreadystatechange=function() 
		      {
		        if (this.readyState==4 && this.status==200) 
		        {
		            document.getElementById("curriculum").innerHTML=this.responseText;
		        }
		      }

		      xmlhttp.open("GET","fillDropdown(Curriculum).php?course="+course,true);
		      xmlhttp.send();
		  }
		 
		}


 function displayCurriculum(course,curriculum) 
{
	if(curriculum!="")
    {
      if (window.XMLHttpRequest) 
      {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp=new XMLHttpRequest();
      } 
      else 
      {   // code for IE6, IE5
        xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
      }

      xmlhttp.onreadystatechange=function() 
      {
        if (this.readyState==4 && this.status==200) 
        {
            document.getElementById("output").innerHTML=this.responseText;
        }
      }

      xmlhttp.open("GET","displayCurriculum.php?course="+course+"&curri="+curriculum,true);
      xmlhttp.send();
  
 	}
 }


</script>
<div id= "output">
</div>

</body>
</html>