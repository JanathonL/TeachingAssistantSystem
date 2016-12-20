
<?php 
/*

*/

/*
CREATE TABLE IF NOT EXISTS homework_submit (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  submit_url varchar(255),
  submit_cnt int,     -- 超过限制就不能上传了
  homework_id int,
  name VARCHAR(255),
  course_id varchar(20),
  student_id varchar(20),
  score int,
  PRIMARY KEY (id)
) CHARACTER SET utf8;
*/
/*********************************************************************************
描述：助教点开某次具体作业准备批改
流程：
  1. 助教点开某次具体作业准备批改
  2. 我从homework_submit中找到所有提交过的作业记录。
Input: 
1. $_GET['homeworkid']
Output: $result
*********************************************************************************/
 ?>
<?php include 'db.php'; ?>
<?php
  if (isset($_GET['homeworkid'])) {
    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      $homeworkid= $_GET["homeworkid"];
    	$student_id=$_SESSION["username"];
    	$course_id=$_SESSION["course_id"];
		$sql=$conn->prepare("SELECT * from homework_submit");
    	//$sql=$conn->prepare("SELECT * from homework_submit where submit_cnt>0 and homework_id=:homeworkid");
    	$sql->bindParam(':homeworkid',$homeworkid);
		echo "test";
		$isOK = $sql->execute();
		$result=$sql->fetchAll();//array
		foreach($result as $row){
			echo $row["homework_id"];
		}
    }
    catch(PDOException $e)
    {
      echo "delete homework failure" . "<br>" . $e->getMessage();
    }
    $conn = null;
    $sql = null;
  }
?>