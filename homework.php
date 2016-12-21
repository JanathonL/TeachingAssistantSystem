<?php 
require 'control/listHomework.php';
require  'control/getHomework.php';
?>
<?php
echo "result".$result;
$homework=getHomework($result,$_GET["id"]);

//?>

<?php $title="作业";require './partial/head.php'; ?>
<link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="shared/css/font-awesome.css">
    <link rel="stylesheet" href="shared/css/w3.css">

    <link rel="stylesheet" href="style/class/homework.css">

    <script src="script/utils.js"></script>



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

<?php require './partial/slidenav.php'; ?>

<br><br><br><br>
<?php include 'partial/message.php'; ?>


<div id="wrapper">
    <!--内容-->
    <article>
        <!--题目选择按钮-->
        <div id="functional-panel">

        </div>
        <div id="main">
            <div id="homeworks" style="height:<?php echo count($result)*100?>%">
            <?php 
                if($homework["type"] == 1){//选择题
                    ?>
                    <div class="homework">
                        <div class="name"><?php echo $homework["name"]?></div>
                        <div class="content"><?php echo $homework["content"]?></div>
                        <div class="answer">
                            <form action="control/submithomework.php">
                                <!-- 选择题的内容格式要规定一下 -->
                                <input type="radio" name="answer" value="1">
                                <input type="submit" name="submit" value="提交">
                            </form>
                        </div>
                    </div>
            <?php
                } else if($homework["type"] == 2){//问答题
                    ?>
                    <div class="homework">
                        <div class="name"><?php echo $homework["name"]?></div>
                        <div class="content"><?php echo $homework["content"]?></div>
                        <div class="answer">
                            <form action="control/submithomework.php">
                                <textarea name="answer"></textarea>
                                <input type="submit" name="submit" value="提交">
                            </form>
                        </div>
                    </div>
            <?php
                }
   //end of foreach?>
            </div>
        </div>
    </article>
</div>


<?php require './partial/footer.php'; ?>