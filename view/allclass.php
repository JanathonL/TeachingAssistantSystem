<?php include "../control/listCourse.php"?>

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/home/basic.css"/>
    <title></title>
</head>
<body>

<!--台头标题-->
<header>
    <h1>
        我的课程
    </h1>
</header>

<div id="main">

    <!-- 左侧导航栏-->
    <aside>
        <div id="logo">
            <img src="pic/book.jpg">
            <h1>TAS</h1>
            <h3>TeachingAssistantSystem</h3>
        </div>
        <div id="nav">
            <ul>
                <li>
                    <a href="#"><img src="pic/book.jpg">个人信息</a>
                </li>
                <li>
                    <a href="#"><img src="pic/book.jpg">我的班级</a>
                </li>
            </ul>
        </div>
        <div id="logout">
            <ul>
                <li>
                    <a href="#"><img src="pic/book.jpg">退出</a>
                </li>
            </ul>
        </div>
    </aside>

    <!--右侧内容-->
    <div>

        <div id="content">
            <!--课程栏-->
            <h3>进行中的课程</h3>
            <div class="wrapper">

                <?php
                foreach ($courseList as $course){
                    echo '<div class="course" data-course-id="' . $course->course_id . '"">';
                    echo '<div class="course-name">' . $course->course_name . '</div>';
                    echo '<div class="course-teacher">' . $result_student->Teacher1 . '</div>';
                    echo '<div class="course-intro">' . $course->course_introduction . '</div>';
                    echo '<div class="course-link"><a href="myclass.php?course_id=' . $course_id . "></a></div>";
                    echo '</div>';
                }
                ?>
                <div class = "container">
                    <div class = "icon" >
                        <img src="book.jpg">
                        <div>
                            <h2>课程1</h2>
                            <h3>xxxxxxxxxxx</h3>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>

<!--底部声明-->
<footer>
    <div>
        <h3>tas</h3>
    </div>
</footer>

</body>
</html>