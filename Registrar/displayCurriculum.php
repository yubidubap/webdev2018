<?php

include( $_SERVER['DOCUMENT_ROOT'].'/universidad/Homepage/dbconnect.php');
 $curri = $_GET['curri'];


$Query="SELECT MAX(yearLevel) as year FROM curriculum_subject";
$sql=$conn->query($Query);

while($row = $sql->fetch_assoc())
{
	$year = $row['year'];
}

for($i=1;$i<=$year;$i++)
{
	echo'<div class="col-sm-12">';
	switch ($i) 
	{
    case "1":
        echo '<h3>First Year</h3>';
        break;
    case "2":
        echo '<h3>Second Year</h3>';
        break;
    case "3":
        echo '<h3>Third Year</h3>';
        break;
    case "4":
        echo '<h3>Fourth Year</h3>';
        break;
    default:
    	echo'<h3>Fifth Year</h3>';
    }

    	$Query="SELECT MAX(semester) as sem from curriculum_subject where yearLevel ='$i'";
		$sql=$conn->query($Query);

		while($row = $sql->fetch_assoc())
		{
			$sem=$row['sem'];
		}

   
	for($j = 1 ; $j<=$sem;$j++)
	{
		switch ($j) 
		{
			case "1":
			    echo '<h4>First Semester</h4>';
			    break;
			case "2":
			    echo '<h4>Second Semester</h4>';
			    break;
			default:
			    echo '<h4>Summer Year</h4>';
    	}

    	echo'<table class="table">
    		  <tr>
    		  <th>SUBJECT CODE</th>
    		  <th>SUBJECT TITLE</th>
    		  <th>UNITS</th>
    		  <th>PREREQUISITE</th>
    		  <th>EQUIVALENT</th>
    		  </tr>';
		//REMOVE GROUP_CONCAT() IF STILL NOT WORKING
    	$Query="SELECT subjectCode,subjectTitle,units,sp_SubPreReq as prereq,
    			es_SubjectEquivalent as equivalent 
    			FROM subject as S JOIN curriculum_subject as CS
				ON S.subjectCode = CS.cs_subjectFK
				LEFT JOIN subject_prereq as SP
				ON SP.sp_SubjectCodeFK = S.subjectCode
				LEFT JOIN equivalent_subject as ES
				ON ES.es_SubjectCodeFK=S.subjectCode
				JOIN curriculum as C
				ON C.curriculumCode = CS.cs_curriculumFK
				WHERE cs_curriculumFK = '$curri'
				AND yearLevel = '$i'
				AND semester = '$j'
				group by S.subjectCode
				order by S.subjectTitle";

		$sql=$conn->query($Query);
		while($row = $sql->fetch_assoc())
		{
			echo   '<tr>
    		  		<td>'.$row['subjectCode'].'</td>
    			    <td>'.$row['subjectTitle'].'</td>
    			    <td>'.$row['units'].'</td>
    			    <td>'.$row['prereq'].'</td>
    			    <td>'.$row['equivalent'].'</td>
    			   </tr>';
		}

		echo'</table>';
		
	}
    echo'</div>';
}


?>