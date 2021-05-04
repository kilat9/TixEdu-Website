<?php

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
                "UPDATE administrator_t SET
               admin_name = '" . $name .
                "',admin_username = '" . $username .
                "',admin_password = '" . $pass .
                "',admin_phone_number = '" . $phone .
                "',admin_email = '" . $email .
                "',admin_address = '" . $address .
                "',admin_gender = '" . $gender .
                "',admin_age = '" . $age .
                "',admin_dob = '" . $dob .
                "' WHERE admin_id =" . $uid;

                

            mysqli_query($conn1, $sql);

            echo $sql;
            
            

            if (mysqli_affected_rows($conn1)>0) {

                echo "<script>alert('UPDATE Succesfull!');</script>";
                echo ' <script>window.location.href="viewData.php"</script>';
            }
            else{
                echo "<script>alert('UPDATE Failed!!!');</script>";
            }
?>