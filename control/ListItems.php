<?php 
/*********************************************************************************
描述：当进入某一门课，把所有的  特定的表  都显示出来
流程：
  1. 得到course_id,Teacher1,course_time1,这些Get方式传过来
  2. 使用year，加上上述的三个attrs，直接在  特定的表  中查找，然后返回结果
Input: 设置_GET['course_id'],_GET['Teacher1'],_GET['course_time1'],填上相应的值，$tablename
Output: $result 这是一个array，里面有所有  特定的表  的属性。
*********************************************************************************/
 ?>
<?php
  function ListItems($tablename)
  {
    include 'db.php';
    if (isset($_GET['course_time1'])) {
      try {
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $year = date("Y");
        $course_id=$_GET["course_id"];
        $Teacher1=$_GET["Teacher1"];
        $course_time1=$_GET["course_time1"];
        $_SESSION["course_id"]=$course_id;
        $_SESSION["Teacher1"]=$Teacher1;
        $_SESSION["course_time1"]=$course_time1;//设置session
        $sql=$conn->prepare("SELECT * from $tablename where year=:year and Teacher1=:Teacher1
         and course_time1=:course_time1 and course_id=:course_id");
        $sql->bindParam(':year',$year);
        $sql->bindParam(':Teacher1',$Teacher1);
        $sql->bindParam(':course_time1',$course_time1);
        $sql->bindParam(':course_id',$course_id);
        $isOK = $sql->execute();
        $result=$sql->fetchAll();//array
        return $result;
      }
      catch(PDOException $e)
      {
        echo "list $tablename failure" . "<br>" . $e->getMessage();
      }
      $conn = null;
      $sql = null;
      return null;
    }
  }
  function ListStuItems($tablename,$student_id)
  {
    include 'db.php';
    if (isset($_GET['course_time1'])) {
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $year = date("Y");
        $course_id=$_GET["course_id"];
        $Teacher1=$_GET["Teacher1"];
        $course_time1=$_GET["course_time1"];
        $_SESSION["course_id"]=$course_id;
        $_SESSION["Teacher1"]=$Teacher1;
        $_SESSION["course_time1"]=$course_time1;//设置session
        $sql=$conn->prepare("SELECT * from $tablename where year=:year and course_id=:course_id and student_id=:student_id");
        $sql->bindParam(':year',$year);
        $sql->bindParam(':course_id',$course_id);
        $sql->bindParam(':student_id',$student_id);
        $isOK = $sql->execute();
        $result=$sql->fetchAll();//array
        return $result;
      }
      catch(PDOException $e)
      {
        echo "list $tablename failure" . "<br>" . $e->getMessage();
      }
      $conn = null;
      $sql = null;
      return null;
    }
  }
  function ListSubmit($tablename)
  {
    include 'db.php';
    if (isset($_GET['course_time1'])) {
      try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        $year = date("Y");
        $course_id=$_GET["course_id"];
        $Teacher1=$_GET["Teacher1"];
        $course_time1=$_GET["course_time1"];
        $_SESSION["course_id"]=$course_id;
        $_SESSION["Teacher1"]=$Teacher1;
        $_SESSION["course_time1"]=$course_time1;//设置session
        $sql=$conn->prepare("SELECT * from $tablename where year=:year and course_id=:course_id");
        $sql->bindParam(':year',$year);
        $sql->bindParam(':course_id',$course_id);
        $sql->bindParam(':student_id',$student_id);
        $isOK = $sql->execute();
        $result=$sql->fetchAll();//array
        return $result;
      }
      catch(PDOException $e)
      {
        echo "list $tablename failure" . "<br>" . $e->getMessage();
      }
      $conn = null;
      $sql = null;
      return null;
    }
  }
  
  
?>