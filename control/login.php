<?php include 'db.php'; ?>
<?php
  if (isset($_POST['username'])) {
    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      $userID= $_POST["username"];
    	$password=$_POST["password"];
    	$name="";
    	$type="";
    	$Is_find=0;
    	$sql="select * from ordinaryuser";
    	foreach($conn->query($sql) as $row){
    		if($row["userID"]===$userID
    			 &&$row["password"]===$password){
    			$type=$row["type"];
    			$name=$row["userID"];
    			$Is_find=1;
        }
      }
    }
    catch(PDOException $e)
    {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;

    if ($Is_find==1) {
        $_SESSION['username'] = $name;
        $_SESSION['type'] = $type;
    }
    else {
       $_SESSION['message'] = "账号密码错误";
       $_SESSION['message_type'] = "warning";
    }

    if (isset($_SESSION['username'])) {
      $_SESSION['message'] = "登录成功";
      $_SESSION['message_type'] = "success";
      header("location: mycourses.php");
      exit;
    }
  }
?>
