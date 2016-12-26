<?php
    session_start();
    if (!isset($_GET['Teacher1'])&&!isset($_GET['course_time1'])) {
             $_GET['Teacher1']=$_SESSION["Teacher1"];
             $_GET['course_time1']=$_SESSION["course_time1"];
            $_GET['course_id']=$_SESSION["course_id"];
    }
    

    require 'control/deleteNotice.php';    
    require 'control/deleteHomework.php';
    require 'control/listHomework.php';
    $homeworks = $result;
    $materials = ListItems("material");
    $notices = ListItems("Notice");
?>

<!DOCTYPE html>
<html>
    <head>
        <title>课程详细</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="shared/css/font-awesome.css">
        <link rel="stylesheet" href="shared/css/w3.css">
        <link rel="stylesheet" href="style/common/basic.css"/>
        <link rel="stylesheet" href="style/class/list.css"/>
        <link rel="stylesheet" href="style/class/class.css">
        <script src="shared/js/allCourse.js"></script>
    </head>

    <body>
        <header class="w3-top w3-card-4">
            <nav id="topNav" class="w3-row w3-light-grey">
                <div class="w3-col l2 w3-hide-small w3-hide-medium w3-padding-8 w3-dark-gray w3-hover-white w3-center">
                    <a href="#" target="_blank">教学支撑辅助网站</a>
                </div>
                <div class="w3-col m1 w3-hide-small w3-hide-large w3-padding-8 w3-dark-gray w3-hover-white w3-center">
                    <a href="#" target="_blank"><i class="fa fa-home"></i></a>
                </div>
                <div class="w3-col m2 l1 w3-hide-small w3-right w3-padding-8 w3-dark-gray w3-hover-white w3-center">
                    <a href="#" target="_blank">帮助中心</a>
                </div>
                <div class="w3-col m1 l1 w3-hide-small w3-right w3-padding-8 w3-dark-gray w3-hover-white w3-center">
                    <a href="forum.php" target="_blank">论坛</a>
                </div>
                <div class="w3-col m2 l1 w3-hide-small w3-right w3-padding-8 w3-black w3-hover-white w3-center">
                    <a href="allCourse.php" target="_blank">所有课程</a>
                </div>
                <div class="w3-col s4 m2 l1 w3-right w3-padding-8 w3-dark-gray w3-hover-white w3-center">
                    <a href="mycourses.php" target="_blank">我的课程</a>
                </div>
                <div class="w3-col s4 w3-hide-medium w3-hide-large">
                    <button onclick="openAndCloseSidenav()" class="w3-btn-block w3-bottombar w3-border-dark-gray w3-hover-border-white w3-dark-gray w3-hover-white">菜单 <i class="fa fa-bars"></i></button>
                </div>
            </nav>

            <div id="tabs">
                <div class="w3-row">
                    <div class="w3-col s4 m4 l4">
                        <button onclick="openCity(event, 'notices')" class="tab w3-btn-block w3-hover-border-white w3-dark-gray w3-hover-white w3-hover-shadow">通知</button>
                    </div>
                    <div class="w3-col s4 m4 l4">
                        <button onclick="openCity(event, 'homeworks')" class="tab w3-btn-block w3-hover-border-white w3-light-gray w3-hover-white w3-hover-shadow">作业</button>
                    </div>
                    <div class="w3-col s4 m4 l4">
                        <button  onclick="openCity(event, 'materials')" class="tab w3-btn-block w3-hover-border-white w3-light-gray w3-hover-white w3-hover-shadow">资料</button>
                    </div>
                </div>
            </div>
        </header>

        <nav id="sideNav" class="w3-hide w3-sidenav w3-white w3-card-4 w3-animate-left">
            <button onclick="openAndCloseSidenav()" class="w3-btn-block w3-bottombar w3-border-dark-gray w3-white w3-hover-light-gray">关闭菜单 <i class="fa fa-close"></i></button>
            <a href="#" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">教学支撑辅助网站</a>
            <a href="mycourses.php" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">我的课程</a>
            <a href="allCourse.php" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">所有课程</a>
            <a href="forum.php" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">论坛</a>
            <a href="#" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">帮助中心</a>
        </nav>

        <br><br><br><br>

        <?php include 'partial/message.php'; ?>

        <div class="w3-container">
            <div id="notices" class="tabContent w3-container">
                <div class="w3-container w3-center w3-padding w3-dark-gray">
                    <a href="publishnotice.php" class="w3-padding w3-hover-white w3-hover-shadow">发布通知</a>
                </div>
                <?php
                    echo '<div class="w3-row">';
                    foreach ($notices as $notice) {
                        echo '<div class="w3-col s12 m6 l6 w3-panel w3-leftbar w3-hover-shadow">';
                            echo '<div class="name"><a href="notice.php?notice_id='.$notice['id'].'" target="_blank">'.$notice['message'].'</a></div>';
                            echo '<div class="date">'.$notice['pub_date'].'</div>';
                            echo '<div>'.$notice['year'].'</div>';
                            echo '<div>'.$notice['message'].'</div>';

                            echo '<div class="w3-container w3-center w3-padding w3-light-gray">';
                                echo '<a href="course.php?noticeid='.$notice["id"].'"  class="w3-padding w3-hover-white w3-hover-shadow">删除</a>';
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                ?>
            </div>

            <div id="homeworks" class="tabContent w3-container" style="display:none">
                <div class="w3-container w3-center w3-padding w3-dark-gray">
                    <a href="publishhomework.php" target="_blank" class="w3-padding w3-hover-white w3-hover-shadow">发布作业</a>
                </div>
                <div id="notice" class="w3-modal">
                    <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                         <button onclick="document.getElementById('notice').style.display='none'" class="w3-btn w3-closebtn w3-white w3-hover-black w3-hover-text-white"><i class="fa fa-close"></i></button>
                    </div>
                </div>
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

                <?php
                    echo '<div class="w3-row">';
                    foreach ($homeworks as $homework) {
                        echo '<div class="w3-col s12 m6 l6 w3-panel w3-leftbar w3-hover-shadow">';
                            echo '<div class="name"><a href="homework.php?id='.$homework['id'].'" target="_blank">'.$homework['name'].'</a></div>';
                            echo '<div class="date">'.'发布日期 ： '.$homework['post_time'].'</div>';
                            echo '<div class="date">'.'更新日期 ： '.$homework['update_time'].'</div>';
                            echo '<div class="date">'.'截止日期 ： '.$homework['deadline'].'</div>';
                            echo '<div class="w3-row">';
                                echo '<div class="w3-container w3-half w3-center w3-padding w3-light-gray">';
                                    echo '<a href="correcthomework.php?homeworkid='.$homework["id"].'&correcthomework=true'.'"  class="w3-padding w3-hover-white w3-hover-shadow">批改</a>';
                                echo '</div>';
                                echo '<div class="w3-container w3-half w3-center w3-padding w3-light-gray">';
                                    echo '<a href="course.php?homeworkid='.$homework["id"].'&deleteHomework=true'.'"  class="w3-padding w3-hover-white w3-hover-shadow">删除</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                ?>
            </div>
                
            <div id="materials" class="tabContent w3-container" style="display:none">
                <div class="w3-container w3-center w3-padding w3-dark-gray">
                    <a href="publishmaterial.php" target="_blank" class="w3-padding w3-hover-white w3-hover-shadow">上传资料</a>
                </div>
                <?php
                    echo '<div class="w3-row">';
                    foreach ($materials as $material) {
                        echo '<div class="w3-col s12 m6 l6 w3-panel w3-leftbar w3-hover-shadow">';
                            echo '<div class="name"><a href="$material[\'url\']" target="_blank">'.$material['name'].'</a></div>';
                            echo '<div>'.'发布日期 ： '.$material['post_time'].'</div>';
                            echo '<div>'.'更新日期 ： '.$material['update_time'].'</div>';
                            echo '<div>'.'发布者 ： '.$material['Teacher1'].'</div>';
                            echo '<div class="w3-row">';
                                echo '<div class="w3-container w3-half w3-center w3-padding w3-light-gray">';
                                    echo '<a href="'.$material["url"].'" target="_blank" class="w3-padding w3-hover-white w3-hover-shadow">重传</a>';
                                echo '</div>';
                                echo '<div class="w3-container w3-half w3-center w3-padding w3-light-gray">';
                                    echo '<a href="'.$material["url"].'" target="_blank" class="w3-padding w3-hover-white w3-hover-shadow">删除</a>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    }
                    echo '</div>';
                ?>
            </div>

            <script>
            function openCity(evt, cityName) {
                var i, x, tablinks;
                x = document.getElementsByClassName("tabContent");
                for (i = 0; i < x.length; i++) {
                    x[i].style.display = "none";
                }
                tablinks = document.getElementsByClassName("tab");
                for (i = 0; i < x.length; i++) {
                    tablinks[i].className = tablinks[i].className.replace("w3-dark-gray", "w3-light-gray");
                }
                document.getElementById(cityName).style.display = "block";
                evt.currentTarget.className += " w3-dark-gray";
            }
            </script>

        </div>

        <footer id="footer">
            <div id="bottom" class="w3-row">
                <div class="w3-col s4 m4 l4 w3-center w3-padding w3-black w3-text-white">
                    <a href="#" onclick="document.getElementById('login').style.display='block'" class="w3-hover-white w3-hover-shadow">我的课程</a>
                </div>
                <div class="w3-col s4 m4 l4 w3-center w3-padding w3-dark-grey w3-text-white">
                    <a href="forum.php" target="_blank" class="w3-hover-white w3-hover-shadow">课程论坛</a>
                </div>
                <div class="w3-col s4 m4 l4 w3-center w3-padding w3-grey w3-text-white">
                    <a href="#" target="_blank" class="w3-hover-white w3-hover-shadow">帮助中心</a>
                </div>
            </div>
            <div class="w3-container w3-center w3-padding w3-light-gray">
                <a href="#" target="_blank" class="w3-padding w3-hover-white w3-hover-shadow">Powered by tas</a>
            </div>

            <aside id="goToTop" class="w3-tooltip">
                <div class="w3-text w3-padding w3-dark-gray">到顶部</div>
                <a href="#" class="w3-btn-floating-large w3-dark-gray w3-hover-white w3-xxlarge"><i class="fa fa-angle-double-up"></i></a>
            </aside>
            <aside id="goToBottom" class="w3-tooltip">
                <div class="w3-text w3-padding w3-dark-gray">到底部</div>
                <a href="#bottom" class="w3-btn-floating-large w3-dark-gray w3-hover-white w3-xxlarge"><i class="fa fa-angle-double-down"></i></a>
            </aside>
        </footer>
    </body>
</html>