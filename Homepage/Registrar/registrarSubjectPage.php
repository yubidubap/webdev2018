<?php
	
	
?>
<!DOCTYPE html>
<html>
<head>
	<title>Subject</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="registrarSubject.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<style>
	td 
	{
		color: black;
	}

 #table-content:hover
	{
		color:lightblue;
		cursor:pointer
	}
</style>

	<div class="header">

			<ul style="padding-right: 0;">

				<li><a href="registrarProfilePage.php">Profile</a></li>
				<li><a href="registrarCurriculumPage.php">Curriculum</a></li>
				<li><a href="registrarStudentPage.php">Student</a></li>
				<li>Subject</li>
        <li><a href="logout.php">SIGN OUT</a></li>

			</ul>

			<img src="Quadrant1\logo.png">

	</div>


<div class="row">
  <div class="col-sm-4">
	   <label for="course">ENROLLMENT YEAR:</label>
  					<select class="form-control" name="year" id="year" onchange="displaySubjects(year.value,semester.value,section.value)">
    						<option disabled selected hidden>Chooose a semester...</option>
    						<?php include 'fillDropdown(Subjects).php';
    						 getYear();?>
 					</select>
 	</div>

<div class="col-sm-4">
 		<label for="course">SEMESTER:</label>
  					<select class="form-control" name="semester" id="semester" onchange="displaySubjects(year.value,semester.value,section.value)">
    						<option disabled selected hidden>Chooose a year...</option>		
    						<?php include 'fillSemester.php'; 
    						getSemesters();?>

 					</select>
 	</div>

 	<div class="col-sm-4">
 		<label for="course">SECTION:</label>
  					<select class="form-control" name="section" id="section" onchange="displaySubjects(year.value,semester.value,section.value)">
    					<?php include 'fillSection.php';
    					getSection();
    					?>
    					</select>
 		</div>

</div>

	<div class="col-sm-12">
	<h1></h1>
			<table class="table">
				<tr style="background-color: #2D486A;">
					<th style="color: #fbf7de;">#</th>
					<th  style="color: #fbf7de;">Subject Code</th>
					<th  style="color: #fbf7de;">Units</th>
				</tr>

					<tbody id ="output">
					</tbody>
			
			</table>
	</div>

<script >
	

$(document).ready(function() {
  $("tbody").click(function() {
  
    var tableData = $("tr").children("td").map(function() {
        return $(this).text();
    }).get();
   
    var subjCode = $.trim(tableData[0]);

    displayStudents(subjCode,year.value,semester.value,section.value)
    $("#studentOutput").show();
});
});

function displaySubjects(year,sem,sec) 
{
	$("#studentOutput").hide();

	if(sec!="" &&sem!=""&&year!="")
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

      xmlhttp.open("GET","getSubjects.php?year="+year+"&sem="+sem+"&sec="+sec,true);
      xmlhttp.send();
  
 	}
 	
 }

function displayStudents(code,year,sem,sec) 
{
	if(code!="")
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
            document.getElementById("studentOutput").innerHTML=this.responseText;
        }
      }

      xmlhttp.open("GET","getStudentsEnrolled.php?code="+code+"&year="+year+"&sem="+sem+"&sec="+sec,true);
      xmlhttp.send();
  
 	}
 }		
</script>
<div name="studentOutput" id="studentOutput" class="col-sm-12">
</div>


</body>
</html>