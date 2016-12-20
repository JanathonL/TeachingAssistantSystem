<?php //include 'control/searchStudent.php'; ?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/home/basic.css"/>
    <link rel="stylesheet" href="style/class/students.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <script src="script/classutil.js"></script>
    <script src="script/domutil.js"></script>
    <script src="script/listutil.js"></script>
    <script src="script/ajax.js"></script>
    <script src="script/student.js"></script>
    <script>
        window.onload = function(){
           // students= <?php //echo json_encode($result_students);?>;
            students=[
                {
                    name: "Avater",
                    id:304,
                    homework1:89
                },
                {
                    name:"Bock",
                    id:504,
                    homework1:79
                },
                {
                    name:"Calie",
                    id:402,
                    homework1:85
                }
            ];
            showStudents(students);
        };
    </script>
    <title></title>
</head>
<body>

<!--台头标题-->
<header>
    <h1>
        权限管理
    </h1>
</header>

<div id="main">

    <!-- 左侧导航栏-->
    <aside>
        <div id="logo">
            <img src="image/book.jpg">
            <h1>TAS</h1>
            <h3>TeachingAssistantSystem</h3>
        </div>
        <div id="nav">
            <ul>
                <li>
                    <a href="#"><img src="image/book.jpg">个人信息</a>
                </li>
                <li>
                    <a href="#"><img src="image/book.jpg">我的班级</a>
                </li>
                <li>
                    <a href = "#"><img src="image/book.jpg"></a>
                </li>
            </ul>
        </div>
        <div id="logout">
            <ul>
                <li>
                    <a href="#"><img src="image/book.jpg">退出</a>
                </li>
            </ul>
        </div>
    </aside>

    <!--右侧内容-->
    <article>
        <div id="functional-panel">
            <form>
                <input type="text" name="keyword" placeholder="搜索" onchange="searchStudents(this.value)">
            </form>
        </div>
        <div id="students"></div>
    </article>
</div>

<!--底部声明-->
<footer>
    <div>
        <h3>tas</h3>
    </div>
</footer>

</body>
</html>