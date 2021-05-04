<?php
    session_start();
    include('conn1.php');

        $courseId = $_POST['courseId'];

        $sqlStudentCourse = 'SELECT *
                             FROM STUDENT_COURSE_T
                             WHERE stu_id = "'. $_SESSION['id'] .'" AND course_id = "'. $courseId .'"';

        $enroll = mysqli_query($conn1, $sqlStudentCourse);
        $student_course = mysqli_fetch_assoc($enroll);
        $student_week = $student_course['sc_week'];

        $courseName = $_POST['courseName'];
        $totalWeeks = $_POST['totalWeeks'];
        $studentWeek = $_POST['studentWeek'];
        if ($studentWeek == $student_week){
            if ($studentWeek >= $totalWeeks) {
                $studentWeek = $student_week;
            } else {
                $studentWeek = $_POST['studentWeek'] + 1;
            }
            $weekProgress = round(($studentWeek/ $_POST['totalWeeks']) * 100);

                $sql = 
                    "UPDATE STUDENT_COURSE_T SET
                    sc_week = " . $studentWeek .
                    ", sc_progress = " . $weekProgress . 
                    " WHERE stu_id = '". $_SESSION['id'] ."'
                    AND course_id = '". $courseId ."'";

                mysqli_query($conn1, $sql);
        }
                if (mysqli_affected_rows($conn1)>0) {
                    echo ' <script>window.location.href="course-page.php?course_name='. $_POST['courseName'] .'"</script>';
                }
                else{
                    echo "<script>alert('UPDATE Failed!!!');</script>";
                }
?>