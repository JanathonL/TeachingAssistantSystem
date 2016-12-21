<?php 

function getHomework($result,$id)
{
	foreach ($result as $row) {
    	if($row["id"]==$id){
       	 return $row;
    	}
	}
}


?>