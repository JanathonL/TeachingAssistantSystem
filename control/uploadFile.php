
<?php 
  session_start();
?>
<?php
$uploadSuccess=false;
if (isset($_FILES["file"])) {
  if ((($_FILES["file"]["type"] == "application/octet-stream")  //rar,7z
  || ($_FILES["file"]["type"] == " application/zip")   //zip
  || ($_FILES["file"]["type"] == " application/msword") //word
  || ($_FILES["file"]["type"] == " application/vnd.ms-powerpoint ")//ppt
  || ($_FILES["file"]["type"] == " application/pdf ")//pdf
  || ($_FILES["file"]["type"] == " text/plain")//txt
  )  //word
  && ($_FILES["file"]["size"] < 20000))
    {
    if ($_FILES["file"]["error"] > 0)
      {
      echo "Return Code: " . $_FILES["file"]["error"] . "<br />";
      }
    else
      {
      echo "Upload: " . $_FILES["file"]["name"] . "<br />";
      echo "Type: " . $_FILES["file"]["type"] . "<br />";
      echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
      echo "Temp file: " . $_FILES["file"]["tmp_name"] . "<br />";

      if (file_exists("upload/" . $_FILES["file"]["name"]))
        {
        echo $_FILES["file"]["name"] . " already exists. ";
        }
      else
        {
        move_uploaded_file($_FILES["file"]["tmp_name"],
        "upload/" . $_FILES["file"]["name"]);
        $uploadSuccess=true;
        echo "Stored in: " . "upload/" . $_FILES["file"]["name"];
        }
      }
  }
else
  {
  echo "Invalid file";
  }
}
?>
<?php include 'db.php'; ?>
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
  if (uploadSuccess) {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $year=date("Y");
      $course_id=$_SESSION["course_id"];
      $Teacher1=$_SESSION["Teacher1"];
      $course_time1=$_SESSION["course_time1"];
      $name=$_POST["name"];
      $content=$_POST["content"];
      $post_time=$_POST["post_time"];
      $update_time=$_POST["update_time"];
      $url="upload/" . $_FILES["file"]["name"];
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
      $lastId = $conn->lastInsertId();
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
