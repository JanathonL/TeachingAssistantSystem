<?php $class; ?>

<?php $title="课程详细"; require 'partial/head.php'; ?>
<link rel="stylesheet" href="style/common/basic.css"/>
<link rel="stylesheet" href="style/class/list.css"/>
<link rel="stylesheet" href="shared/css/font-awesome.css">
<link rel="stylesheet" href="shared/css/w3.css">
<link rel="stylesheet" href="style/class/class.css">
<script src="script/utils.js"></script>
<body>

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
                    <div class="publish-button button w3-input w3-border-light-gray w3-light-gray w3-hover-white w3-hover-shadow" onclick=""><a href="publishhomework.php">发布作业</a></div>
                    <?php
                }
            }
            ?>
            <form>
                <input class="w3-input w3-border-light-gray w3-light-gray w3-hover-white w3-hover-shadow" type="text" name="keyword" placeholder="搜索" onchange="searchStudents(this.value)">
            </form>
        </div>
        <div id="main">
            <div id="class-intro" class="panel"></div>
            <div id="notices" class="panel"></div>
            <div id="homeworks" class="panel"></div>
            <div id="forum" class="panel"></div>
        </div>
    </article>
</div>


<?php require './partial/footer.php'; ?>