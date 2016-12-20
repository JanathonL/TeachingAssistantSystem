<?php
//输入输出相关参数参考ListItems.php 
?>
<?php 
require 'ListItems.php'; 
$result=ListItems("homework");
?>

<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <title></title>
</head>
<body>

<!--台头标题-->
<header>
    <h1>
        作业管理
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
                <li>
                    <a href = "#"><img src="pic/book.jpg"></a>
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
    <article>
        <!--功能按钮区-->
        <div class="functional-panel">
            <div class="button add-material-btn" >布置作业</div>
            <form id="search-material">
                <input name="keyword" placeholder="搜索资料"/>
            </form>
        </div>
        <div id="content">
            <!--资料条目-->
            <div class="list">
                <div class="homework header">
                    <a class="filename" href="">作业</a>
                    <span class="date">开始日期</span>
                    <span class="date">截止日期</span>
                </div>

                <!--循环示例-->
                <!--要向homework.php提交id、course_id等数据，url设为homework.php?id=xxxx&course_id=xxxx-->
                <!--要遍历数组，用foreach($array as $object)， 然后在循环中用$object即可-->
                <!--要访问某个对象的属性，用$obj->attr这样的形式-->
                <?php
                     foreach($result as $homework) {
                         $homework = $result;
                         echo "<div class=\"homework\">";
                        echo "<a class=\"homework\" href=\"homework.php?id=" . $homework->id . "\">" . $homework->name . "</a>";
                        echo "<span class=\"date\">" . $homework->update_time . "</span>";
                        echo "<span class=\"date\">" . $homework->deadline . "</span>";
                        echo "<a class=\"button correct-button\" href=\"correcthomework.php?id=" . $homework->id . "\">批改</a>";
                        echo "<a class=\"button delete-button\" href=\"deletehomework.php?id=" . $homework->id . "\">删除</a>";
                        echo "</div>"
            }
            ?>

            <!--示例输出-->
            <div class="homework">
                <a class="homework" href="homework?id=333">作业1</a>
                <span class="date">2016-12-10</span>
                <span class="date">2016-12-19</span>
                <a class="button delete-button" href="correcthomework?id=333">批改</a>
                <a class="button delete-button" href="deletehomework?id=333">删除</a>
            </div>

            <div class="homework">
                <a class="filename" href="case2">作业2</a>
                <span class="date">2016-12-10</span>
                <span class="date">2016-12-19</span>
                <div class="button delete-button">批改</div>
                <div class="button delete-button">删除</div>
            </div>
        </div>
</div>
</article>

<!--底部声明-->
<footer>
    <div>
        <h3>tas</h3>
    </div>
</footer>

</body>
</html>