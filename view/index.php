<?php require '../control/isLogin.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="index">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
    </head>
    <body>
        Hello <?php echo $_SESSION['username']; ?>
    </body>
</html>