<?php //include 'control/searchStudent.php'; ?>

<?php $title="成绩查询";require './partial/head.php'; ?>
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/students.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>
    <link rel="stylesheet" href="shared/css/font-awesome.css">
    <link rel="stylesheet" href="shared/css/w3.css">

    <script src="script/classutil.js"></script>
    <script src="script/domutil.js"></script>
    <script src="script/listutil.js"></script>
    <script src="script/ajax.js"></script>
    <script src="script/student.js"></script>    
    <script>
        window.onload = function(){
           // students= <?php //echo json_encode($result_students);?>;
            students=[
                {
                    name: "Avater",
                    id:304,
                    homework1:89
                },
                {
                    name:"Bock",
                    id:504,
                    homework1:79
                },
                {
                    name:"Calie",
                    id:402,
                    homework1:85
                }
            ];
            showStudents(students);
        };
    </script>


<!--台头标题-->
<header class="w3-top w3-card-4">
    <?php require './partial/nav.php'; ?>


    <div id="map" class="w3-row">
        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="myclasses.php">我的课程</a></div>
        <?php if (isset($course)) {?>
        <div class="w3-col m2 l1 w3-hide-small w3-left w3-padding-8 w3-dark-gray w3-hover-white w3-center"><a href="class.php">
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
            <div id="functional-panel">
            <?php if(isset($type)){ ?>
                <?php if($type>1){
                    ?>
                    <div class="button add-grade-button" onclick="">添加成绩栏</div>
                    <?php
                }
            }
                ?>
                <form>
                    <input type="text" name="keyword" placeholder="搜索" onchange="searchStudents(this.value)">
                </form>
            </div>
        <div id="main">
            <div id="students" ></div>
        </div>
    </article>
</div>


<?php require './partial/footer.php'; ?>