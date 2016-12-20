<?php
//输入输出相关参数参考ListItems.php
?>
<?php
require 'control/ListItems.php';
//$result=ListItems("homework");
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
$result=array(new M, new M);
$type = 2;
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
    <link rel="stylesheet" href="style/class/publishhomework.css"/>


    <script src="script/utils.js"></script>
    <script src="script/publishhomework.js"></script>

    <title>布置作业</title>
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
        <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="homeworks.php">作业列表</a></div>
        <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-black w3-hover-white w3-center"><a href="#">布置作业</a></div>
        <div class="w3-col m2 l1 w3-hide-small w3-right w3-padding-8 w3-gray w3-hover-white w3-center"><a href="#" onClick="history.back(-1);">返回</a></div>
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
        <div id="functional-panel">
            <div>作业类型：</div>
            <form id="homework-type">
                <input type="radio" name="type" value=1 checked onchange="showForm(this.value)"/>选择题
                <input type="radio" name="type" value=2 onchange="showForm(this.value)"/>问答题
            </form>
        </div>
        <div id="main">
<!--            选择题-->
            <form id="homework-choice" method="post" action="control/addHomework.php">
                <div class="row">
                    <div>题目</div>
                    <div>
                        <textarea name="content"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div>选项</div>
                    <div id="choices">
                    </div>
                    <div id="add-choices">
                        <div class="button" onclick="addChoice()">
                            添加新选项
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div>截止日期：</div>
                    <div>
                        <input type="date" name="deadline"/>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="提交">
                    <input type="reset" name="reset" value="重置">
                </div>
            </form>
<!--            问答题-->
            <form id="homework-answer" style="display:none;" method="post" action="control/addHomework.php">
                <div class="row">
                    <div>题目</div>
                    <div>
                        <textarea name="content"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div>参考答案</div>
                    <div>
                        <textarea name="answer"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div>截止日期：</div>
                    <div>
                        <input type="date" name="deadline"/>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="提交">
                    <input type="reset" name="reset" value="重置">
                </div>
            </form>
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