<!DOCTYPE html>
<html>
<head>
	<title>View Course Content</title>

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
	<h2 align="center">View Course Content</h2>

	<dic class="tableData">
	<?php
		session_start();

		//Step 1 - Establish Connection

		//Step 2 - Handling Connection Error
		include('conn1.php');

		//Step 3 - Execute SQL query
		if ($_SESSION['logrole'] == 'lecturer_t'){
			$sql1 = 'SELECT * FROM course_content_t WHERE lect_id = "'. $_SESSION['id'] .'" ORDER BY course_id';
		} else {
			$sql1 = 'SELECT * FROM course_content_t ORDER BY course_id';
		}
		$results1 = mysqli_query($conn1, $sql1);




		//Step 4 - Process results
		//Course Content
		if(mysqli_num_rows($results1)>0){
			echo '<div class="section-title" data-aos="fade-up">
					<h3><center>Courses</center></h3>
					<a href="addCourseContent.php"><button>Add Course Content</button></a>
					<div class= "tabular">
					<br>';
				echo '<table border="1" align="center">
						<tr bgcolor="#69b4ff">
							<th>Course ID</th>
							<th>Week</th>
							<th>Title</th>
							<th>Link</th>
							<th>Lecturer ID</th>
							<th>Edit</th>
							<th>Delete</th>
						</tr>
					</div>';
			for($i=0; $i<mysqli_num_rows($results1); $i++){
				$row = mysqli_fetch_assoc($results1);
				echo '<tr>';
				echo '<td>'.$row['course_id'].'</td>';
				echo '<td>'.$row['content_week'].'</td>';
				echo '<td>'.$row['content_title'].'</td>';
				echo '<td>'.$row['content_media'].'</td>';
				echo '<td>'.$row['lect_id'].'</td>';
				echo '<td><a href ="editCourseContent.php?content_media='.$row['content_media'].'"><button>Edit</button></a></td>';
				echo "<td><a href =deleteCourseContent.php?content_media='".$row['content_media'].'><button>Delete</button></a></td>';
				echo '</tr>';
			}
			echo '</table>
			</div>';
		}

		else 
			echo '<center><h3>NO DATA EXISTS</h3></center>';
		

		//Step 5 - Free resource & close connection
			mysqli_free_result($results1);
			mysqli_close($conn1);
		
	
	?>
	</div>
</body>
</html>