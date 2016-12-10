<?php session_start(); ?>

<?php include 'db.php'; ?>
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
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      	$userID=$_POST["userID"];
    	$type=$_POST["type"];
    	$permission=$_POST["permission"];
    	$isOK=false;
    	$sql=$conn->prepare("UPDATE OrdinaryUser set type=type^:type, 
        permission=permission^:permission where userID=:userID");
    	
    	$sql->bindParam(':userID',$userID);
    	$sql->bindParam(':type',$type);
    	$sql->bindParam(':permission',$permission);
    	
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