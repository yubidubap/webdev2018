<?php

	include "connection.php";

	$q = $_GET['q'];

	$sql = "SELECT cs_subjectFK FROM curriculum_subject WHERE cs_curriculumFK = '".$q."'";

	$result = $conn->query($sql);

	while($row = $result->fetch_assoc())
	{
    	echo "<option value='".$row["cs_subjectFK"]."'>".$row["cs_subjectFK"]."</option>";
	}
?>