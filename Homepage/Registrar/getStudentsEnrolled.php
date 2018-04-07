<?php
include( $_SERVER['DOCUMENT_ROOT'].'/universidad/Homepage/dbconnect.php');

$code = $_GET['code'];
$year  =$_GET['year'];
$sem = $_GET['sem'];
$sec = $_GET['sec'];

echo'<h3>STUDENTS</h3>';
echo'<table class="table">';
echo'<tr>
	<th>Student Code</th>
	<th>First Name</th>
	<th>Middle Name</th>
	<th>Last Name</th>
	<th>E-mail</th>
	<th>scholastic Status</th>
	 </tr>';
			$Query = "SELECT studentCode,firstName,middleName,lastName,
			email,mobileNum,scholasticStatus 
			from student as St 
			join account as A on A.accountCode=St.studentCode
			join grade as G on G.g_studentFK= St.studentCode
			join subject_offering as SO on G.g_subjectOfferingFK= SO.subjectOfferingCode
			join curriculum_subject as CS on SO.so_curriculumSubjectFK=CS.curriculumSubjectCode
			join subject as S on CS.cs_subjectFK=S.subjectCode

			join enrollment as E on SO.so_enrollmentFK=E.enrollmentCode
			join section as Se on SO.so_sectionFK=Se.sectionCode
			where S.subjectCode='$code'
			and E.semester='$sem' and E.schoolYear=$year
			and Se.sectionCode='$sec'
			order by studentCode";
   			if  ($sql = $conn ->query($Query));
				{
					while($row = $sql ->fetch_assoc())
					{
						echo '<tr>
							 <td  >'.$row['studentCode'].'</td>
							 <td  >'.$row['firstName'].'</td>
							 <td   >'.$row['middleName'].'</td>
							 <td   >'.$row['lastName'].'</td>
							 <td   >'.$row['middleName'].'</td>
							 <td   >'.$row['scholasticStatus'].'</td>
							 </tr >';
					}
					
					$conn->close();
				}
				echo "</table>";
?>