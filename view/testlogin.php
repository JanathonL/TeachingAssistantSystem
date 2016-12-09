<?php require '../control/login.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="test login">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>test login</title>
    </head>
    <body>
		<form action="testlogin.php" method="post">
			username:<input type="text" name="username">
			<br>
			password:<input type="password" name="password" onchange="test();">
			<br>
			<input type="submit" value="submit" onclick="test();return false;">
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
        
    </body>
</html>