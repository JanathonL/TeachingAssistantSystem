<?php
  session_start();
?>
<?php 
/*
1. 老师点击查找学生
2. 这时候老师是已经在某一个班级里面了，所有的这个班级的信息都已经有了
3. 直接搜索选了这个班级的学生，通过student_class这个表
4. 然后使用userID通过ordinaryuser这个表找到学生的名字
5. 通过UserID和course_id还有year找到学生这门课的信息
6. 如果要显示这个学生各次作业的信息，通过course_id和userID进行查找学生各次作业的情况按作业的ID号升序。
*/ 
/*********************************************************************************
描述：返回所有的学生
Input:
1. $_GET['searchStudent']   不用设置值
Output: $result_students
*********************************************************************************/
?>
<?php include 'db.php'; ?>
<?php

  class Student {
    function Student($userID, $username, $score_100,$homework_score,$homework_id) {
      $this->userID = $userID;
      $this->username = $username;
      $this->score_100 = $score_100;
      $this->homework_score=$homework_score; //array
      $this->homework_id=$homework_id;       //array
    }
  }
  if (isset($_GET['searchStudent'])) {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $year=date("Y");
      $course_id=$_SESSION["course_id"];
      $Teacher1=$_SESSION["Teacher1"];
      $course_time1=$_SESSION["course_time1"];
    	$Is_find=0;
    	$sql=$conn->prepare("SELECT userID FROM student_class where year=:year and course_id=:course_id and Teacher1 = :Teacher1 and course_time1=:course_time1");
      $sql->bindParam(':course_id',$course_id);
      $sql->bindParam(':Teacher1',$Teacher1);
      $sql->bindParam(':year',$year);
      $sql->bindParam(':course_time1',$course_time1);
      $sql->execute();
      $result = $sql->fetchAll();
      $sql2=$conn->prepare("SELECT username FROM ordinaryuser where userID=:userID");
      $sql3=$conn->prepare("SELECT score_100 FROM student_grade where userID=:userID and year=:year and course_id=:course_id");
      $sql3->bindParam(':course_id',$course_id);
      $sql3->bindParam(':year',$year);
      $sql4=$conn->prepare("SELECT homework_id,name,score FROM homework_submit where student_id=:userID and course_id=:course_id ORDER BY homework_id");
      $sql4->bindParam(':course_id',$course_id);
      $result_students=array();                //这个是最后的结果
    	foreach($result as $row){
        $userID=$row["userID"];
        $sql2->bindParam(':userID',$row["userID"]);
    		$sql2->execute();
        $result2=$sql2->fetchObject();
        $sql3->bindParam(':userID',$row["userID"]);
        $sql3->execute();
        $result3=$sql3->fetchObject();
        $sql4->bindParam(':userID',$row["userID"]);
        $sql4->execute();
        $result4=$sql4->fetchAll();
        $username=$result2["username"];
        $score_100=$result3["score_100"];
        $homework_score=array();
        $homework_id=array();
        foreach ($result4 as $row4) {
          array_push($homework_score,$row4["score"]);
          array_push($homework_id,$row4["homework_id"]);
        }
        array_push($result_students, new Student($userID, $username, $score_100,$homework_score,$homework_id));
      }

      //echo json_encode($result_students);

    }
    catch(PDOException $e)
    {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
  }
?>
