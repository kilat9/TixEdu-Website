<?php

$name = $_GET['full_name'];
$user_username = $_GET['username'];
$pass = $_GET['input1'];
$phone_num = $_GET['phone_num'];
$email_address = $_GET['email'];
$home_address = $_GET['home_address'];
$gender = $_GET['gender'];
$age = $_GET['age'];
$dob = $_GET['dob'];
$role = 'student';

$cpassword = $_GET['confirmPass'];

if ($pass!= $cpassword){
	echo '<script>alert("Password and Confirm Password not match!")</script>';
	echo '<script>window.location.href="registerStudent.html"</script>';
}

include("conn1.php");

$sql = "INSERT INTO `student_t`(`stu_name`, `stu_age`, `stu_gender`, `stu_dob`, `stu_phone_number`, `stu_address`, `stu_email`, `stu_username`, `stu_password`) VALUES ('".$name."', '".$age."','".$gender."','".$dob."','".$phone_num."','".$home_address."','".$email_address."','".$user_username."','".$pass."')";

mysqli_query($conn1, $sql);

if (mysqli_affected_rows($conn1)>0) 

	echo "<script>alert('Adding Succesfull!');</script>";
else
	echo "<script>alert('Adding Failed!!!');</script>";



mysqli_close($conn1);

echo '<script>window.location.href= "login.html";</script>';

?>