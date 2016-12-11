<?php 
public function successMessage($message)
{
	$_SESSION['message']=$message;
    $_SESSION['message_type'] = "success";
}
public function failureMessage($message,$message_type)
{
	$_SESSION['message']=$message;
    $_SESSION['message_type'] = $message_type;
}
public function failureMessage($message)
{
	$_SESSION['message']=$message;
    $_SESSION['message_type'] = "info";
}
      
?>