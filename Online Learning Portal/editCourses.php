<!DOCTYPE html>
<html>
<head>
	<title>Edit Courses</title>

	<!-- Template Main CSS File -->
	<link href="assets/css/style.css" rel="stylesheet">
</head>
<?php
	include('conn1.php');

	$sql = 'SELECT * FROM courses_t WHERE course_id='.$_GET['course_id'];
	$result = mysqli_query($conn1, $sql);

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($conn1);
?>

<style>
	.loginbox{
			width: 500px;
			height: 500px;
			padding: 30px 30px;
		}
</style>

<body>
	<h2>Courses</h2>
	<h3>Edit courses</h3>
	
	<div class="loginbox">
		<form method="post" action="updateCourses.php">
			<table style = "text-align: left">
				<col width="150">
				<col style="text-align: right" width="10">
				<col width="200">

			<tr>
				<th><label>ID <th>:</th></label></th> 
				<th><input type = "text" name = "id" value = '<?php echo $row["course_id"]?>' readonly /> </th>
			</tr>

			<tr>
				<th><label>Course Name <th>:</th></label></th> 
				<th><input type = "text" name = "name" required ="true" value ="<?php echo $row['course_name']?>" /> </th>
			</tr>

			<tr>
				<th><label>Description <th>:</th></label></th>
					<th> <textarea name= "course_description" required = "true" style="width: 200px; height: 100px"><?php echo $row['course_description']?>
					</textarea></th>
			<br/>
			</tr>


			<tr>
				<th><label>Category <th>:</th></label></th> 
				<th><input type = "text" name = "course_category" value = '<?php echo $row["course_category"]?>'/> </th>
			</tr>

			
				<th><input type="Submit" value="Submit">
				<input type="reset" value="Reset"></th>
			</tr>

			</table>
		</form>
	</div>
	
</body>
</html>