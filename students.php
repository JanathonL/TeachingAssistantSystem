<?php //include 'control/searchStudent.php'; ?>

<?php $title="学生"; require './partial/head.php'; ?>
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


<!--台头标题-->
<header class="w3-top w3-card-4">
    <?php require './partial/nav.php'; ?>
</header>

<?php require './partial/slidenav.php'; ?>

<br><br><br><br>

<?php include 'partial/message.php'; ?>

<div id="main">

    <!-- 左侧导航栏-->
    <!--<aside>
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
    </aside>-->

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

<?php include './partial/footer.php'; ?>