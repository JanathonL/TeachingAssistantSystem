<!doctype html>
<?php require '../control/searchStudent.php'; ?>
<?php 
$_SESSION["type"]=8;
$_SESSION["username"]="123";
$_SESSION["course_id"]=1;
$_SESSION["Teacher1"]=1;
$_SESSION["course_time1"]=1;

?>
<?php 
/*
Input: 设置_GET['course_id'],_GET['Teacher1'],_GET['course_time1'],填上相应的值，$tablename
Output: $result 这是一个array，里面有所有  特定的表  的属性。
*/
 ?>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="testList">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
    </head>
    <body>
    	<a href="testList.php?searchStudent=true">click</a>
        <?php 
        if (isset($result_students)) {
        	foreach ($result_students as $row) {
        		echo "userID:".$row->userID."<br>";
        	}
        }
        else{
            echo "not set";
        }
        ?>

    </body>
</html>