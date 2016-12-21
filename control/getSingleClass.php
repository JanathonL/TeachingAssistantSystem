<?php 
function getSingleClass($course_id,$single_class)
{
	foreach ($single_class as $row) {
		if ($course_id==$row["course_id"]) {
			return $row;
		}
	}
} 
?>