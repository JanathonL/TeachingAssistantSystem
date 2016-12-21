<?php
//输入输出相关参数参考ListItems.php 
?>
<?php 
require 'control/ListItems.php';
$result=ListItems("homework");
?>
<?php
class M{
    public $name = "name";
    public $url = "url";
    public $update_time = "update_time";
    public $teacher1 = "teacher1";
    public $id="id";
    public $deadlin="deadline";
}
//$result=array(new M, new M);
$type = 2;
?>
<?php $title="作业";require './partial/head.php'; ?>
<link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="shared/css/font-awesome.css">
    <link rel="stylesheet" href="shared/css/w3.css">
    <link rel="stylesheet" href="style/class/homeworks.css"/>

    <script src="script/utils.js"></script>


<!--台头标题-->
<header class="w3-top w3-card-4">
    <?php require './partial/nav.php'; ?>
    <div id="map" class="w3-row">
        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="mycourses.php">我的课程</a></div>
                <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="course.php"><?php if (isset($course)) {
                            echo $course->name;
                        } ?></a></div>
        <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-black w3-hover-white w3-center"><a href="#">作业列表</a></div>
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
            <form>
                <input class="w3-input w3-border-light-gray w3-light-gray w3-hover-white w3-hover-shadow" type="text" name="keyword" placeholder="搜索" onchange="">
            </form>
            <?php if(isset($type)){ ?>
                <?php if($type>1){
                    ?>
                    <div class="publish-button button w3-input w3-border-light-gray w3-light-gray w3-hover-white w3-hover-shadow" onclick=""><a href="publishhomework.php">发布作业</a></div>
                    <?php
                }
            }
            ?>
        </div>
        <div id="main">
            <div class="list">
                <div class="homework title row">
                    <div class="homework title name">作业</div>
                    <div class="homework title update-time">开始日期</div>
                    <div class="homework title deadline">截止日期</div>
                </div>
                <?php
                foreach($result as $homework) {
                    echo "<div class=\"homework row\">";
                    echo "<a class=\"name\" href=\"homework.php?id=" . $homework["id"] . "\">" . $homework["name"] . "</a>";
                    echo "<span class=\"update-time\">" . $homework["update_time"] . "</span>";
                    echo "<span class=\"deadline\">" . $homework["deadline"] . "</span>";
                    if ($type == 2 || $type == 4) { //教师或助教{
                        echo "<a class=\"button correct-button\" href=\"correcthomework.php?homeworkid=" . $homework["id"] . "\">批改</a>";
                        echo "<a class=\"button delete-button\" href=\"deletehomework.php?homeworkid=" . $homework["id"] . "\">删除</a>";
                    }
                    echo "</div>";
                }
                ?>
            </div>
        </div>
    </article>
</div>

<?php include './partial/footer.php'; ?>