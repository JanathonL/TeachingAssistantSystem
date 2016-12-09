<?php
  session_start();
?>

<?php include 'db.php'; ?>
<?php
  if (isset($_GET['homeworkid'])) {
    try {
      $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      $homeworkid= $_GET["homeworkid"];
    	$isOK=false;
    	$sql=$conn->prepare("DELETE FROM homework where id=:id");
    	$sql->bindParam(':id',$homeworkid);

		$isOK = $sql->execute();
		$lastId = $conn->lastInsertId();
		if ($isOK==true) {
			echo "delete homework successfully";
		}
		else{
			echo "delete homework failure";
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