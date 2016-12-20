<?php 
/*********************************************************************************
描述：得到刚刚插入进去的这个项的id
流程：
  1. 利用四个关键字，然后对特定的表进行查找，然后得到id
Input: 四个attrs，$tablename
Output: $result 这是一个array，里面有所有  特定的表  的属性。
*********************************************************************************/
 ?>
<?php
  function getId($tablename,$course_id,$Teacher1,$course_time1,$attr,$value)
  {
    include 'db.php';    
      try {
        $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
        $year = date("Y");
        $sql=$conn->prepare("SELECT id from $tablename where year=:year and Teacher1=:Teacher1
         and course_time1=:course_time1 and course_id=:course_id and "."$attr=:$attr");
        $sql->bindParam(':year',$year);
        $sql->bindParam(':Teacher1',$Teacher1);
        $sql->bindParam(':course_time1',$course_time1);
        $sql->bindParam(':course_id',$course_id);
        $sql->bindParam(":$attr",$value);

        $isOK = $sql->execute();
        $result=$sql->fetchObject();
       // echo "result:".$result."<br>";
        return $result->id;
      }
      catch(PDOException $e)
      {
        echo "list $tablename failure" . "<br>" . $e->getMessage();
      }
      $conn = null;
      $sql = null;
      return null;
  }
  
  
  
?>