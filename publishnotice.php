<?php //$course_id=$_SESSION["course_id"];?>

<?php 
 session_start();
 require "control/addNotice.php";?>


<?php $title="发布通知";require './partial/head.php'; ?>
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="shared/css/font-awesome.css">
    <link rel="stylesheet" href="shared/css/w3.css">
    <link rel="stylesheet" href="style/class/publishhomework.css"/>


    <script src="script/utils.js"></script>


<!--台头标题-->
<header class="w3-top w3-card-4">
    <?php require './partial/nav.php'; ?>

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
<?php require './partial/slidenav.php'; ?>

<br><br><br><br>
<?php include 'partial/message.php'; ?>

<div id="wrapper">
    <!--内容-->
    <article>
        <div id="functional-panel">

        </div>
        <div id="main">

            <form id="notice" action="publishnotice.php" method="post">
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


<?php include './partial/footer.php'; ?>