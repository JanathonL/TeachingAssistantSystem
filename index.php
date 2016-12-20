<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title></title>
    <link rel="stylesheet" media="screen" href="style/index/basic.css"/>
    <link rel="stylesheet" media="screen" href="style/index/index.css"/>
    <script src="script/utils.js"></script>
    <script src="script/index.js"></script>
    <script>

    </script>
</head>
<body>
<header>
    <nav>
        <ul>
            <li id="login-nav" onclick="showLogin();">
                登录xxxx
            </li>
            <li><a>关于我们</a></li>
        </ul>
    </nav>
    <div id="login" hidden="hidden">
        <div id="login-window">
            <form id="login-form" action="control/login.php" method="post">
                <input type="text" name="username" placeholder="账号/学号">
                <input type="password" name="password" placeholder="密码">
                <input type="radio" name="type" value="1" /><span>学生</span>
                <input type="radio" name="type" value="2" /><span>助教</span>
                <input type="radio" name="type" value="4" /><span>教师</span>
                <input type="radio" name="type" value="8" /><span>管理员</span>
                <input type="submit" name="submit" value="登录">
            </form>
            <p id="warning"></p>
        </div>
        <div id="login-success" hidden="hidden">登录成功</div>
        <div id="login-failed" hidden="hidden">登录失败</div>
        <div id = "login-cover"></div>
    </div>

</header>
<section id="intro"></section>
<section>
</section>
<footer>

</footer>
</body>
</html>