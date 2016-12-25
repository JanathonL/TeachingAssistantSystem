<?php
//输入输出相关参数参考ListItems.php
session_start();
?>
<?php
$_GET['course_id']=$_SESSION['course_id'];
$_GET['Teacher1']=$_SESSION['Teacher1'];
$_GET['course_time1']=$_SESSION['course_time1'];
require 'control/ListItems.php';
$result=ListPost("post");
?>
<?php
//test

$type = 2;
?>

<?php $title="论坛";require './partial/head.php'; ?>
<link rel="stylesheet" href="style/common/basic.css"/>
<link rel="stylesheet" href="style/class/forum.css"/>
<link rel="stylesheet" href="style/class/list.css"/>
<link rel="stylesheet" href="shared/css/font-awesome.css">
<link rel="stylesheet" href="shared/css/w3.css">
<script src="script/utils.js"></script>

<!--台头标题-->
<header class="w3-top w3-card-4">
    <?php require './partial/nav.php'; ?>

    <div id="map" class="w3-row">
        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="mycourses.php">我的课程</a></div>
        <!--        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="class.php">--><?php //if (isset($course)) {
        //                    echo $course->name;
        //                } ?><!--</a></div>-->
        <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-black w3-hover-white w3-center"><a href="#">论坛</a></div>
        <div class="maplast w3-col m2 l1 w3-hide-small w3-right w3-padding-8 w3-gray w3-hover-white w3-center"><a href="#" onClick="history.back(-1);">返回</a></div>
    </div>
</header>

<?php require './partial/slidenav.php'; ?>

<br><br><br><br>
<?php include 'partial/message.php'; ?>


<div id="wrapper">
    <!--内容-->
    <article>
        <!--功能按钮区-->
        <div id="functional-panel">
            <?php if($type>1){
                ?>
                <div class="button add-post-btn" ><a href="publishpost.php">发帖</a></div>
                <?php
            }
            ?>
        </div>
        <div id="main">
            <!--资料条目-->
            <div class="list">
                <div class="post title row">
                    <div class="post title name">主题</div>
                    <div class="post title update-time">最后回复</div>
                    <div class="post title userID">发帖人</div>
                </div>

                <?php
                foreach($result as $post) {
                    echo "<div class=\"post row\">";
                    echo "<a class=\"post name\" href=\"" . $post["url"] . "\">" . $post["name"] . "</a>";
                    echo "<span class=\"update-time\">" . $post["update_time"] . "</span>";
                    echo "<span class=\"userID\">" . $post["userID"]. "</span>";
                    if ($type>1){
                        echo "<a class=\"button delete-button\" href=\"" . "\">删除</a>";     //删帖部分链接待补充
                        echo "<a class=\"button delete-button\" href=\"" . "\">置顶</a>";     //置顶部分链接待补充
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </article>
</div>


<?php require './partial/footer.php'; ?>