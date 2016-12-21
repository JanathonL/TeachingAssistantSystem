<?php
  if (isset($_SESSION['message'])) {
    echo "<div class='alert alert-dismissible alert-";
    switch ($_SESSION['message_type']) {
      case "success";
        echo "success'>";
        break;
      case "info":
        echo "info'>";
        break;
      case "warning":
        echo "warning'>";
        break;
      case "danger":
        echo "danger'>";
        break;
      default:
        echo "info'>";
        break;
    }
    echo "<button type='button' class='close' data-dismiss='alert' aria-label='Close'><span aria-hidden='true'>&times;</span></button>";
    echo $_SESSION["message"]."</div>";
    unset($_SESSION["message"]);
    unset($_SESSION["message_type"]);
  }
?>
