<?php require "control/getNotice.php"?>


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
                <li><a href="course.php"><?php $course->name ?></a></li>
                <li><a href="notices.php">课程通知</a></li>
                <li class="maplast"><p><?php $notice->name; ?></p></li>
            </ul>
        </div>
        <!--功能栏-->
        <div id="function-panel">

        </div>

        <!--通知条目-->
        <div class="main">
            <div class="content"><?php $notice->message ?></div>
        </div>

    </article>
</div>

<?php include './partial/footer.php'; ?>

<?php require "control/ListNotice.php"?>
<?php
class M{
    public $name = "name";
    public $url = "url";
    public $update_time = "update_time";
    public $teacher1 = "teacher1";
    public $id="id";
    public $deadlin="deadline";
    public $pub_date="pubdate";
}

$result=array(new M, new M);
$type = 2;
?>

<?php $title="通知";require './partial/head.php'; ?>
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="shared/css/font-awesome.css">
    <link rel="stylesheet" href="shared/css/w3.css">
    <link rel="stylesheet" href="style/class/notices.css"/>
    <script src="script/utils.js"></script>
    <script src="script/notice.js"></script>


    <!--台头标题-->
    <header class="w3-top w3-card-4">
        <?php require './partial/nav.php'; ?>

        <div id="map" class="w3-row">
            <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="mycourses.php">我的课程</a></div>
            <!--        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="class.php">--><?php //if (isset($course)) {
            //                    echo $course->name;
            //                } ?><!--</a></div>-->
            <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-black w3-hover-white w3-center"><a href="#">成绩查询</a></div>
            <div class="maplast w3-col m2 l1 w3-hide-small w3-right w3-padding-8 w3-gray w3-hover-white w3-center"><a href="#" onClick="history.back(-1);">返回</a></div>
        </div>
    </header>

<?php require './partial/slidenav.php'; ?>

    <br><br><br><br>
<?php include 'partial/message.php'; ?>

    <div id="wrapper">
        <!--内容-->
        <article>
            <div id="functional-panel">
                <?php $type=$_SESSION["type"];
                if($type>1){
                    ?>
                    <!--                通知删除-->
                    <div id="add-notice-button" class="button" ><a href="control/deleteNotice.php?noticeid=<?php $notice->id;?>">删除通知</div>
                <?php   }?>
                ?>
            </div>
            <div id="main">
                <div id="content"><?php echo $notice['message']?></div>
            </div>
        </article>
    </div>


<?php include './partial/footer.php'; ?>