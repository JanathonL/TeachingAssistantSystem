<?php
?>

<?php 
include 'db.php'; 
require 'setMessage.php';
?>
<?php 
/*********************************************************************************
描述：当进入某一门课的作业页面
流程：
  1. 得到所有的参数，删除数据
Input:
1. $_GET['homeworkid']
Output: 
*********************************************************************************/
?>
<?php
  if (isset($_GET['homeworkid'])&&isset($_GET['deleteHomework'])) {
    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      $homeworkid= $_GET["homeworkid"];
    	$isOK=false;
    	$sql=$conn->prepare("DELETE FROM homework where id=:id");
    	$sql->bindParam(':id',$homeworkid);

  		$isOK = $sql->execute();
  		$lastId = $conn->lastInsertId();
  			
    }
    catch(PDOException $e)
    {
      echo "delete homework failure" . "<br>" . $e->getMessage();
    }
    $conn = null;
    $sql = null;
    if($isOK){
        successMessage("删除作业成功");
    }
    else{
        InfoMessage("删除作业失败");
    }
  }
?>