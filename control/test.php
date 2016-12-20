<?php 
/**
* 
*/
include 'db.php';
require 'getId.php';
try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      $homeworkname= "123";
    	$type="1";
    	$state="1";
    	$year=date("Y");
    	$course_id="1";
    	$Teacher1="1";
    	$course_time1="1";
    	$isOK=false;
    	$sql=$conn->prepare("INSERT INTO homework 
    		(name, type,state,course_id,Teacher1,year,course_time1) 
    		VALUES 
    		(:name,:type,:state,:course_id,:Teacher1,:year,:course_time1)");
    	$sql->bindParam(':name',$homeworkname);
    	$sql->bindParam(':type',$type);
    	$sql->bindParam(':state',$state);
    	$sql->bindParam(':course_id',$course_id);
    	$sql->bindParam(':Teacher1',$Teacher1);
    	$sql->bindParam(':year',$year);
    	$sql->bindParam(':course_time1',$course_time1);

		$isOK = $sql->execute();
		$lastId = getId("homework",$course_id,$Teacher1,$course_time1,"name",$homeworkname);
		if ($isOK==true) {
			echo "add homework successfully<br>";
			echo "lastId:".$lastId;
		}
		else{
			echo "add homework failure";
		}		
    }
    catch(PDOException $e)
    {
      echo "add homework failure" . "<br>" . $e->getMessage();
    }
    $conn = null;
    $sql = null;
 ?>
