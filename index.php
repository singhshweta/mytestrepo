<?php
session_start();
$upErr="";
require("connection.php");
if (isset($_POST['stu_ID'])&&isset($_POST['password'])) {
	$username = $_POST['stu_ID'];
	$password = $_POST['password'];
	
	//$password_hash = md5($_POST['password']);
	if(!empty($username)&&!empty($password))
	{	
		// $query = "SELECT student_academic.stu_id, password, board% FROM student_academic, student_personal 
		// WHERE student_academic.stu_id = '" . mysql_real_escape_string($username) . "' AND password = '" . mysql_real_escape_string($password) ."'
		// AND board% >=("."SELECT cutoff_board FROM board, student_academic WHERE board.board_name=student_academic.board_name AND student_academic.stu_id = '".mysql_real_escape_string($username)."'".";)";
		
		$query = "SELECT student_academic.stu_id,P_1,fname, lname, f_fname, f_lname,board_per,NEET_score,NEET_rank  FROM student_academic, student_personal,names 
		WHERE student_academic.stu_id = '" . $username . "' AND password = '" . $password ."'
		AND board_per >=("."SELECT cutoff_board FROM board, student_academic WHERE board.board_name=student_academic.board_name AND student_academic.stu_id = '".$username."'".")";

		// echo $query;

		$query_run = mysql_query($query);
		 echo mysql_error();

		if($query_run)
		{	//echo "string";
			$query_num_rows = mysql_num_rows($query_run);
		if($query_num_rows==0)
			header('Location:'.'sorry.php');
		else if ($query_num_rows>=1)
		{	//echo "string";
			$s_id = mysql_result($query_run,0);
			//echo $s_id;
			$_SESSION['s_id'] = $s_id;

			header('Location:'.'choicefill.php');
		}
		}	


	}
			
	
	else{
		 $upErr="<p>Please fill all the required fields.</P>";
}
}
?>
 <!DOCTYPE html>
<html>
<head>
	<title>NEET2017</title>
</head>
<style>
body{
	background-image: url('back1.jpg');
	-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
	h2{
	margin-left: 500px;
		font-family: "verdana";
	color: white;


}
	h1{	
		font-size: 40px;
		color: white;
		margin-left: 550px;
	}

ul{
	list-style-type: none;
	margin-left: 520px;
}
li{
	float: left;
}
a{
	text-decoration: none;
	color: white;
}
p{
	color: white;
}
#log{
	margin-top: 202px;
	margin-left: 720px;
	background-color: grey;
	width: 300px;
	padding-top: 20px;
	padding-left: 70px;
	padding-bottom: 20px;
	border-radius: 20px;
}
#sub{
	margin-left: 60px;
	width: 70px;
	height: 20px;
	border-radius: 10px;
	padding-left: 20px;
}
.space{
	width: 180px;
	height: 25px;
	border-radius: 20px;
	padding-left: 20px;
}
#but{
	font-size: 15px;
	border-radius: 10px;
	width: 80px;
	height: 30px;
}
#error{
	color: white;
}
</style>
<body>
<h2><b>National Eligibilty cum Entrance Test</b></h2>
<h1><i>Joint Seat Allocation</i></h1>
<div id="nav">
<ul>
	<li>&nbsp<a href="#">HOME</a>&nbsp&nbsp&nbsp</li>
	<li>&nbsp<a href="seats.php"> AVAILABILTY CHART</a>&nbsp&nbsp&nbsp</li>
	<li>&nbsp<a href="institute.php">INSTITUTES</a>&nbsp&nbsp&nbsp</li>
	
</ul>
</div>
<div id="log">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
	<input type="text" name="stu_ID" class=space placeholder="student_ID">*<br><br>
	<input type="password" name="password" class="space" placeholder="password">*<br>
	<span class="error"><?php echo $upErr;?></span><br>
	<span id="sub"><input type="submit" value="Log in" name="submit" id="but"></span>
	<p>* required fields</p>
</form>
</body>
</html>