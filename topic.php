<?php require "control/ListNotice.php"?>
<?php $result;
    //result为同一主题下的所有帖子内容
?>


<?php $title="帖子";require './partial/head.php'; ?>
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="style/class/topic.css"
    <script src="script/utils.js"></script>
    <script src="script/notice.js"></script>


<!--台头标题-->
<header>
    <h1>
        <?php echo $result->title; ?>
    </h1>
</header>
<?php include 'partial/message.php'; ?>
<div id="main">
    
    <!-- 左侧导航栏-->
    <aside>
        <div id="logo">
            <img src="pic/book.jpg">
            <h1>TAS</h1>
            <h3>TeachingAssistantSystem</h3>
        </div>
        <div id="nav">
            <ul>
                <li>
                    <a href="#"><img src="pic/book.jpg">个人信息</a>
                </li>
                <li>
                    <a href="#"><img src="pic/book.jpg">我的班级</a>
                </li>
            </ul>
        </div>
        <div id="logout">
            <ul>
                <li>
                    <a href="#"><img src="pic/book.jpg">退出</a>
                </li>
            </ul>
        </div>
    </aside>
    
    <!--右侧内容-->
    <article>
        <!--地址导航-->
        <div id="map">
            <ul>
                <li><a href="myclasses.php">我的课程</a></li>
                <li><a href="class.php"><?php $course->name ?></a></li>
                <li><a href="forum.php">论坛</a></li>
                <li class="maplast"><p><?php echo $result->title; ?></p></li>
            </ul>
        </div>
        <!--功能栏-->
        <div id="function-panel">
        </div>

        <!--帖子内容-->
        <div class="posts">
            <?php foreach ($result as $post){?>
            <div class="post">
                <div class="floor"><?php $post->floor;?></div>
                <div class="userID"><?php $post->userID;?></div>
                <div class="message">
                    <?php if($post->pre_id!=0) {
                        var $prePost;    //TODO:搜索之前的帖子
                        echo "<div class=\"pre-post\">" . $prePost->message . "</div>";
                    }?>
                    <p>
                        <?php $post->message;?>
                    </p>
                </div>
                <div class="update-time">
                    <?php echo $post->update_time; ?>
                </div>
                <div class="reply-button">
                    回复
                </div>
            </div>
<?php } ?>
        </div>

    </article>
</div>

<?php include './partial/footer.php'; ?>
