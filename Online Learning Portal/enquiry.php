<?php
  session_start();
  include('conn1.php');

    $enq_name = $_POST['name'];
    $enq_email = $_POST['email'];
    $enq_subject = $_POST['subject'];
    $enq_message = $_POST['message'];

    $stu_id = NULL;
    if (isset($_SESSION['logrole'])){
      if ($_SESSION['logrole'] == 'student_t'){
        $stu_id = $_SESSION['id'];
      }
    }
        
    $sql = "INSERT INTO enquiry_t (enq_name, enq_email, enq_subject, enq_message, stu_id) 
            VALUES ('".$enq_name."', '".$enq_email."', '".$enq_subject."', '".$enq_message."', '".$stu_id."')";

mysqli_query($conn1, $sql);

if (mysqli_affected_rows($conn1)>0) 

    echo "<script>alert('Message Sent');</script>";
else
    echo "<script>alert('Message Failed!!!');</script>";



mysqli_close($conn1);

echo $sql;

echo '<script>window.location.href= "contact.php";</script>';

?>
