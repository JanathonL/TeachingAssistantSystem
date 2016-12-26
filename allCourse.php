<?php
    session_start();
    $_GET['listCourse'] = true;
    $_SESSION['type'] = 8;
    require 'control/listCourse.php';
    require 'control/login.php';
?>

<!DOCTYPE html>
<html>
    <head>
        <title>所有课程</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="shared/css/font-awesome.css">
        <link rel="stylesheet" href="shared/css/w3.css">
        <link rel="stylesheet" href="shared/css/all-course.css">
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
                    <a href="allCourse.php" target="_self">所有课程</a>
                </div>
                <div class="w3-col s4 m2 l1 w3-right w3-padding-8 w3-dark-gray w3-hover-white w3-center">
                    <a href="#" onclick="document.getElementById('login').style.display='block'">我的课程</a>
                </div>
                <div class="w3-col s4 w3-hide-medium w3-hide-large">
                    <button onclick="openAndCloseSidenav()" class="w3-btn-block w3-bottombar w3-border-dark-gray w3-hover-border-white w3-dark-gray w3-hover-white">菜单 <i class="fa fa-bars"></i></button>
                </div>
            </nav>

            <div id="searchBar" class="w3-row">
                <div class="w3-col s5 m5 l5">
                    <select id="searchType" class="w3-select w3-border-light-gray w3-light-gray w3-hover-white w3-hover-shadow" name="option">
                        <option value="1" selected>根据课程名称</option>
                        <option value="3">根据课程介绍</option>
                        <option value="5">根据课程英文名</option>
                        <option value="13">根据课程概要</option>
                        <option value="15">根据课程计划</option>
                        <option value="9">根据课程编号</option>
                        <option value="11">根据课程类别</option>
                        <option value="7">根据课程语言</option>
                        <option value="17">根据课程院系</option>
                        <option value="19">根据课程学分</option>
                    </select>
                </div>
                <div class="w3-col s5 m5 l5">
                    <input id="searchContent" onchange="searchCourse()" type="text" placeholder="搜索课程" class="w3-input w3-border-light-gray w3-light-gray w3-hover-white w3-hover-shadow">
                </div>
                <div class="w3-col s2 m2 l2">
                    <button id="searchButton" onclick="searchCourse()" class="w3-btn-block w3-bottombar w3-border-light-gray w3-hover-border-white w3-light-gray w3-hover-white w3-hover-shadow"><i class="fa fa-search"></i></button>
                </div>
            </div>
        </header>

        <nav id="sideNav" class="w3-hide w3-sidenav w3-white w3-card-4 w3-animate-left">
            <button onclick="openAndCloseSidenav()" class="w3-btn-block w3-bottombar w3-border-dark-gray w3-white w3-hover-light-gray">关闭菜单 <i class="fa fa-close"></i></button>
            <a href="#" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">教学支撑辅助网站</a>
            <a href="#" onclick="document.getElementById('login').style.display='block'" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">我的课程</a>
            <a href="allCourse.php" target="_self" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">所有课程</a>
            <a href="forum.php" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">论坛</a>
            <a href="#" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">帮助中心</a>
        </nav>

        <div id="login" class="w3-modal">
            <div class="w3-modal-content w3-card-4 w3-animate-zoom">
                <button onclick="document.getElementById('login').style.display='none'" class="w3-btn w3-closebtn w3-white w3-hover-black w3-hover-text-white"><i class="fa fa-close"></i></button>
                <form class="w3-container" action="allcourse.php" method="post">
                    <div class="w3-section">
                        <label>账号/学号</label><input class="w3-input w3-border w3-margin-bottom w3-hover-light-gray" type="text" name="username" placeholder="账号/学号" required>
                        <label>密码</label><input class="w3-input w3-border w3-margin-bottom w3-hover-light-gray" type="password" name="password" placeholder="密码" required>
                        <div class="w3-row-padding">
                            <div class="w3-quarter">
                                <input class="w3-radio" type="radio" name="type" value="1"><label class="w3-validate">学生</label>
                            </div>
                            <div class="w3-quarter">
                                <input class="w3-radio" type="radio" name="type" value="2"><label class="w3-validate">助教</label>
                            </div>
                            <div class="w3-quarter">
                                <input class="w3-radio" type="radio" name="type" value="3"><label class="w3-validate">教师</label>
                            </div>
                            <div class="w3-quarter">
                                <input class="w3-radio" type="radio" name="type" value="8"><label class="w3-validate">管理员</label>
                            </div>
                        </div>
                        <button class="w3-btn-block w3-section w3-padding w3-dark-gray" type="submit" name="submit">登录</button>
                    </div>
                </form>
            </div>
        </div>

        <br><br><br><br>

        <?php include 'partial/message.php'; ?>

        <?php
            if(isset($courseList))
            {
                $i = 0;
                echo '<div class="w3-row w3-margin">';
                foreach($courseList as $row)
                {
                    $i++;
                    $showOrHide = ($i > 9)?'w3-hide':'w3-show';
                    switch(rand(1,19))
                    {
                        case 1: $color = 'blue-grey'; break;
                        case 2: $color = 'light-grey'; break;
                        case 3: $color = 'purple'; break;
                        case 4: $color = 'deep-purple'; break;
                        case 5: $color = 'indigo'; break;
                        case 6: $color = 'blue'; break;
                        case 7: $color = 'light-blue'; break;
                        case 8: $color = 'cyan'; break;
                        case 9: $color = 'grey'; break;
                        case 10: $color = 'teal'; break;
                        case 11: $color = 'green'; break;
                        case 12: $color = 'light-green'; break;
                        case 13: $color = 'lime'; break;
                        case 14: $color = 'sand'; break;
                        case 15: $color = 'khaki'; break;
                        case 16: $color = 'yellow'; break;
                        case 17: $color = 'amber'; break;
                        case 18: $color = 'orange'; break;
                        case 19: $color = 'brown'; break;
                        default: $color = 'light-gray'; break;
                    }
                    $language="";
                    switch ($row->language) {
                        case '0':
                            $GLOBALS['language']="中文";
                            break;
                        case '1':
                            $GLOBALS['language']="英语";
                            break;
                        case '2':
                            $GLOBALS['language']="双语";
                            break;
                        default:
                            $GLOBALS['language']="其他语言";
                            break;
                    }
                    echo '<div id="course-'.$i.'" class="course '.$showOrHide.' w3-panel w3-col s12 m6 l4 w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-hover-shadow">';
                        echo '<button onclick="document.getElementById(\'course-detail-'.$i.'\').style.display=\'block\'" class="w3-btn w3-btn-block w3-bottombar w3-border-'.$color.' w3-hover-border-dark-gray w3-white w3-hover-dark-gray w3-xlarge">'.$row->course_name.'</button>';
                        echo '<p class="w3-hide-small paragraph-max-height-8em">'.$row->introduction.'</p>';
                        echo '<p>'.$row->department.' '.$row->credit.'学分'.' '.$language.'</p>';
                        echo '<div id="course-detail-'.$i.'" class="w3-modal">';
                            echo '<div class="w3-modal-content">';
                                echo '<div class="w3-container">';
                                    echo '<button onclick="document.getElementById(\'course-detail-'.$i.'\').style.display = \'none\'" class="w3-btn w3-closebtn w3-hover-dark-gray w3-white"><i class="fa fa-close"></i></button>';
                                    echo '<p class="w3-center w3-bottombar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">'.$row->course_name.'</p>';
                                    echo '<p class="w3-container w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">课程介绍</p>';
                                    echo '<p class="w3-container">'.$row->introduction.'</p>';
                                    echo '<p class="w3-container w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">课程英文名</p>';
                                    echo '<p class="w3-container">'.$row->English_name.'</p>';
                                    echo '<p class="w3-container w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">课程语言</p>';
                                    echo '<p class="w3-container">'.$language.'</p>';
                                    echo '<p class="w3-container w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">课程编号</p>';
                                    echo '<p class="w3-container">'.$row->course_id.'</p>';
                                    echo '<p class="w3-container w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">课程类别</p>';
                                    echo '<p class="w3-container">'.$row->Course_type.'</p>';
                                    echo '<p class="w3-container w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">课程概要</p>';
                                    echo '<p class="w3-container">'.$row->content.'</p>';
                                    echo '<p class="w3-container w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">课程计划</p>';
                                    echo '<p class="w3-container">'.$row->plan.'</p>';
                                    echo '<p class="w3-container w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">课程院系</p>';
                                    echo '<p class="w3-container">'.$row->department.'</p>';
                                    echo '<p class="w3-container w3-leftbar w3-border-'.$color.' w3-hover-border-dark-gray w3-xlarge">课程学分</p>';
                                    echo '<p class="w3-container">'.$row->credit.'</p>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }
                echo '</div>';
                $courseCount = count($courseList);
                $pageCount = ceil($courseCount / 9);
                if($pageCount > 1)
                {
                    echo '<div id="pagination" class="w3-show w3-center">';
                        echo '<ul class="w3-pagination w3-padding">';
                            echo '<li><button onclick="goToPage(1)" class="w3-btn w3-white w3-hover-dark-gray w3-xlarge"><i class="fa fa-angle-double-left"></i></button></li>';
                            echo '<li><button id="page-button-1" onclick="goToPage(1)" class="page-button w3-btn w3-dark-gray w3-hover-dark-gray w3-xlarge">1</button></li>';
                            for ($j = 2; $j <= $pageCount; $j++)
                            {
                                echo '<li><button id="page-button-'.$j.'" onclick="goToPage('.$j.')" class="page-button w3-btn w3-white w3-hover-dark-gray w3-xlarge">'.$j.'</button></li>';
                            }
                            echo '<li><button onclick="goToPage('.$pageCount.')" class="w3-btn w3-white w3-hover-dark-gray w3-xlarge"><i class="fa fa-angle-double-right"></i></button></li>';
                        echo '</ul>';
                    echo '</div>';
                }
            }
        ?>

        <footer>
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