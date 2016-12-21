<?php
session_start(); 
$_SESSION["username"]="111";
$_SESSION["type"]="1";
$_SESSION["course_id"]="111";
require  'control/listSubmitHomework.php' ?>
<?php
require 'control/listItems.php';
$homeworkResult=ListItems("homework");
$homeworksubmit=$result;
$type = 1;
foreach($homeworkResult as $row){
	$homework=$row;
}

?>
<?php $title="批改作业"; require 'partial/head.php'; ?>


<!--台头标题-->
<header class="w3-top w3-card-4">
    <?php require './partial/nav.php'; ?>

    <div id="map" class="w3-row">
        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="mycourses.php">我的课程</a></div>
        <?php if (isset($course)) {?>
            <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="course.php">
                <?php   echo $course->name;?>
            </a></div><?php       } ?>
        <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-black w3-hover-white w3-center"><a href="#">成绩查询</a></div>
        <div class="maplast w3-col m2 l1 w3-hide-small w3-right w3-padding-8 w3-gray w3-hover-white w3-center"><a href="#" onClick="history.back(-1);">返回</a></div>
    </div>
</header>

<nav id="sideNav" class="w3-hide w3-sidenav w3-white w3-card-4 w3-animate-left">
    <button onclick="openAndCloseSidenav()" class="w3-btn-block w3-bottombar w3-border-dark-gray w3-white w3-hover-light-gray">关闭菜单 <i class="fa fa-close"></i></button>
    <a href="" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">教学支撑辅助网站</a>
    <a href="" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">我的课程</a>
    <a href="" target="_self" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">所有课程</a>
    <a href="" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">论坛</a>
    <a href="" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">帮助中心</a>
</nav>

<br><br><br><br>
<?php include 'partial/message.php'; ?>


<div id="wrapper">
    <!--内容-->
    <article>
        <!--题目选择按钮-->
        <div id="functional-panel">

        </div>
        <div id="main">
            <div id="homework">

            </div>
            <div id="homeworksubmits" style="height:<?php echo count($result)*100?>%">
                <?php foreach ($result as $homeworksubmit){
                    if($homework["type"] == 1){//选择题
                        ?>
                        <div class="homework">
                            <div class="student"><?php echo $homeworksubmit["student_id"]?></div>
                            <div class="answer"><?php echo $homeworksubmit["submit_url"]?></div>
                            <div class="feedback">
                                <form action="control/markHomework.php?homeworksubmitid=<?php echo $homeworksubmit['id']?>" method="post">
                                    <textarea name="feedback"></textarea>
                                    <input type="range" name="score" min="0" max="<?php $homeworksubmit["score"]?>5" step="1">
                                    <input type="input" name="score" value="0" contenteditable="false">
                                    <input type="submit" name="submit">
                                </form>
                            </div>
                        </div>
                        <?php
                    } else if($homework["type"] == 2){//问答题
                        ?>
                        <div class="homework">
                            <div class="name"><?php echo $homeworksubmit["name"]?></div>
                            <div class="content"><?php echo $homeworksubmit["content"]?></div>
                            <div class="feedback">
                                <form action="control/markHomework.php?homeworksubmitid=<?php echo $homeworksubmit['id']?>" method="post">
                                    <textarea name="feedback"></textarea>
                                    <input type="range" name="score" min="0" max="<?php $homeworksubmit["score"]?>5" step="1">
                                    <input type="input" name="score" value="0" contenteditable="false">
                                    <input type="submit" name="submit">
                                </form>
                            </div>
                        </div>
                        <?php
                    }
                }   //end of foreach?>
            </div>
        </div>
    </article>
</div>


<?php require './partial/footer.php'; ?>