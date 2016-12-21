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


<?php $title="布置作业";require './partial/head.php'; ?>
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="shared/css/font-awesome.css">
    <link rel="stylesheet" href="shared/css/w3.css">
    <link rel="stylesheet" href="style/class/publishhomework.css"/>


    <script src="script/utils.js"></script>
    <script src="script/publishhomework.js"></script>


<!--台头标题-->
<header class="w3-top w3-card-4">
    <?php require './partial/nav.php'; ?>

    <div id="map" class="w3-row">
        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="myclasses.php">我的课程</a></div>
        <?php if (isset($course)) {?>
            <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="course.php">
                <?php   echo $course->name;?>
            </a></div><?php       } ?>
        <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="homeworks.php">作业列表</a></div>
        <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-black w3-hover-white w3-center"><a href="#">布置作业</a></div>
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
                    <div>
                            <input class="file-update" type="file" name="image" accept="image/png,image/gif, image/jpg, image/jpeg" multiple="multiple" onchange="uploadImage(this)">
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


<?php include './partial/footer.php'; ?>