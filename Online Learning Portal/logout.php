<?php
session_start();

session_destroy();
echo '<script>alert("You have successfully logged out")</script>
      <script>window.location.href = "index.php";</script>';
?>