<!DOCTYPE html>
<html>
<head>
	<title>Edit Profile</title>

	<!-- Template Main CSS File -->
  	<link href="assets/css/style.css" rel="stylesheet">
</head>

<?php
	include('conn1.php');

	session_start();

	if(isset($_GET['stu_id'])){
		$sql = 'SELECT * FROM student_t WHERE stu_id='.$_GET['stu_id'];
	} else{
		$sql = 'SELECT * FROM student_t WHERE stu_id="'.$_SESSION['id'].'"';
	}

	$result = mysqli_query($conn1, $sql);

	$row = mysqli_fetch_assoc($result);

	mysqli_free_result($result);
	mysqli_close($conn1);
?>

<style>
	.loginbox{
			width: 500px;
			height: 730px;
			padding: 30px 30px;
		}
</style>

<body>
	<h2>Student</h2>
	<h3>Edit profile</h3>
	
	<div class="loginbox">
		<form method="post" action="updateStudent.php">
			<table style = "text-align: left">

				<tr>
					<th><label>ID <th>:</th></label></th> 
					<th><input type = "text" name = "id" value = '<?php echo $row["stu_id"]?>' readonly /> </th>
				</tr>

				<tr>
					<th><label>Name <th>:</th></label></th> 
					<th><input type = "text" name = "full_name" required ="true" value ="<?php echo $row['stu_name']?>" /> </th>
				</tr>

				<tr>
					<th><label>Username <th>:</th></label></th> 
					<th><input type = "text" name = "username" value = '<?php echo $row["stu_username"]?>' /> </th>
				</tr>


				<tr>
					<th><label>Password <th>:</th></label></th> 
					<th><input type = "text" name = "password" value = '<?php echo $row["stu_password"]?>'/> </th>
				</tr>


				<tr>
					<th><label>Phone Number <th>:</th></label></th>
					<th><input type = "tel" name = "phone_num" required ="true" pattern="[0-9]{10-12}" value ="<?php echo $row['stu_phone_number']?>" /></th>
				</tr>

				<tr>
					<th><label>Email <th>:</th></label> </th>
					<th><input type = "Email" name = "email" required="required" value ="<?php echo $row['stu_email']?>"></th>
				</tr>

				<tr>
					<th><label>Home address <th>:</th></label></th>
						<th><textarea name= "home_address" required = "true"><?php echo $row['stu_address']; ?></textarea></th>
				</tr>

				<tr>
					<th><label>Gender<th>:</th></label></th>
					<th><input type="Radio" name="gender" value="male" required="" 
						<?php if($row['stu_gender']=='male') echo "checked = 'checked'"?>/>Male 

						<input type="Radio" name="gender" value="female" required="" 
						<?php if($row['stu_gender']=='female') echo "checked = 'checked'"?>/>Female
					</th>
				</tr>


				<tr>
					<th><label>Date of Birth <th>:</th></label></th>
					<th><input type="Date" name="dob" value ="<?php echo $row['stu_dob']?>"></th>
				</tr>

				<tr>
					<th><label>Age <th>:</th></label> </th>
					<th><input type = "number" name = "age" required="required" value ="<?php echo $row['stu_age']?>">
					</th>
				</tr>
			</table>
			<center>
				<input type="reset" value="Reset">
				<input type="submit" value="Save Changes">
			</center>
		</form>
	</div>
</body>
</html>