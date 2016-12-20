<?php require './control/isLogin.php'; ?>
<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="index">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Untitled</title>
        <link rel="stylesheet" href="shared/css/bootstrap.min.css" charset="utf-8">
    </head>
    <?//php session_start();
    $_SESSION['message']="test";
    $_SESSION['message_type'] = "success"; ?>
    <?php require './shared/message.php'; ?>
    <body>
        Hello <?php echo $_SESSION['username']; ?>
        <script src="shared/js/jquery-2.2.0.min.js" charset="utf-8"></script>
        <script src="shared/js/bootstrap.min.js" charset="utf-8"></script>
    </body>
</html>