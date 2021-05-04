<!DOCTYPE html>
<html>
	<head>
		<title>Search Contact Information</title>

		<!-- Template Main CSS File -->
		<link href="assets/css/style.css" rel="stylesheet">
	</head>
	
	<body>
		<div class="tableData">
			<?php
				//Step 1 - Establish Connection
				//Step 2 - Handling Connection Error
				include('conn1.php');

				//Step 3 - Execute SQL query
				$sql1 = 'SELECT * FROM student_t ORDER BY stu_name';
				$results1 = mysqli_query($conn1, $sql1);

				$sql2 = 'SELECT * FROM lecturer_t ORDER BY lect_name';
				$results2 = mysqli_query($conn1, $sql2);

				$sql3 = 'SELECT * FROM administrator_t ORDER BY admin_name';
				$results3 = mysqli_query($conn1, $sql3);

				//Step 4 - Process results

				
				//Student
				if(mysqli_num_rows($results1)>0){
					echo '<div class="section-title" data-aos="fade-up">
							<h3><center>Students</center></h3>
						  </div>';
					echo '<div class="tabular">
							<table>
								<tr>
									<th>Name</th>
									<th>Username</th>
									<th>Password</th>
									<th>Phone Number</th>
									<th>Email</th>
									<th>Address</th>
									<th>Gender</th>
									<th>Age</th>
									<th>DOB</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results1); $i++){
						$row = mysqli_fetch_assoc($results1);
						echo '<tr>';
						echo '<td>'.$row['stu_name'].'</td>';
						echo '<td>'.$row['stu_username'].'</td>';
						echo '<td>'.$row['stu_password'].'</td>';
						echo '<td>'.$row['stu_phone_number'].'</td>';
						echo '<td>'.$row['stu_email'].'</td>';
						echo '<td>'.$row['stu_address'].'</td>';
						echo '<td>'.$row['stu_gender'].'</td>';
						echo '<td>'.$row['stu_age'].'</td>';
						echo '<td>'.$row['stu_dob'].'</td>';
						echo '<td><a href ="editStudent.php?stu_id='.$row['stu_id'].'"><button>Edit</button></a></td>';
						echo '<td><a href ="deleteStudent.php?stu_id='.$row['stu_id'].'"><button>Delete</button></a></td>';
						echo '</tr>';
					}
					echo '</table>
						</div>';
				}

				else 
					echo '<center><h3>NO DATA EXISTS</h3></center>';


				//Lecturer
				if(mysqli_num_rows($results2)>0){
					echo '<br>
						  <div class="section-title" data-aos="fade-up">
							<h3>Lecturers</h3>
						  </div>';
					echo '<div class="tabular">
							<table>
								<tr bgcolor="#69b4ff">
									<th>Name</th>
									<th>Username</th>
									<th>Password</th>
									<th>Phone Number</th>
									<th>Email</th>
									<th>Address</th>
									<th>Gender</th>
									<th>Age</th>
									<th>DOB</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results2); $i++){
						$row = mysqli_fetch_assoc($results2);
						echo '<tr>';
						echo '<td>'.$row['lect_name'].'</td>';
						echo '<td>'.$row['lect_username'].'</td>';
						echo '<td>'.$row['lect_password'].'</td>';
						echo '<td>'.$row['lect_phone_number'].'</td>';
						echo '<td>'.$row['lect_email'].'</td>';
						echo '<td>'.$row['lect_address'].'</td>';
						echo '<td>'.$row['lect_gender'].'</td>';
						echo '<td>'.$row['lect_age'].'</td>';
						echo '<td>'.$row['lect_dob'].'</td>';
						echo '<td><a href ="editLecturer.php?lect_id='.$row['lect_id'].'"><button>Edit</button></a></td>';
						echo '<td><a href ="deleteLecturer.php?lect_id='.$row['lect_id'].'"><button>Delete</button></a></td>';
						echo '</tr>';
					}
					echo '</table>
						</div>';
				}

				else 
					echo '<center><h3>NO DATA EXISTS</h3></center>';


				//Administrator
				if(mysqli_num_rows($results3)>0){
					echo '<br>
						  <div class="section-title" data-aos="fade-up">
							<h3>Administrators</h3>
						  </div>';
					echo '<div class="tabular">
							<table>
								<tr bgcolor="#69b4ff">
									<th>Name</th>
									<th>Username</th>
									<th>Password</th>
									<th>Phone Number</th>
									<th>Email</th>
									<th>Address</th>
									<th>Gender</th>
									<th>Age</th>
									<th>DOB</th>
									<th>Edit</th>
									<th>Delete</th>
								</tr>';

					for($i=0; $i<mysqli_num_rows($results3); $i++){
						$row = mysqli_fetch_assoc($results3);
						echo '<tr>';
						echo '<td>'.$row['admin_name'].'</td>';
						echo '<td>'.$row['admin_username'].'</td>';
						echo '<td>'.$row['admin_password'].'</td>';
						echo '<td>'.$row['admin_phone_number'].'</td>';
						echo '<td>'.$row['admin_email'].'</td>';
						echo '<td>'.$row['admin_address'].'</td>';
						echo '<td>'.$row['admin_gender'].'</td>';
						echo '<td>'.$row['admin_age'].'</td>';
						echo '<td>'.$row['admin_dob'].'</td>';
						echo '<td><a href ="editAdmin.php?admin_id='.$row['admin_id'].'"><button>Edit</button></a></td>';
						echo '<td><a href ="deleteAdmin.php?admin_id='.$row['admin_id'].'"><button>Delete</button></a></td>';
						echo '</tr>';
					}
					echo '</table>
						</div>';
				}

				else 
					echo '<center><h3>NO DATA EXISTS</h3></center>';

				//Step 5 - Free resource & close connection
					mysqli_free_result($results1);
					mysqli_free_result($results2);
					mysqli_free_result($results3);
					mysqli_close($conn1);
			
			?>
		</div>
	</body>
</html>