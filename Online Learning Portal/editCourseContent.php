<!DOCTYPE html>
<html>
<head>
	<title>Edit Course Content</title>

	
  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style type="text/css">

    .loginbox{
        width: 700px;
        height: 500px;
        padding: 30px 30px;
    }

  </style>
</head>
<?php
	include('conn1.php');

	$sql = "SELECT * FROM course_content_t WHERE content_media='".$_GET['content_media']."'";

	$result = mysqli_query($conn1, $sql);

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($conn1);
?>

<body>
	<h2>Courses</h2>
	<h3>Edit courses</h3>
		
	<div class="loginbox">
		<form method="post" action="updateCourseContent.php">
			<table style = "text-align: left">
				<col width="150">
				<col style="text-align: right" width="10">
				<col width="200">

			<tr>
				<th><label>Course ID <th>:</th></label></th> 
				<th><input type = "text" name = "course_id" value = '<?php echo $row["course_id"]?>' readonly style="width: 50px" min="1"/> </th>
			</tr>

			<tr>
				<th><label>Week <th>:</th></label></th> 
				<th><input type = "number" name = "content_week" required ="true" value ="<?php echo $row['content_week']?>" style="width: 50px"/> </th>
			</tr>


			<tr>
				<th><label>Content Title <th>:</th></label></th> 
				<th><input type = "text" name = "content_title" value = '<?php echo $row["content_title"]?>'style="width: 500px"/> </th>
			</tr>


			<tr>
				<th><label>Video Link <th>:</th></label></th> 
				<th><input type = "text" name = "content_media" value = '<?php echo $row["content_media"]?>'style="width: 500px"/> </th>
			</tr>

			<tr>
				<th><label>Lecturer ID <th>:</th></label></th> 
				<th><input type = "number" name = "lect_id" value = '<?php echo $row["lect_id"]?>'style="width: 50px" min="1"/> </th>
			</tr>

			
				<th><input type="Submit" value="Submit">
				<input type="reset" value="Reset"></th>
			</tr>

		</table>
		</form>
</div>
</body>
</html>