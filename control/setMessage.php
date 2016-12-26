<?php 
function successMessage($message)
{
	$_SESSION['message']=$message;
    $_SESSION['message_type'] = "success";
}
function failureMessage($message,$message_type)
{
	$_SESSION['message']=$message;
    $_SESSION['message_type'] = $message_type;
}
function InfoMessage($message)
{
	$_SESSION['message']=$message;
    $_SESSION['message_type'] = "info";
}
      
?>