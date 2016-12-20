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

<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="shared/css/font-awesome.css">
    <link rel="stylesheet" href="shared/css/w3.css">

    <link rel="stylesheet" href="style/class/homework.css">

    <script src="script/utils.js"></script>

    <title></title>
</head>
<body>

<!--台头标题-->
<header class="w3-top w3-card-4">
    <nav id="topNav" class="w3-row w3-light-grey">
        <div class="w3-col l2 w3-hide-small w3-hide-medium w3-padding-8 w3-dark-gray w3-hover-white w3-center">
            <a href="" target='_blank'>教学支撑辅助网站</a>
        </div>
        <div class="w3-col m1 w3-hide-small w3-hide-large w3-padding-8 w3-dark-gray w3-hover-white w3-center">
            <a href="" target="_blank"><i class="fa fa-home"></i></a>
        </div>
        <div class="w3-col m2 l1 w3-hide-small w3-right w3-padding-8 w3-dark-gray w3-hover-white w3-center">
            <a href="" target="_blank">帮助中心</a>
        </div>
        <div class="w3-col m1 l1 w3-hide-small w3-right w3-padding-8 w3-dark-gray w3-hover-white w3-center">
            <a href="" target="_blank">论坛</a>
        </div>
        <div class="w3-col m2 l1 w3-hide-small w3-right w3-padding-8 w3-black w3-hover-white w3-center">
            <a href="" target="_self">所有课程</a>
        </div>
        <div class="w3-col s4 m2 l1 w3-right w3-padding-8 w3-dark-gray w3-hover-white w3-center">
            <a href="" target="_blank">我的课程</a>
        </div>
        <div class="w3-col s4 w3-hide-medium w3-hide-large">
            <button onclick="openAndCloseSidenav()" class="w3-btn-block w3-bottombar w3-border-dark-gray w3-hover-border-white w3-dark-gray w3-hover-white">菜单 <i class="fa fa-bars"></i></button>
        </div>
    </nav>

    <div id="map" class="w3-row">
        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="myclasses.php">我的课程</a></div>
        <?php if (isset($course)) {?>
            <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="class.php">
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
                                <form action="control/markHomework.php">
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
                                <form action="control/markHomework.php">
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


<!--底部声明-->
<footer>
    <div class="w3-container w3-center w3-padding w3-light-gray">
        <a href="" target="_blank" class="w3-padding w3-hover-white w3-hover-shadow">Powered by tas</a>
    </div>
</footer>

<aside id="goToTop" class="w3-tooltip">
    <div class="w3-text w3-padding w3-dark-gray">到顶部</div>
    <a href="#" class="w3-btn-floating-large w3-dark-gray w3-hover-white w3-xxlarge"><i class="fa fa-angle-double-up"></i></a>
</aside>
<aside id="goToBottom" class="w3-tooltip">
    <div class="w3-text w3-padding w3-dark-gray">到底部</div>
    <a href="#bottom" class="w3-btn-floating-large w3-dark-gray w3-hover-white w3-xxlarge"><i class="fa fa-angle-double-down"></i></a>
</aside>

</body>
</html>