<?php

	include "connection.php";
	
	$q = $_GET['q'];

	$sql = "SELECT sectionCode FROM section WHERE s_courseFK = '$q';";

	$result = $conn->query($sql);

	echo "<option disabled selected hidden>Select Section</option>";

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc())
		{
	    	echo "<option value='".$row["sectionCode"]."'>".$row["sectionCode"]."</option>";
		}
	}
?>