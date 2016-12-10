<!doctype html>
<html>
    <head>
        <meta charset="utf-8">      
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
    </head>
    <body>
        <form action="testAddPermission.php" method="post">
        	userID<input type="text" name="userID">
        	<br>
        	是否设置为助教<br>
        	<input type="radio" name="type" value="1" >是
        	<input type="radio" name="type" value="0" checked="true">否

        	<input type="radio" name="permission">批改作业
        	<input type="submit" name="submit">
        </form>
    </body>
</html>