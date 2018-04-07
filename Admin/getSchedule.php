<?php

	include "connection.php";

	$sec = $_GET['sec'];
	$sem = $_GET['sem'];
	$sy = $_GET['sy'];

	$sql = "SELECT S.subjectCode, subjectTitle,
			units,roomType,group_concat(day) as 'Day/s',
			time_format(startTime, '%h:%i %p') as startTime,
			time_format(endTime, '%h:%i %p')  as endTime, R.roomCode
			FROM day SD JOIN schedule SC ON SC.scheduleCode = SD.d_scheduleFK
			JOIN subject_offering SO ON SC.s_subjectOfferingFK = SO.subjectOfferingCode
			JOIN curriculum_subject CS ON SO.so_curriculumSubjectFK = CS.curriculumSubjectCode
			JOIN subject S ON CS.cs_subjectFK = S.subjectCode
			JOIN enrollment E ON SO.so_enrollmentFK = E.enrollmentCode
			JOIN room R ON SC.s_roomFK = R.roomCode
			JOIN section SE ON SO.so_sectionFK = SE.sectionCode
			WHERE E.semester = '".$sem."' AND E.schoolYear = '".$sy."'
			AND SE.sectionCode = '".$sec."' GROUP BY S.subjectCode, R.roomType DESC ORDER BY S.subjectTitle;";

	$result = $conn->query($sql);

	echo "<tr style='background-color: #2D486A;'>";
	echo "<th style='color: #fbf7de;'>Subject Code</th>";
	echo "<th style='color: #fbf7de;'>Description</th>";
	echo "<th style='color: #fbf7de;'>Units</th>";
	echo "<th style='color: #fbf7de;'>Room Type</th>";
	echo "<th style='color: #fbf7de;'>Day/s</th>";
	echo "<th style='color: #fbf7de;'>Time Start</th>";
	echo "<th style='color: #fbf7de;'>Time End</th>";
	echo "<th style='color: #fbf7de;'>Room</th>";
	echo "</tr>";

	if ($result->num_rows > 0) 
	{
		while($row = $result->fetch_assoc())
		{
	    	echo "<tr style='background-color: white;'>
						<td>".$row['subjectCode']."</td>
				 		<td>".$row['subjectTitle']."</td>
				 		<td>".$row['units']."</td>
				 		<td>".$row['roomType']."</td>
				 		<td>".$row['Day/s']."</td>
				 		<td>".$row['startTime']."</td>
						<td>".$row['endTime']."</td>
				 		<td>".$row['roomCode']."</td>
			 	  	</tr>";
		}
	}
?>