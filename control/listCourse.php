<?php 
/*
1. 先判断用户类别老师或者是其他
if(老师){
  利用year,Teacher1 or Teacher2 or Teacher3 or Teacher4 or Teacher5搜索SingleClass
  得到结果合并起来
  然后通过course_id和year查找相关课程信息，然后合并成一个array 
}
else if(学生){
  利用userID，student_class里找到course_id
  然后通过course_id和year查找相关课程信息，然后合并成一个array
}
else if(助教){
  利用助教userID，SingleClass里找到course_id
  然后通过course_id和year查找相关课程信息，然后合并成一个array
}
*/
/*********************************************************************************
Input: 设置_GET['listCourse']，里面可以不用有值
Output: 
1. courseList 一个数组，里面的对象就是Course类（所有用户都会得到）
2. $result_student （只有学生可以得到这个，里面包含了year，course_id,course_time1,Teacher1信息）
3. $result_teacher_assistant
(只有助教可以得到这个，里面包含了year，course_id,course_time1,Teacher1信息)
4. $result_administrator 
（只有管理员可以得到这个，里面包含了year，course_id,course_time1,Teacher1信息）
*********************************************************************************/
 ?>
<?php include 'db.php'; ?>
<?php
  /**
  * 
  */
  require 'getSingleClass.php';
  class Course {
    function Course($year, $course_id, $course_name,$Course_type,$language,
                    $introduction, $content, $plan,$English_name,$department,
                    $credit, $prerequisite_course, $Teacher1, $course_time1) {
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
      $this->Teacher1 = $Teacher1;
      $this->course_time1 = $course_time1;    
    }
  }
  if (isset($_GET['listCourse'])) {
    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      $type=$_SESSION["type"];
      $year=date("Y");
      if($type==3){//老师
        $id=$_SESSION["username"];
        $sql1=$conn->prepare("SELECT course_id from SingleClass where year=:year and Teacher1=:id or Teacher2=:id or Teacher3=:id or Teacher4=:id or Teacher5=:id");
        $sql1->bindParam(':year',$year);
        $sql1->bindParam(':id',$id);
        $sql1->execute();
        $result=$sql1->fetchAll();
      }
      else if ($type==1) {//学生
        $userID=$_SESSION["username"];
        $sql2=$conn->prepare("SELECT course_id from student_class where userID=:userID and year=:year");
        $sql2->bindParam(':userID',$userID);
        $sql2->bindParam(':year',$year);
        $sql2->execute();
        $result=$sql2->fetchAll();
        $sql_student=$conn->prepare("SELECT * from student_class where userID=:userID and year=:year");
        $sql_student->bindParam(':userID',$userID);
        $sql_student->bindParam(':year',$year);
        $sql_student->execute();
        $result_student=$sql_student->fetchAll();//所有学生相关的某个班的信息
        $single_class=$result_student;
      }
      else if ($type==2) {//助教
        $teacher_assistant_id=$_SESSION["username"];
        $sql3=$conn->prepare("SELECT course_id from SingleClass where teacher_assistant_id=:teacher_assistant_id and year=:year");
        $sql3->bindParam(':teacher_assistant_id',$teacher_assistant_id);
        $sql3->bindParam(':year',$year);
        $sql3->execute();
        $result=$sql3->fetchAll();
        $sql_teacher_assistant=$conn->prepare("SELECT * from SingleClass where userID=:userID and year=:year");
        $sql_teacher_assistant->bindParam(':userID',$userID);
        $sql_teacher_assistant->bindParam(':year',$year);
        $sql_teacher_assistant->execute();
        $result_teacher_assistant=$sql_teacher_assistant->fetchAll();
        //所有助教相关的某个班的信息
        $single_class=$result_teacher_assistant;
      }
      else{
        $sql4=$conn->prepare("SELECT course_id from Course where year=:year");
        $sql4->bindParam(':year',$year);
        $sql4->execute();
        $result=$sql4->fetchAll();
        $sql_administrator=$conn->prepare("SELECT * from SingleClass where year=:year");
        $sql_administrator->bindParam(':year',$year);
        $sql_administrator->execute();
        $result_administrator=$sql_administrator->fetchAll();//管理员直接显示所有的单个课程信息
        $single_class=$result_administrator;
      }

      $courseList=array();//result array包括了所有的课程基本东西
      foreach ($result as $row) {
        $sql5=$conn->prepare("SELECT * from Course where year=:year and course_id=:course_id");
        $sql5->bindParam(':year',$year);
        $sql5->bindParam(':course_id',$row["course_id"]);
        $sql5->execute();
        $single_course=$sql5->fetchObject();

        $class=getSingleClass($row["course_id"],$single_class);
        array_push($courseList,new Course($year,$row["course_id"], 
                    $single_course->course_name,$single_course->Course_type,
                    $single_course->language,
                    $single_course->introduction, 
                    $single_course->content, 
                    $single_course->plan,$single_course->English_name,
                    $single_course->department,
                    $single_course->credit, $single_course->prerequisite_course,
                    $class["Teacher1"],$class["course_time1"]));
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