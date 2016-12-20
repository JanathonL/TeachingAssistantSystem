<?php session_start(); ?>

<?php include 'db.php'; ?>
<?php 
/*********************************************************************************
描述：当进入某一门课的作业页面
流程：
  1. 得到所有的参数，然后插入数据到homework表中
Input:
1. $_POST['userID']
2. $_POST["type"]
3. $_POST["permission"]
Output: $lastId 这是插入这条记录的id
*********************************************************************************/
 ?>
<?php
/*
 userID varchar(20) NOT NULL,
  username varchar(20) not NULL,
  password varchar(20) not null,  -- md5加密
  type int not null,              -- 与一下判断有什么类型
  permission int not null,        -- 与一下然后判断有什么权限
  nickname varchar(20) not null,
  gender int not null,            -- male, female, why do you ask
  age    int not null,
  email  varchar(255) not null,
  mobilephone varchar(20) not null,
*/
  if (isset($_POST['userID'])) {
    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      	$userID=$_POST["userID"];
    	$type=$_POST["type"];
    	$permission=$_POST["permission"];
    	$isOK=false;
    	$sql=$conn->prepare("UPDATE OrdinaryUser set type=type|:type, 
        permission=permission | :permission where userID=:userID");
    	$sql->bindParam(':userID',$userID);
    	$sql->bindParam(':type',$type);
    	$sql->bindParam(':permission',$permission);
	   	$isOK = $sql->execute();
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