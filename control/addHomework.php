<?php
  session_start();
?>

<?php 
include 'db.php'; 
require 'getId.php';?>
<?php 
/*********************************************************************************
描述：当进入某一门课的作业页面
流程：
  1. 得到所有的参数，然后插入数据到homework表中
Input: 
1. $_POST["homeworkname"];
2. $_POST["type"];
3. $_POST["state"];
4. $_POST["post_time"];
5. $_POST["update_time"];
6. $_POST["submit_limit"];
7. $_POST["answer"];
8. $_POST["content"];
9. $_POST["deadline"];
10.$_POST["score"];
Output: $lastId 这是插入这条记录的id
*********************************************************************************/
 ?>
<?php
/*
type int not null,      -- 作业形式 1选择题，2问答题
  state int not null,     -- 作业批改状态
  year date not null,
  course_id varchar(20)not null,
  Teacher1 varchar(20) not null,
  course_time1 varchar(255) not null,
  name VARCHAR(255),
  content varchar(255),           -- 有图片的用链接
  post_time date,
  update_time date,
  deadline date,
  score int,
  submit_limit int,
  answer varchar(255),


  1. 添加一条作业
  2. 查找这个课程所有的学生
  3. 通过学生id，year，course_id,homework_id,插入成绩0
*/
  if (isset($_POST['homeworkname'])) {
    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      $homeworkname= $_POST["homeworkname"];
    	$type=$_POST["type"];
    	$state=$_POST["state"];
    	$year=date("Y");
    	$course_id=$_SESSION["course_id"];
    	$Teacher1=$_SESSION["Teacher1"];
    	$course_time1=$_SESSION["course_time1"];
    	$post_time=$_POST["post_time"];
    	$update_time=$_POST["update_time"];
    	$submit_limit=$_POST["submit_limit"];
    	$answer=$_POST["answer"];
    	$content=$_POST["content"];
      $deadline=$_POST["deadline"];
      $score=$_POST["score"];
    	$isOK=false;
    	$sql=$conn->prepare("INSERT INTO homework 
    		(name, type,state,course_id,Teacher1,post_time,update_time,submit_limit,answer,content,year,course_time1,deadline,score) 
    		VALUES 
    		(:name,:type,:state,:course_id,:Teacher1,:post_time,:update_time,:submit_limit,:answer,:content,:year,:course_time1,:deadline,:score)");
    	$sql->bindParam(':name',$homeworkname);
    	$sql->bindParam(':type',$type);
    	$sql->bindParam(':state',$state);
    	$sql->bindParam(':course_id',$course_id);
    	$sql->bindParam(':Teacher1',$Teacher1);
    	$sql->bindParam(':post_time',$post_time);
    	$sql->bindParam(':update_time',$update_time);
    	$sql->bindParam(':submit_limit',$submit_limit);
    	$sql->bindParam(':answer',$answer);
    	$sql->bindParam(':content',$content);
    	$sql->bindParam(':year',$year);
    	$sql->bindParam(':course_time1',$course_time1);
      $sql->bindParam(':deadline',$deadline);
      $sql->bindParam(':score',$score);

		$isOK = $sql->execute();
		$lastId = getId("homework",$course_id,$Teacher1,$course_time1,"name",$homeworkname);

      $sql2=$conn->prepare("SELECT userID FROM student_class where year=:year and course_id=:course_id and Teacher1 = :Teacher1 and course_time1=:course_time1");
      $sql2->bindParam(':course_id',$course_id);
      $sql2->bindParam(':Teacher1',$Teacher1);
      $sql2->bindParam(':year',$year);
      $sql2->bindParam(':course_time1',$course_time1);
      $sql2->execute();
      $result = $sql2->fetchAll();
      foreach ($result as $row) {
        $sql3=$conn->prepare("INSERT into homework_submit(year,course_id,student_id,homework_id,score)
          VALUES (:year,:course_id,:student_id,:homework_id,:score)");
        $sql3->bindParam(':course_id',$course_id);
        $sql3->bindParam(':year',$year);
        $sql3->bindParam(':homework_id',$lastId);
        $sql3->bindParam(':student_id',$result["userID"]);
        $sql3->bindParam(':score',"0");
        $isOK = $sql3->execute();
      }
  		if ($isOK==true) {
  			echo "add homework successfully";
  		}
  		else{
  			echo "add homework failure";
  		}		
    }
    catch(PDOException $e)
    {
      echo "add homework failure" . "<br>" . $e->getMessage();
    }
    $conn = null;
    $sql = null;
  }
?>