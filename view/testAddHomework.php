<?php require '../control/addHomework.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="test addHomework">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>test addHomework</title>
    </head>
    <body>
		<form action="testAddHomework.php" method="post">
			作业名字:<input type="text" name="homeworkname">
			<br>
			<input type="radio" name="type" value="1" checked> 选择题
            <input type="radio" name="type" value="2"> 问答题<br>
            <input type="text" name="state" value="0" hidden='true'>
			<br>
			<input type="submit" value="submit">
            
		</form>    
    </body>
</html>