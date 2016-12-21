<?php require "control/ListNotice.php"?>
<?php $notice;?>
//notice名字无法确定，需要改一下

<?php $title="通知";require './partial/head.php'; ?>
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <script src="script/utils.js"></script>
    <script src="script/notice.js"></script>


<!--台头标题-->
<header>
    <h1>
        通知
    </h1>
</header>
<?php include 'partial/message.php'; ?>
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
    <article>
        <div id="map">
            <ul>
                <li><a href="myclasses.php">我的课程</a></li>
                <li><a href="class.php"><?php $course->name ?></a></li>
                <li><a href="notices.php">课程通知</a></li>
                <li class="maplast"><p><?php $notice->name; ?></p></li>
            </ul>
        </div>
        <!--功能栏-->
        <div id="function-panel">
            <?php $type=$_SESSION["type"];
            if($type>1){
                ?>
<!--                通知删除-->
                <div id="add-notice-button" class="button" ><a href="control/deleteNotice.php?noticeid=<?php $notice->id;?>">删除通知</div>
            <?php   }?>
        </div>

        <!--通知条目-->
        <div class="notices">
            <div class="content"><?php $notice->message ?></div>
        </div>

    </article>
</div>

<?php include './partial/footer.php'; ?>
