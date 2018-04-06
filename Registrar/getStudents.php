<?php
session_start();
include( $_SERVER['DOCUMENT_ROOT'].'/universidad/Homepage/dbconnect.php');
$course = $_GET['course'];

echo'<style>
		#studentlist
		{
			align: center;
		}
			
		}	
	</style>';

echo '<table  class="table" name="studentlist" id="studentlist">';
echo			'<tr>
					<th align="center">Last Name</th>
					<th>First Name</th>
					<th>Middle Name</th>
					<th>E-mail</th>
					<th>Mobile Number</th>
				</tr>';

			
if($sql = $conn ->query("SELECT lastName, firstName,middleName, email,mobileNum
						 FROM account as A JOIN student as S
						 ON A.accountCode = S.studentCode
						 JOIN curriculum as C 
						 ON S.s_curriculumFK = C.curriculumCode
						 WHERE c_courseFK = '$course'
						 ;"))
				{
					if($count = $sql->num_rows)
					{			
								
						while($row = $sql ->fetch_assoc())
						{
							
								
					echo '<tr>';	
					echo   '<td>'.$row['lastName'].'</td>
						   <td>'.$row['firstName'].'</td>
						   <td>'.$row['middleName'].'</td>
						   <td>'.$row['email'].'</td>
					       <td>'.$row['mobileNum'].'</td>';
					echo'</tr>';
			
						}
						
					}

					else
					{
						echo	'<caption id="notavail" align = "bottom">NO STUDENTS ENROLLED IN THIS COURSE</caption>';		
					}

					
					echo	'</table>';
						$conn->close();

				}

?>