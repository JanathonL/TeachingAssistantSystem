<?php
  session_start();
  if (isset($_SESSION['username'])) {
    unset($_SESSION['username']);
    $_SESSION['message'] = "注销成功";
    $_SESSION['message_type'] = "success";
  }
  header("location: ../allCourse.php");
  exit;
 ?>
