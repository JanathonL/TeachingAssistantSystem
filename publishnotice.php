<?php //$course_id=$_SESSION["course_id"];?>

<?php //require "control/ListNotice.php"?>


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
    <title>发布通知</title>
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
        <!--        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="class.php">--><?php //if (isset($course)) {
        //                    echo $course->name;
        //                } ?><!--</a></div>-->
        <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="notices.php">通知列表</a></div>
        <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-black w3-hover-white w3-center"><a href="#">发布通知</a></div>
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

        </div>
        <div id="main">

            <form id="notice">
                <div class="row">
                    <div>主题</div>
                    <div>
                        <textarea name="name"></textarea>
                    </div>
                </div>
                <div class="row">
                    <div>内容</div>
                    <div>
                        <textarea name="message"></textarea>
                    </div>
                </div>
                <div class="row">
                    <input type="submit" name="submit" value="发布">
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