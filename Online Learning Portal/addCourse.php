<!DOCTYPE html>
<html>
<head>
	<title>Tix Edu - Add Course</title>

	 <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/venobox/venobox.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">

  <style type="text/css">
    .loginbox{
        width: 500px;
        height: 600px;
        padding: 30px 30px;
    }
  </style>

</head>
<body>
	<div class="loginbox">
    <h1>Add new course</h1>
    <form method="POST">
    <table style = "text-align: left" >
      <col width="150">
      <col style="text-align: right" width="10">
      <col width="200">

    <tr>
      <th><label>Course Name <th>:</th></label></th> 
      <th><input type = "text" name = "course_name" required ="true" /> </th>
    </tr>

   <tr>
      <th><label>Course Description <th>:</th></label></th>
        <th><textarea name= "course_description" required = "true" style="height: 100px"></textarea></th>
    </tr>

    <tr>
      <th>Course Category</th><th>:</th>
        <th>
          <select name="course_category" required="true" >
            <option value="Information Technology">Information Technology</option>
            <option value="Economics">Economics</option>
            <option value="Sciences">Sciences</option>
            <option value="Social/Hobby">Social/Hobby</option>
            <option value="Language">Language</option>
            <option value="Other">Other</option>
          </select>
        </th>
    </tr>

     <tr>
      <th>Course Icon</th><th>:</th>
        <th>
          <select name="course_icon" required="true" >
            <option value="icofont-automation">Automation</option>
            <option value="icofont-code">Code</option>
            <option value="icofont-library">Library</option>
            <option value="icofont-learn">Learn</option>
            <option value="icofont-paper-plane">Paper Plane</option>
            <option value="icofont-royal">Royal</option>
          </select>
        </th>
    </tr>

     <tr>
      <th><label>Lecturer ID <th>:</th></label> </th>
      <th>
        <select name="lect_id" required="true" >
          <?php
            //Step 1 - Establish connection
            //Step 2 - Handling connection error
            include('conn1.php');

            //Step 3 - Execute SQL query
            $sqlLect = 'SELECT lect_id, lect_name
                        FROM LECTURER_T';
            
            $results = mysqli_query($conn1, $sqlLect);

            for($o = 0; $o<mysqli_num_rows($results); $o++) {
              $lecturer = mysqli_fetch_array($results); 
              echo '<option value="'. $lecturer["lect_id"] .'">'. $lecturer["lect_name"] .'</option>';
            }
          ?>
        </select>
      </th>
    </tr>
<br>
     

  </table>
  <br>
  <br>
  <center>

  <input type="reset" value="Reset"></th>
  <input type="Submit" value="Submit">
  </center>
   </form>

   <?php

    if(isset($_POST['lect_id'])){
      $course_name = $_POST['course_name'];
      $course_description = $_POST['course_description'];
      $course_category = $_POST['course_category'];
      $course_icon = $_POST['course_icon'];
      $lect_id = $_POST['lect_id'];
      
      $sql = "INSERT INTO courses_t (course_name, course_description, course_category, course_icon, lect_id) VALUES ('".$course_name."', '".$course_description."', '".$course_category."', '".$course_icon."', '".$lect_id."')";
      print($sql);
      
      mysqli_query($conn1, $sql);
      
      if (mysqli_affected_rows($conn1)>0) 
      
        echo "<script>alert('Adding Succesfull!');</script>";
      else
        echo "<script>alert('Adding Failed!!!');</script>";
      
      mysqli_close($conn1);
    }
   ?>
 
</div>


</body>
</html>