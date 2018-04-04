<?php

	include "connection.php";

	$q = $_GET['q'];

	$sql = "SELECT curriculumCode FROM curriculum WHERE c_courseFK = '".$q."'";

	$result = $conn->query($sql);

	echo "<option disabled selected>Select Curriculum</option>";

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc())
		{
	    	echo "<option value='".$row["curriculumCode"]."'>".$row["curriculumCode"]."</option>";
		}
	}
?>