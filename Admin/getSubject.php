<?php

	include "connection.php";

	$q = $_GET['q'];

	$sql = "SELECT subjectTitle, cs_subjectFK FROM subject INNER JOIN curriculum_subject ON curriculum_subject.cs_subjectFK = subject.subjectCode WHERE cs_curriculumFK = '$q';";

	$result = $conn->query($sql);

	echo "<option disabled selected>Select Subject</option>";
	
	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc())
		{
    		echo "<option value='".$row["cs_subjectFK"]."'>".$row["subjectTitle"]."</option>";
		}
	}
?>