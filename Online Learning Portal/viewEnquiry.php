<!DOCTYPE html>
<html>
<head>
	<title>Enquiries</title>

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<body>
	<div class="tableData">
	<?php
		session_start();

		//Step 1 - Establish Connection

		//Step 2 - Handling Connection Error
		include('conn1.php');

		//Step 3 - Execute SQL query
		$sql1 = 'SELECT * FROM enquiry_t ORDER BY enq_id DESC';
		$results1 = mysqli_query($conn1, $sql1);

		//Step 4 - Process results
		//Enquiries
		echo '<div class="section-title" data-aos="fade-up">';
		if(mysqli_num_rows($results1)>0){
			echo '
			<h3><center>Enquiries</center></h3>';
			echo '<div class="tabular">
			<table>
				<tr>
					<th>Enquiry ID</th>
					<th>Enquirer</th>
					<th>Enquirer Email</th>
					<th>Subject</th>
					<th>Message</th>
					<th>Student_ID <br> [0 indicates not a student]</th>
				</tr>
		</div>';
			for($i=0; $i<mysqli_num_rows($results1); $i++){
				$row = mysqli_fetch_assoc($results1);
				echo '<tr>';
				echo '<td>'.$row['enq_id'].'</td>';
				echo '<td>'.$row['enq_name'].'</td>';
				echo '<td>'.$row['enq_email'].'</td>';
				echo '<td>'.$row['enq_subject'].'</td>';
				echo '<td>'.$row['enq_message'].'</td>';
				echo '<td>'.$row['stu_id'].'</td>';
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