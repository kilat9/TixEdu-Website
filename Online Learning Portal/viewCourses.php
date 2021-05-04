<!DOCTYPE html>
<html>
<head>
	<title>View Courses</title>

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
	<h2 align="center">View Courses</h2>

	<div class="tableData">
	<?php
		session_start();

		//Step 1 - Establish Connection

		//Step 2 - Handling Connection Error
		include('conn1.php');

		//Step 3 - Execute SQL query
		if ($_SESSION['logrole'] == 'lecturer_t'){
			$sql1 = 'SELECT * FROM courses_t WHERE lect_id = "'. $_SESSION['id'] .'" ORDER BY course_id';
		} else {
			$sql1 = 'SELECT * FROM courses_t ORDER BY course_id';
		}
		$results1 = mysqli_query($conn1, $sql1);




		//Step 4 - Process results
		//Courses
		echo '<div class="section-title" data-aos="fade-up">';
		if(mysqli_num_rows($results1)>0){
			echo '
			<h3><center>Courses</center></h3>';
			echo '<div class="tabular">
			<table>
				<tr>
					<th>Course ID</th>
					<th>Course Name</th>
					<th>Course Description</th>
					<th>Course Category</th>
					<th>Edit</th>
					<th>Delete</th>
				</tr>
		</div>';
			for($i=0; $i<mysqli_num_rows($results1); $i++){
				$row = mysqli_fetch_assoc($results1);
				echo '<tr>';
				echo '<td>'.$row['course_id'].'</td>';
				echo '<td>'.$row['course_name'].'</td>';
				echo '<td>'.$row['course_description'].'</td>';
				echo '<td>'.$row['course_category'].'</td>';
				echo '<td><a href ="editCourses.php?course_id='.$row['course_id'].'"><button>Edit</button></a></td>';
				echo '<td><a href ="deleteCourses.php?course_id='.$row['course_id'].'"><button>Delete</button></a></td>';
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