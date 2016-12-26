<?php
    require  'control/isLogin.php';
    $_GET['listCourse'] = true;
    require 'control/listCourse.php';
    switch ($type) {
        case 1: $List = $result_student; break; //学生
        case 2; $List = $result_teacher_assistant; break; //助教
        case 8: $List = $result_administrator; break; //管理员
        default: break;
    }
?>

<!DOCTYPE html>
<html>
    <head>
        <title>我的课程</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="shared/css/font-awesome.css">
        <link rel="stylesheet" href="shared/css/w3.css">
        <link rel="stylesheet" href="shared/css/my-courses.css">
        <script src="shared/js/myCourses.js"></script>
    </head>

    <body>
        <header id="header" class="w3-top w3-card-4">
            <nav id="topNav" class="w3-row w3-light-grey">
                <div id="openNav" class="w3-col m2 l2 w3-hide-small w3-padding-8 w3-dark-gray w3-hover-white w3-center">
                    <a href="#" onclick="w3_open()">菜单 <i class="fa fa-bars"></i></a>
                </div>
                <div id="openNav" class="w3-col s4 w3-hide-medium w3-hide-large w3-padding-8 w3-dark-gray w3-hover-white w3-center">
                    <a href="#" onclick="openAndCloseSidenav()">菜单 <i class="fa fa-bars"></i></a>
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
                     <a href="control/logout.php">注销</a>
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
            <a href="#" onclick="openAndCloseSidenav()" class="w3-center w3-margin w3-bottombar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">关闭菜单 <i class="fa fa-close"></i></a>
            <a href="#" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">教学支撑辅助网站</a>
            <a href="control/logout.php" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">注销</a>
            <a href="allCourse.php" target="_self" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">所有课程</a>
            <a href="forum.php" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">论坛</a>
            <a href="#" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">帮助中心</a>
        </nav>

        <nav id="sideNav2" class="w3-sidenav w3-white w3-card-4 w3-animate-left" style="display: none">
            <a href="#" onclick="w3_close()" class="w3-center w3-margin w3-bottombar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">关闭菜单 <i class="fa fa-close"></i></a>
            <a href="#" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">教学支撑辅助网站</a>
            <a href="control/logout.php" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">注销</a>
            <a href="allCourse.php" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">所有课程</a>
            <a href="forum.php" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">论坛</a>
            <a href="#" target="_blank" class="w3-margin w3-leftbar w3-border-dark-gray w3-hover-light-gray w3-hover-shadow">帮助中心</a>
        </nav>

        <br><br><br><br>

        <?php include 'partial/message.php'; ?>

        <?php
            if(isset($courseList))
            {
                $i = 0;
                echo '<div id="main" class="w3-row">';
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
                        echo '<div class="w3-center w3-bottombar w3-border-'.$color.' w3-hover-border-dark-gray w3-white w3-xlarge">'.$row->course_name.'</div>';
                        echo '<p class="w3-hide-small paragraph-max-height-8em">'.$row->introduction.'</p>';
                        echo '<div class="w3-btn w3-btn-block w3-white w3-hover-dark-gray">';
                            echo '<a href="course.php?course_id='.$row->course_id.'&Teacher1='.$row->Teacher1.'&course_time1='.$row->course_time1.'" target="_blank">进入课程</a>';
                        echo '</div>';
                        echo '<div id="course-detail-'.$i.'" class="w3-modal">';
                            echo '<div class="w3-modal-content">';
                                echo '<div class="w3-container">';
                                    echo '<button onclick="document.getElementById(\'course-detail-'.$i.'\').style.display = \'none\'" class="w3-btn w3-display-topright w3-hover-dark-gray w3-white">关闭 <i class="fa fa-close"></i></button>';
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

        <footer id="footer">
            <div id="bottom" class="w3-row">
                <div class="w3-col s4 m4 l4 w3-center w3-padding w3-black w3-hover-white">
                    <a href="#" onclick="document.getElementById('login').style.display='block'">我的课程</a>
                </div>
                <div class="w3-col s4 m4 l4 w3-center w3-padding w3-dark-grey w3-hover-white">
                    <a href="forum.php" target="_blank">课程论坛</a>
                </div>
                <div class="w3-col s4 m4 l4 w3-center w3-padding w3-grey w3-text-white w3-hover-white">
                    <a href="#" target="_blank">帮助中心</a>
                </div>
            </div>
            <div class="w3-container w3-center w3-padding w3-light-gray w3-hover-white">
                <a href="#" target="_blank">Powered by tas</a>
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