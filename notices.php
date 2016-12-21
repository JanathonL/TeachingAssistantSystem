<?php require "control/ListNotice.php"?>
<?php
class M{
    public $name = "name";
    public $url = "url";
    public $update_time = "update_time";
    public $teacher1 = "teacher1";
    public $id="id";
    public $deadlin="deadline";
    public $pub_date="pubdate";
}

$result=array(new M, new M);
$type = 2;
?>

<?php $title="通知";require './partial/head.php'; ?>
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="shared/css/font-awesome.css">
    <link rel="stylesheet" href="shared/css/w3.css">
    <link rel="stylesheet" href="style/class/notices.css"/>
    <script src="script/utils.js"></script>
    <script src="script/notice.js"></script>


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
            <?php if(isset($type)){ ?>
                <?php if($type>1){
                    ?>
                    <div class="publish-button button w3-input w3-border-light-gray w3-light-gray w3-hover-white w3-hover-shadow" onclick=""><a href="publishnotice.php">发布通知</a></div>
                    <?php
                }
            }
            ?>
        </div>
        <div id="main">
            <div class="list">
                <div class="notice title row">
                    <div class="notice title name">主题</div>
                    <div class="notice title date ">日期</div>
                </div>
                <?php
                foreach ($result as $notice){
                    ?>
                    <div class="row">
                        <div class="name"><a href="notice.php?notice_id=<?php echo $notice->id; ?>"><?php echo $notice->name; ?></a></div>
                        <div class="date"><?php echo $notice->pub_date; ?></div>
                        <?php if(isset($type)){
                            if($type>1){
                                ?>
                                <a class="button delete-button" href="./control/deleteNotice.php?noticeid=<?php echo $notice->id ?>">删除</a>
                        <?php
                            }
                        }
                        ?>
                    </div>
                    <?php
                }
                ?>
            </div>
        </div>
    </article>
</div>


<?php include './partial/footer.php'; ?>