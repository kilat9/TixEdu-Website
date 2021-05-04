<?php

include('conn1.php');

            $course_id = $_POST['course_id'];
            $content_week = $_POST['content_week'];
            $content_title = $_POST['content_title'];
            $content_media = $_POST['content_media'];
            $lect_id = $_POST['lect_id'];
            
                
            $sql = 
                "UPDATE course_content_t SET
               content_week = '" . $content_week .
                "',content_title = '" . $content_title .
                "',content_media = '" . $content_media .
                "' WHERE course_id =" . $course_id.
                " AND content_week=" .$content_week;

                

                

            mysqli_query($conn1, $sql);

            echo $sql;
            
            

            if (mysqli_affected_rows($conn1)>0) {

                echo "<script>alert('UPDATE Succesfull!');</script>";
                echo ' <script>window.location.href="viewCourseContent.php"</script>';
            }
            else{
                echo "<script>alert('UPDATE Failed!!!');</script>";
                echo ' <script>window.location.href="editCourseContent.php"</script>';
            }
?>