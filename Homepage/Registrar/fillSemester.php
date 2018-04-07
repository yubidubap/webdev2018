<?php
include( $_SERVER['DOCUMENT_ROOT'].'/webdev2018/Homepage/dbconnect.php');

function getSemesters()
		{
			global $conn;

			echo '<option value="" disabled selected hidden>Choose a semester...</option>';
			$Query = "SELECT distinct(semester) as sem from curriculum_subject ";
			$sql = $conn ->query($Query);
				{
					while($row = $sql ->fetch_assoc())
					{
						$sem  = $row['sem'];
						switch ($sem) 
						{
							case 1:
							   $sem = "1st";
							    break;
							case 2:
							    $sem = "2nd";
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