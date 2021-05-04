<?php

include('conn1.php');

            $course_id = $_GET['course_id'];
            $lect_id = $_GET['lect_id'];
            $content_week = $_GET['content_week'];
            $content_title = $_GET['content_title'];
            $content_media = $_GET['content_media'];
            
                
            $sql = "INSERT INTO course_content_t (course_id, content_week, content_title, content_media, lect_id) VALUES ('".$course_id."', '".$content_week."', '".$content_title."', '".$content_media."', '".$lect_id."')";


mysqli_query($conn1, $sql);

if (mysqli_affected_rows($conn1)>0) {

    echo "<script>alert('Adding Succesfull!');</script>";
    echo '<script>window.location.href= "viewCourseContent.php";</script>';
}
else {
    echo "<script>alert('Adding Failed!!!');</script>";
    echo '<script>window.location.href= "addCourseContent.php";</script>';
}

mysqli_close($conn1);

echo $sql;



?>