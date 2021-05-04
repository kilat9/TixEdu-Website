<?php

include('conn1.php');

            $id = $_POST['id'];
            $course_name = $_POST['name'];
            $course_description = $_POST['course_description'];
            $course_category = $_POST['course_category'];
            
                
            $sql = 
                "UPDATE courses_t SET
               course_name = '" . $course_name .
                "',course_description = '" . $course_description .
                "',course_category = '" . $course_category .
                "' WHERE course_id =" . $id;

                

                

            mysqli_query($conn1, $sql);

            echo $sql;
            
            

            if (mysqli_affected_rows($conn1)>0) {

                echo "<script>alert('UPDATE Succesfull!');</script>";
                echo ' <script>window.location.href="viewCourses.php"</script>';
            }
            else{
                echo "<script>alert('UPDATE Failed!!!');</script>";
                echo ' <script>window.location.href="viewCourses.php"</script>';
            }
?>