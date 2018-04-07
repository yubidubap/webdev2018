<?php
include( $_SERVER['DOCUMENT_ROOT'].'/universidad/Homepage/dbconnect.php');

function getSemesters()
		{
			global $conn;

			echo '<option value="" disabled selected hidden>Choose a course...</option>';
			$Query = "SELECT distinct(semester) as sem from curriculum_subject ";
			$sql = $conn ->query($Query);
				{
					while($row = $sql ->fetch_assoc())
					{
						$sem  = $row['sem'];
						switch ($sem) 
						{
							case 1:
							   $sem = "First";
							    break;
							case 2:
							    $sem = "Second";
							    break;
							default:
							    $sem="Summer";
				    	}

						echo '<option value='.$row['sem'].'>'.$sem.'</option>';
					}
					
					$conn->close();
				}
				
		}
?>