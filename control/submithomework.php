<?php 
session_start();
 ?>
<?php
/*

*/ 
/*********************************************************************************
描述：助教点开某次具体作业准备批改
流程：
  	如果是在线的选择题作业，type=1，else type=2
	if(submit_cnt<submit_limit){
		if(选择题){
			通过homework_id去数据库里搜索
			对比答案
			然后更新homework_submit的submit_cnt和score
		}
		else{
			把作业存在一个特定的地方
			然后更新homework_submit的submit_cnt和submit_url
		}
	}
Input:
1. $_GET['homeworkid']
2. $_POST["answer"] 如果是选择题
3. 否则就是上传文件
Output: $isOK
*********************************************************************************/
  ?>
<?php include 'db.php'; ?>
<?php require 'setMessage.php'; ?>
<?php 
require 'uploadFile_function.php';
?>
<?php

  if (isset($_GET['homeworkid'])) {
    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username $password);

      	$year=date("Y");
		$course_id=$_SESSION["course_id"];
		$Teacher1=$_SESSION["Teacher1"];
		$course_time1=$_SESSION["course_time1"];
		$url='submit/'.$year.'/'.$course_id.'/'.$Teacher1.'/'.$course_time1;

      	$homeworkid= $_GET["homeworkid"];
    	$type=$_GET["type"];
    	$student_id=$_SESSION["username"];
    	$submitSuccess=false;
    	$sql=$conn->prepare("SELECT * from homework where id=:homeworkid");
    	$sql->bindParam(':homeworkid',$homeworkid);
    	$sql->execute();
    	$result1=$sql->fetchObject();
    	$submit_limit=$result1["submit_limit"];

    	$sql2=$conn->prepare("SELECT submit_cnt from homework_submit where homework_id=:homeworkid and course_id=:course_id and student_id=:student_id");
    	
    	$sql2->bindParam(':homeworkid',$homeworkid);
    	$sql2->bindParam(':course_id',$course_id);
    	$sql2->bindParam(':student_id',$student_id);
    	
	   	$sql2->execute();
	   	$result2=$sql2->fetchObject();
	   	$submit_cnt=$result2["submit_cnt"];
	   	if ($submit_limit>$submit_cnt) {
	   		$sql3=$conn->prepare("UPDATE homework_submit 
	   			set score=:score, submit_cnt=+1,submit_url=:submit_url
	   			where homework_id=:homeworkid and course_id=:course_id 
	   			and student_id=:student_id");
	   		$sql3->bindParam(':homeworkid',$homeworkid);
    		$sql3->bindParam(':course_id',$course_id);
    		$sql3->bindParam(':student_id',$student_id);
	   		if($type=="1"){	   				   			
	   			if($_POST["answer"]==$result1["answer"]){
	   				$score=$result1["score"];   				
	   			}
	   			else{
	   				$score=0;
	   			}
	   			$submit_url=null;
	   			$sql3->bindParam(':score',$score);
	   			$sql3->bindParam(':submit_url',$submit_url);
	   			$submitSuccess=$sql3->execute(); 
	   		}
	   		else{
	   			$submit_url=uploadFile($url);
	   			$score=0;
	   			$sql3->bindParam(':submit_url',$submit_url);
	   			$sql3->bindParam(':score',$score);
	   			$sql3->execute();
	   		}
	   	}		
    }
    catch(PDOException $e)
    {
      echo "add submithomework failure" . "<br>" . $e->getMessage();
    }
    if($submitSuccess){
	   	successMessage("提交作业成功");
	}
	else{
	   	failureMessage("提交作业失败");
	}
    $conn = null;
    $sql = null;
  }
?>