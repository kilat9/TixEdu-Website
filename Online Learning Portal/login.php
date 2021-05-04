<?php 

$logrole = $_POST['logrole'];
$logname = $_POST['logname'];
$logpass = $_POST['logpass'];

session_start();

	include("conn1.php");

	if (mysqli_connect_error()){
		die('Connection ERROR');
	}



if (isset($_POST['logname'])) {
	
if ($logrole =='student_t') {
	$sql = 'SELECT * FROM '.$logrole.' WHERE stu_username = "'.$logname.'" AND stu_password = "'.$logpass.'"';
	$loguname = "stu_username";
	$logid = "stu_id";
	$loginfo = mysqli_query($conn1, $sql);
}
elseif ($logrole == 'lecturer_t') {
	$sql = 'SELECT * FROM '.$logrole.' WHERE lect_username = "'.$logname.'" AND lect_password = "'.$logpass.'"';
	$loguname = "lect_username";
	$logid = "lect_id";
	$loginfo = mysqli_query($conn1, $sql);
}

elseif ($logrole == 'administrator_t') {
	$sql = 'SELECT * FROM '.$logrole.' WHERE admin_username = "'.$logname.'" AND admin_password = "'.$logpass.'"';
	$loguname = "admin_username";
	$logid = "admin_id";
	$loginfo = mysqli_query($conn1, $sql);
}
}

echo "<script>alert($sql)</script>";

	if (mysqli_num_rows($loginfo)==1){
		$row = mysqli_fetch_assoc($loginfo);
		$_SESSION['login'] = $row[$loguname];
		$_SESSION['logrole'] = $logrole;
		$_SESSION['id'] = $row[$logid];
		echo '<script>window.location.href="index.php"</script>';
	}
	else{
		echo "<script>alert('Incorrect username or password entered. Please try again.')</script>";
		echo '<script>window.location.href="login.html"</script>';
	}

	

	

 ?>