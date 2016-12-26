<?php //include 'control/searchStudent.php'; ?>

<?php $title="成绩查询"; require './partial/head.php'; ?>
    <link rel="stylesheet" href="style/common/basic.css"/>
    <link rel="stylesheet" href="style/class/students.css"/>
    <link rel="stylesheet" href="style/class/list.css"/>

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
</header>

<?php require './partial/slidenav.php'; ?>

<br><br><br><br>

<?php include 'partial/message.php'; ?>

<div id="wrapper">
    <article>
            <div id="functional-panel">

                <form>
                    <input type="text" name="keyword" placeholder="搜索" onchange="searchStudents(this.value)">
                </form>
            </div>
        <div id="main">
            <div id="students" ></div>
            <?php
                if(isset($type)) {
                    if($type>1) {
                        echo '<div class="button add-grade-button" onclick="">添加成绩栏</div>';
                        }
                    }
            ?>
        </div>
    </article>
</div>


<?php require './partial/footer.php'; ?>