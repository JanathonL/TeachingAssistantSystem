<?php session_start(); ?>
<?php 
/*
传过来的是course_id，type可以直接从session中拿
1. 先判断用户类别老师或者是其他
if(老师){
  通过course_id和year和老师的ID把所有这个老师的singleclass找出来
}
*/
/*
CREATE TABLE IF NOT EXISTS SingleClass ( -- 一个班级上课的时间地点
  year date not null,
   course_id varchar(20)not null,
   teacher_assistant_id varchar(20) not null,   -- 新增助教
   Teacher1 varchar(20) not null,
   Teacher2 varchar(20),
   Teacher3 varchar(20),
   Teacher4 varchar(20),
   Teacher5 varchar(20),
   course_time1 varchar(255) not null,
   course_place1 varchar(255) not null,
   course_time2 varchar(255),
   course_place2 varchar(255),
   course_time3 varchar(255),
   course_place3 varchar(255),
   course_time4 varchar(255),
   course_place4 varchar(255),
   course_time5 varchar(255),
   course_place5 varchar(255),
   course_time6 varchar(255),
   course_place6 varchar(255),
   PRIMARY KEY (course_id,Teacher1,course_time1,year)
) CHARACTER SET utf8;

*/
/*********************************************************************************
描述：教师点击某门课显示这个课所有的班
流程：
  传过来的是course_id，type可以直接从session中拿
  1. 先判断用户类别老师或者是其他
  if(老师){
    通过course_id和year和老师的ID把所有这个老师的singleclass找出来
  }
Input: 
1. $_GET['course_id']
Output: $result
*********************************************************************************/
 ?>
<?php include 'db.php'; ?>
<?php
  class Course {
    function Course($year, $course_id, $course_name,$Course_type,$language,
                    $introduction, $content, $plan,$English_name,$department,
                    $credit, $prerequisite_course) {
      $this->year = $year;
      $this->course_id = $course_id;
      $this->course_name = $course_name;
      $this->Course_type = $Course_type;
      $this->language = $language;
      $this->introduction = $introduction;
      $this->content = $content;
      $this->plan = $plan;
      $this->English_name = $English_name;
      $this->department = $department;
      $this->credit = $credit;
      $this->prerequisite_course = $prerequisite_course;      
    }
  }
  if (isset($_GET['course_id'])) {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $type=$_SESSION["type"];
      $course_id=$_GET["course_id"];
      $_SESSION["course_id"]=$course_id;  //这句话绑定course_id
      $year=date("Y");
      if($type==3){//老师
        $id=$_SESSION["username"];
        $sql1=$conn->prepare("SELECT * from SingleClass where year=:year and course_id=:course_id 
          and Teacher1=:id or Teacher2=:id or Teacher3=:id or Teacher4=:id or Teacher5=:id");
        $sql1->bindParam(':year',$year);
        $sql1->bindParam(':id',$id);
        $sql1->bindParam(':course_id',$course_id);
        $sql1->execute();
        $result=$sql1->fetchAll();//可以使用foreach提取东西
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