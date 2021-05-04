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
                "UPDATE lecturer_t SET
               lect_name = '" . $name .
                "',lect_username = '" . $username .
                "',lect_password = '" . $pass .
                "',lect_phone_number = '" . $phone .
                "',lect_email = '" . $email .
                "',lect_address = '" . $address .
                "',lect_gender = '" . $gender .
                "',lect_age = '" . $age .
                "',lect_dob = '" . $dob .
                "' WHERE lect_id =" . $uid;

                

            mysqli_query($conn1, $sql);

            echo $sql;
            
            

            if (mysqli_affected_rows($conn1)>0) {

                echo "<script>alert('UPDATE Succesfull!');</script>";

                if ($_SESSION['logrole'] != 'lecturer_t'){
                    echo ' <script>window.location.href="viewData.php"</script>';
                    } else {
                        echo ' <script>window.location.href="editLecturer.php"</script>';
                    }
            }
            else{
                echo "<script>alert('UPDATE Failed!!!');</script>";
            }
?>