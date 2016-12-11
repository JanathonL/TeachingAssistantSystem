<?php
  session_start();
?>

<?php include 'db.php'; ?>
<?php 
/*********************************************************************************
描述：当进入某一门课的页面
流程：
  1. 得到所有的参数，删除数据
Input:
1. $_GET['noticeid']
Output: 
*********************************************************************************/
?>
<?php
  if (isset($_GET['noticeid'])) {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $noticeid= $_GET["noticeid"];
      $isOK=false;
      $sql=$conn->prepare("DELETE FROM Notice where id=:id");
      $sql->bindParam(':id',$noticeid);

    $isOK = $sql->execute();
    $lastId = $conn->lastInsertId();
    if ($isOK==true) {
      echo "delete Notice successfully";
    }
    else{
      echo "delete Notice failure";
    }   
    }
    catch(PDOException $e)
    {
      echo "delete Notice failure" . "<br>" . $e->getMessage();
    }
    $conn = null;
    $sql = null;
  }
?>