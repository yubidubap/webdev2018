<?php
	session_start();
	include( $_SERVER['DOCUMENT_ROOT'].'/webdev2018/Homepage/dbconnect.php');

// echo $_GET['year'];
// echo $_GET['sem'];
// echo $_GET['sec'];

$year = $_GET['year'];
$sem = $_GET['sem'];
$sec = $_GET['sec'];




	$Query= "SELECT distinct subjectCode,subjectTitle,units
			 from subject as S inner join curriculum_subject as CS
			 on CS.cs_subjectFK=S.subjectCode
			 join subject_offering as SO 
			 on SO.so_curriculumSubjectFK=CS.curriculumSubjectCode
			 join enrollment E 
			 on SO.so_enrollmentFK=E.enrollmentCode
			 join section Se on SO.so_sectionFK=Se.sectionCode
			 where E.semester='$sem' and E.schoolYear=$year
			 and Se.sectionCode='$sec'
		     order by subjectTitle";
		  
		     $sql = $conn ->query($Query);
				{
					while($row = $sql ->fetch_assoc())
					{
						echo '<tr style="background-color: white;" name="table-content" id="table-content">
							 <td  >'.$row['subjectCode'].'</td>
							 <td  >'.$row['subjectTitle'].'</td>
							 <td   >'.$row['units'].'</td>
							 </tr >';
					}
					
					$conn->close();
				}

	
?>