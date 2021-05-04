<?php
session_start();
include('conn1.php');

            $uid = $_POST['id'];
            $name = $_POST['full_name'];
            $username = $_POST['username'];
            $pass = $_POST['password'];
            $phone = $_POST['phone_num'];
            $email = $_POST['email'];
            $address = $_POST['home_address'];
            $gender = $_POST['gender'];
            $age = $_POST['age'];
            $dob = $_POST['dob'];
                
            $sql = 
                "UPDATE student_t SET
               stu_name = '" . $name .
                "',stu_username = '" . $username .
                "',stu_password = '" . $pass .
                "',stu_phone_number = '" . $phone .
                "',stu_email = '" . $email .
                "',stu_address = '" . $address .
                "',stu_gender = '" . $gender .
                "',stu_age = '" . $age .
                "',stu_dob = '" . $dob .
                "' WHERE stu_id =" . $uid;

                

            mysqli_query($conn1, $sql);

            echo $sql;
            
            

            if (mysqli_affected_rows($conn1)>0) {
                echo "<script>alert('UPDATE Succesfull!');</script>";

                if ($_SESSION['logrole'] != 'student_t'){
                echo ' <script>window.location.href="viewData.php"</script>';
                } else {
                    echo ' <script>window.location.href="editStudent.php"</script>';
                }
            }
            else{
                echo "<script>alert('UPDATE Failed!!!');</script>";
            }
?>