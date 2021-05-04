<?php

//Step 1 - Establish Connection
//Step 2 - Handling Connection error
include('conn1.php');

//Step 3 - Execute SQL query
$sql = 'DELETE FROM administrator_t WHERE admin_id= '.$_GET['admin_id'];

if(mysqli_query($conn1,$sql))
	echo '<script>alert("SUCCESSFULLY DELETED")</script>';
else
	echo'<script>alert("CANNOT DELETE DATA")</script>';


//Step 5 - Close Connection
mysqli_close($conn1);

echo'<script>window.location.href="viewData.php"</script>';

?>