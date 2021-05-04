<!DOCTYPE html>
<html>
<head>
  <title>Edit Profile</title>

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
  <style type="text/css">
    .loginbox{
        width: 500px;
        height: 730px;
        padding: 30px 30px;
    }

  </style>
</head>

<?php
  include('conn1.php');

  session_start();
  
  if(isset($_GET['admin_id'])){
    $sql = 'SELECT * FROM administrator_t WHERE admin_id='. $_GET['admin_id'];
  } else {
    $sql = 'SELECT * FROM administrator_t WHERE admin_id="'.$_SESSION['id'].'"';
  }

  $result = mysqli_query($conn1, $sql);

  $row = mysqli_fetch_assoc($result);

  mysqli_free_result($result);
  mysqli_close($conn1);
?>

<body>
  <h2>Administrator</h2>
  <h3>Edit profile</h3>

  <div class="loginbox">
    <form method="post" action="updateAdmin.php">
      <table style = "text-align: left">

        <tr>
          <th><label>ID <th>:</th></label></th> 
          <th><input type = "text" name = "id" value = '<?php echo $row["admin_id"]?>' readonly /> </th>
        </tr>

        <tr>
          <th><label>Name <th>:</th></label></th> 
          <th><input type = "text" name = "full_name" required ="true" value ="<?php echo $row['admin_name']?>" /> </th>
        </tr>

        <tr>
          <th><label>Username <th>:</th></label></th> 
          <th><input type = "text" name = "username" value = '<?php echo $row["admin_username"]?>' /> </th>
        </tr>


        <tr>
          <th><label>Password <th>:</th></label></th> 
          <th><input type = "text" name = "password" value = '<?php echo $row["admin_password"]?>'/> </th>
        </tr>


        <tr>
          <th><label>Phone Number <th>:</th></label></th>
          <th><input type = "tel" name = "phone_num" pattern="[0-9]{10-12}" required ="true" value ="<?php echo $row['admin_phone_number']?>" /></th>
        </tr>

        <tr>
          <th><label>Email <th>:</th></label> </th>
          <th><input type = "Email" name = "email" required="required" value ="<?php echo $row['admin_email']?>">
          </th>
        </tr>

        <tr>
          <th><label>Home address <th>:</th></label></th>
            <th><textarea name= "home_address" required = "true"><?php echo $row['admin_address']?></textarea></th>
        </tr>

        <tr>
          <th><label>Gender<th>:</th></label></th>
          <th><input type="Radio" name="gender" value="male" required="" 
            <?php if($row['admin_gender']=='male') echo "checked = 'checked'"?>/>Male 

            <input type="Radio" name="gender" value="female" required="" 
            <?php if($row['admin_gender']=='female') echo "checked = 'checked'"?>/>Female
          </th>
        </tr>


        <tr>
          <th><label>Date of Birth <th>:</th></label></th>
          <th><input type="Date" name="dob" value ="<?php echo $row['admin_dob']?>"></th>
        </tr>

        <tr>
          <th><label>Age <th>:</th></label> </th>
          <th><input type = "number" name = "age" required="required" value ="<?php echo $row['admin_age']?>">
          </th>
        </tr>
      </table>
      <center>
        <input type="reset" value="Reset">
        <input type="submit" value="Save Changes">
      </center>
    </form>
  </div>
  
</body>
</html>