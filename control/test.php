<?php 
/**
* 
*/
class Test
{
	
	function Test($test,$asdf)
	{
		# code...
		$this->test=$test;
		$this->asdf=$asdf;
	}
}
$q=new Test('qwer','df');
$test=array('a'=>'1','b'=>'2','c'=>$q);
echo json_encode($test);
 ?>