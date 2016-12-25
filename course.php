<?php session_start(); ?>
<?php require 'control/listHomework.php'; ?>
<?php $homeworks = $result; ?>
<?php $materials = ListItems("material"); ?>
<?php $notices = ListItems("Notice"); ?>

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
        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="mycourses.php">我的课程</a></div>
                <div class="maplast w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="course.php"><?php if (isset($course)) {
                            echo $course->name;
                        } ?></a></div>
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

        </div>
        <div id="main">
            <div id="class-intro" class="panel"></div>
            <div id="notices" class="panel">
                <div class="top row"><h1>通知</h1><a href="notices.php">more</a></div>
                <?php $count=0;
                    foreach ($notices as $notice){
                        ?>
                <div class="row">
                    <div class="name"><a href="notice.php?notice_id=<?php echo $notice['id']; ?>"><?php echo $notice['message']; ?></a></div>
                    <div class="date"><?php echo $notice['pub_date']; ?></div>
                </div>
                <?php
                        if($count>=3){
                            break;
                        } else {
                            $count++;
                        }
                    }?>
            </div>
            <div id="homeworks" class="panel">
            <div class="top row"><h1>作业</h1><a href="homeworks.php">more</a></div>
            <?php $count=0;
            foreach ($homeworks as $homework){
                ?>
                <div class="row">
                    <div class="name"><a href="homework.php?id=<?php echo $homework['id']; ?>"><?php echo $homework['name']; ?></a></div>
                    <div class="date"><?php echo $homework['post_time']; ?></div>
                    <div class="deadline"><?php echo $homework['deadline']?></div>
                </div>
                <?php
                if($count>=3){
                    break;
                } else {
                    $count++;
                }
            }?>
            </div>
            <div id="materials" class="panel">
                <div class="top row"><h1>资料</h1><a href="material.php">more</a></div>
                <?php $count=0;
                foreach ($materials as $material){
                    ?>
                    <div class="row">
                        <div class="name"><a href="<?php echo $material['url']?>"><?php echo $material['name']; ?></a></div>
                        <div class="date"><?php echo $material['pub_date']; ?></div>
                    </div>
                    <?php
                    if($count>=3){
                        break;
                    } else {
                        $count++;
                    }
                }?>
            </div>
        </div>
    </article>
</div>


<?php require './partial/footer.php'; ?>