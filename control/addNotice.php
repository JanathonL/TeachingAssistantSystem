<?php
  session_start();
?>

<?php include 'db.php'; ?>
<?php
/*
 id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  year date not null,
  course_id varchar(20)not null,
  Teacher1 varchar(20) not null,
  course_time1 varchar(255) not null,
  message varchar(255),
  pub_date date,
*/
  if (isset($_POST['message'])) {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    	$year=date("Y");
    	$course_id=$_SESSION["course_id"];
    	$Teacher1=$_SESSION["Teacher1"];
    	$course_time1=$_SESSION["course_time1"];
    	$message=$_POST["message"];
      $pub_date=date("Y/m/d");
    	$isOK=false;
    	$sql=$conn->prepare("INSERT INTO Notice 
    		(course_id,Teacher1,year,course_time1,message,pub_date) 
    		VALUES 
    		(:course_id,:Teacher1,:year,:course_time1,:message,:pub_date)");
    	
    	$sql->bindParam(':course_id',$course_id);
    	$sql->bindParam(':Teacher1',$Teacher1);
    	$sql->bindParam(':post_time',$post_time);
    	$sql->bindParam(':year',$year);
    	$sql->bindParam(':course_time1',$course_time1);
      $sql->bindParam(':message',$message);
      $sql->bindParam(':pub_date',$pub_date);
	 	$isOK = $sql->execute();
		$lastId = $conn->lastInsertId();
		if ($isOK==true) {
			echo "add notice successfully";
		}
		else{
			echo "add notice failure";
		}		
    }
    catch(PDOException $e)
    {
      echo "add notice failure" . "<br>" . $e->getMessage();
    }
    $conn = null;
    $sql = null;
  }
?>