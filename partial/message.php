<?php
    if (isset($_SESSION["message"])) {
        switch ($_SESSION["message_type"]) {
            case "success"; $color = 'green'; break;
            case "info": $color = 'green'; break;
            case "warning": $color = 'yellow'; break;
            case "danger": $color = 'red'; break;
            default: $color = 'blue'; break;
            }
        echo '<div class="w3-container w3-card-4 w3-'.$color.'">';
            echo '<button onclick="this.parentElement.style.display=\'none\'" class="w3-btn w3-closebtn w3-'.$color.' w3-hover-white w3-hover-text-black"><i class="fa fa-close"></i></button>';
            echo '<p>'.$_SESSION["message"].'</p>';
        echo '</div>';
        unset($_SESSION["message"]);
        unset($_SESSION["message_type"]);
    }
?>