<?php

	include "connection.php";
	
	$q = $_GET['q'];

	$sql = "SELECT sectionCode FROM section WHERE s_courseFK = '".$q."'";

	$result = $conn->query($sql);

	while($row = $result->fetch_assoc())
	{
    	echo "<option value='".$row["sectionCode"]."'>".$row["sectionCode"]."</option>";
	}
?>