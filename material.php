<?php
//输入输出相关参数参考ListItems.php
?>
<?php
//require 'control/ListItems.php';
//require 'control/ListHomework.php';
//require 'control/ListMatirial.php';
//require 'control/ListNotice.php';
//$result=ListItems("material");

//test
class M{
    public $name = "name";
    public $url = "url.docx";
    public $update_time = "2016";
    public $teacher1 = "li";
}
$result=array(new M);
$type = 2;
?>
<?php $title="课程资料";require './partial/head.php'; ?>

    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="shared/css/font-awesome.css">
    <link rel="stylesheet" href="shared/css/w3.css">
    <link rel="stylesheet" href="style/class/material.css"/>
    <script src="script/utils.js"></script>


<!--台头标题-->
<header class="w3-top w3-card-4">
    <?php require './partial/nav.php'; ?>

    <div id="map" class="w3-row">
        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="myclasses.php">我的课程</a></div>
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
            <form>
                <input class="w3-input w3-border-light-gray w3-light-gray w3-hover-white w3-hover-shadow" type="text" name="keyword" placeholder="搜索" onchange="">
            </form>
            <?php if(isset($type)){ ?>
                <?php if($type>1){
                    ?>
                    <div class="publish-button button w3-input w3-border-light-gray w3-light-gray w3-hover-white w3-hover-shadow" onclick=""><a href="publishmaterial.php">上传资料</a></div>
                    <?php
                }
            }
            ?>
        </div>
<div id="main">
    <!--资料条目-->
    <div class="list">
        <div class="material title row">
            <div class="material title name">文件</div>
            <div class="material title update-time">上传时间</div>
            <div class="material title teacher">上传者</div>
        </div>

        <?php
        foreach($result as $material) {
            echo "<div class=\"material row\">";
            echo "<a class=\"material name\" href=\"" . $material->url . "\">" . $material->name . "</a>";
            echo "<span class=\"update-time\">" . $material->update_time . "</span>";
            echo "<span class=\"teacher\">" . $material->teacher1 . "</span>";
            if(isset($type)){
                if($type>1){
                    echo "<a class=\"button modify-button\" href=\"".$material->url."\">重传</a>";
                    echo "<a class=\"button delete-button\" href=\"".$material->url."\">删除</a>";
                }
            }
            echo "</div>";
        }
        ?>

    </div>
    </article>
</div>




<?php include './partial/footer.php'; ?>