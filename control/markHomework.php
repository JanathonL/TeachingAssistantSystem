<?php session_start(); ?>
<?php 
/*********************************************************************************
描述：助教点开某次具体作业准备批改
流程：
  1. 助教针对某次作业进行批改
  2. 先下载学生提交的作业
  3. 填好表单，进行批改，post过来的是score和评语feedback
Input:
1. $_GET['homeworksubmitid']
2. $_POST["score"];
3. $_POST["feedback"];
Output: $isOK
*********************************************************************************/
 ?>
 <?php include 'db.php'; ?>
<?php
  if (isset($_GET['homeworksubmitid'])) {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $homeworksubmitid= $_GET["homeworksubmitid"];
    	$score=$_POST["score"];
    	$feedback=$_POST["feedback"];
    	$sql=$conn->prepare("UPDATE homework_submit set score=:score and feedback=:feedback where id=:id");
    	$sql->bindParam(':id',$homeworksubmitid);
    	$sql->bindParam(':score',$score);
    	$sql->bindParam(':feedback',$feedback);
		  $isOK = $sql->execute();
    }
    catch(PDOException $e)
    {
      echo "delete homework failure" . "<br>" . $e->getMessage();
    }
    $conn = null;
    $sql = null;
  }
?>