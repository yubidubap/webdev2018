<?php
	include( $_SERVER['DOCUMENT_ROOT'].'/universidad/Homepage/dbconnect.php');
	$course;

if(isset($_GET['course']))
{
	$_GET['course'];
	
	echo '<option disabled selected hidden>Choose a curriculum...</option>';
			if($sql = $conn ->query("SELECT curriculumCode 
									 FROM curriculum as CU JOIN course as CO 
								     ON CU.c_courseFK=CO.courseCode
							         WHERE courseCode='BSIT';"))
				{
					if($count = $sql->num_rows)
					{						
						while($row = $sql ->fetch_assoc())
						{
							echo '<option value="'.$row['curriculumCode'].'"">'.$row['curriculumCode'].'</option>';
						}
					}
					$conn->close();
				}
		
}


		function getCourse()
		{
			global $conn;

			echo '<option disabled selected hidden>Choose a course...</option>';
			if($sql = $conn ->query("SELECT courseCode,courseTitle from course ;"))
				{
					if($count = $sql->num_rows)
					{						
						while($row = $sql ->fetch_assoc())
						{
							echo '<option value='.$row['courseCode'].'>'.$row['courseTitle'].'</option>';
						}
					}
					$conn->close();
				}
				
		}


	
			

			
		
		
?>