<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Student</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="registrarStudent.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
  <script type="text/javascript" src="bootstrap/js/bootstrap.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  

</head>
<body>

  <div class="header">

      <ul style="padding-right: 0px;">

        <li><a href="registrarProfilePage.php">Profile</a></li>
        <li><a href="registrarCurriculumPage.php">Curriculum</a></li>
        <li>Student</li>
        <li><a href="registrarSubjectPage.php">Subject</a></li>
        <li><a href="logout.php">SIGN OUT</a></li>

      </ul>

      <img src="Quadrant1\logo.png">

  </div>
  <body>

  <div class="row">
    <div class="col-sm-6">
      <div class="form-group">
          <label for="course">Course:</label>
            <select class="form-control" name="course "id="course" onchange="selectSem(course.value)">
              <option disabled selected hidden>Choose a course...</option>
              <option value="BSIT">BS Information Technology</option>
              <option value="BSA">BS Accountancy</option>
              <option value="BSECE">BS Electronics And Communications Engineer</option>
              
          </select>
      </div>
    </div>
    
  </div>

  



<script>
function selectSem(course) 
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
            document.getElementById("studentlists").innerHTML=this.responseText;
        }
      }

      xmlhttp.open("GET","getStudents.php?course="+course,true);
      xmlhttp.send();
  }
  
  // if (str=="") {
  
}
</script>

  <div class="row" >
    <div class="col-sm-12" id="studentlists">
      
    </div>
  </div>

  </body>

</html>