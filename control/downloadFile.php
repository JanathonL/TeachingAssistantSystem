<?php session_start(); ?>

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
  function unlinkFile($aimUrl) {
        if (file_exists($aimUrl)) {
            unlink($aimUrl);
            return true;
        } else {
            return false;
        }
    }
  if (isset($_GET['id'])) {
    try {
      $conn = new PDO("mysql:host=$servername;port=$port;dbname=$dbname", $username, $password);
      $id= $_GET['id'];
      $Is_find=false;
      $sql=$conn->prepare("SELECT url FROM material where id=:id");
      $sql->bindParam(":id",$id);
      $Is_find=$sql->execute();
      if ($Is_find) {
        # code...
        $result = $sql->fetchObject();
        $aimUrl=$result["url"];
      }
      $isDelete=unlinkFile($aimUrl);
      if ($isDelete) {
        $sql2=$conn->prepare("DELETE FROM material where id=:id");
        $sql2->bindParam(":id",$id);
        $isDelete=$sql2->execute();
        }
      }
    }
    catch(PDOException $e)
    {
      echo $sql . "<br>" . $e->getMessage();
    }
    $conn = null;
  }
?>
