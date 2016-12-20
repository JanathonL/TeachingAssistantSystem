<?php
  session_start();
  if (!isset($_SESSION['username'])) {
    $_SESSION['message'] = "请先登录";
    $_SESSION['message_type'] = "warning";
    header("location: ../tas/allCourse.php");
    exit;
  }
  #echo '<link href="zfb.ico" rel="shortcut icon">'
?>
