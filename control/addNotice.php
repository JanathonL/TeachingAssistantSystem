<?php
  session_start();
?>

<?php include 'db.php'; ?>
<?php 
require 'getFourKeyAttrs.php';
require 'getId.php'; 
?>
<?php 
/*********************************************************************************
描述：当进入某一门课的页面
流程：
  1. 得到所有的参数，然后插入数据到notice表中
Input:$_POST["message"];
Output: $lastId 这是插入这条记录的id
*********************************************************************************/
 ?>
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
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
    	
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
		$lastId = getId("Notice",$course_id,$Teacher1,$course_time1,"message",$message);
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