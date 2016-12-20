
<?php 
  session_start();
?>
<?php
require 'uploadFile_function.php';
$year=date("Y");
$course_id=$_SESSION["course_id"];
$Teacher1=$_SESSION["Teacher1"];
$course_time1=$_SESSION["course_time1"];
$url='upload/'.$year.'/'.$course_id.'/'.$Teacher1.'/'.$course_time1;
$fullurl=uploadFile($url);

?>
<?php include 'db.php'; 
require 'getId.php';?>
<?php 
/*********************************************************************************
描述：上传资料

Input:
1. $_POST["name"];
2. $_POST["content"];
Output: $lastId,$isOK
*********************************************************************************/
 ?>
<?php
/*
CREATE TABLE IF NOT EXISTS material (
  id INT UNSIGNED NOT NULL AUTO_INCREMENT,
  year date not null,
  course_id varchar(20)not null,
  Teacher1 varchar(20) not null,
  course_time1 varchar(255) not null,
  name VARCHAR(255),
  content varchar(255),   -- 描述       
  post_time date,
  update_time date,
  url varchar(255),
  PRIMARY KEY (id)
) CHARACTER SET utf8;
*/
  if ($fullurl!=null) {
    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      
      $name=$_POST["name"];
      $content=$_POST["content"];
      $post_time=date("Y/m/d");
      $update_time=date("Y/m/d");
      
      $isOK=false;
      $sql=$conn->prepare("INSERT INTO material 
        (course_id,Teacher1,post_time,update_time,content,year,course_time1,name,url) 
        VALUES 
        (:course_id,:Teacher1,:post_time,:update_time,:content,:year,:course_time1,:name,:url)");
      

      $sql->bindParam(':course_id',$course_id);
      $sql->bindParam(':Teacher1',$Teacher1);
      $sql->bindParam(':post_time',$post_time);
      $sql->bindParam(':update_time',$update_time);
      $sql->bindParam(':content',$content);
      $sql->bindParam(':year',$year);
      $sql->bindParam(':course_time1',$course_time1);
      $sql->bindParam(':name',$name);
      $sql->bindParam(':url',$url);
      
      $isOK = $sql->execute();
      $lastId = getId("material",$course_id,$Teacher1,$course_time1,"name",$name);
    if ($isOK==true) {
      echo "add permission successfully";
    }
    else{
      echo "add permission failure";
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
