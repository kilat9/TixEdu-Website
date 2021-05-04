<?php

//Step 1 - Establish Connection
//Step 2 - Handling Connection error
include('conn1.php');

//Step 3 - Execute SQL query
$sql = "DELETE FROM course_content_t WHERE content_media= ".$_GET['content_media']."'";

if(mysqli_query($conn1,$sql))
	echo '<script>alert("SUCCESSFULLY DELETED")</script>';
else
	echo'<script>alert("CANNOT DELETE DATA")</script>';

echo $sql;
//Step 5 - Close Connection
mysqli_close($conn1);

echo'<script>window.location.href="viewCourseContent.php"</script>';

?>