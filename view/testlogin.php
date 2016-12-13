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
		<form action="testlogin.php" method="post">
			username:<input type="text" name="username">
			<br>
			password:<input type="password" name="password" onchange="test();">
			<br>
			<input type="submit" value="submit" >
            <div id="warning"></div>
            <div id="test"></div>
            <button onclick="test();">click</button>
		</form>    
        <script >
        var OK=false;
        function test(event) {
            // body...
            OK=!OK;
            var test=JSON.parse('<?php require '../control/test.php'; ?>');
            if(OK){
                document.getElementById("test").innerHTML=test.c.test;
            }
            else{

            }
            
        }


        </script>
        <script src="js/jquery-2.2.0.min.js" charset="utf-8"></script>
        <script src="js/bootstrap.min.js" charset="utf-8"></script>
    </body>
</html>