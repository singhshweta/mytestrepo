<?php  
ob_start();
session_start();
function getuserfield($field)
{	
	$query = "SELECT ".$field." FROM student_academic,names,institute WHERE names.stu_ID = '".$_SESSION['s_id']."'";
	if($query_run = mysql_query($query))
	{
		if($query_result = mysql_result($query_run,0))	
		{
			return $query_result; 
		}		
	}
}



?>