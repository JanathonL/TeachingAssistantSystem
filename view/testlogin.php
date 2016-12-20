<?php require '../control/login.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="test login">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>test login</title>
        <link rel="stylesheet" href="../shared/css/bootstrap.min.css" charset="utf-8">
        
    </head>
    <?//php session_start();
    $_SESSION['message']="test";
    $_SESSION['message_type'] = "success"; ?>
    <?php require '../shared/message.php'; ?>
    <body>
		<form action="/control/login.php" method="post">
			username:<input type="text" name="username">
			<br>
			password:<input type="password" name="password">
			<br>
			<input type="submit" value="submit" >

		</form>
        <script src="js/jquery-2.2.0.min.js" charset="utf-8"></script>
        <script src="js/bootstrap.min.js" charset="utf-8"></script>
    </body>
</html>