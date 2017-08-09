<?php
//session_start();
require("connection.php");
require("core.php");
//echo $_SESSION['s_id'];
if(isset($_SESSION['s_id'])&&!empty($_SESSION['s_id'])){
$fname = getuserfield('fname');
$lname = getuserfield('lname');
$f_fname = getuserfield('f_fname');
$f_lname = getuserfield('f_lname');
$board_per = getuserfield('board_per');
$NEET_score = getuserfield('NEET_score');
$NEET_rank = getuserfield('NEET_rank');
$clg_allot = getuserfield('P_1');
$seat_vacant = getuserfield('vacant_seats') - 1;
$query = "UPDATE institute
			SET vacant_seats = ".$seat_vacant ."
			WHERE clg_name = '".$clg_allot."'";
$query_run = mysql_query($query);			

}
else
echo header('Location:'.'error.php');

?>

<!DOCTYPE html>
<html>
<head>
<title>Student Details</title>
</head>
<style type="text/css">
body{
	background-image: url('images.jpg');
	-webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
#details{
	padding-left: 20px;
	padding-right: 20px;
	padding-top: 20px;
	padding-bottom: 20px;
	color: brown;
	font-size: 20px;
	width: 400px;
	margin-top: 50px;
	margin-left: 400px;
	font-family: Comic Sans MS;
}
#student{
	margin-left: 450px;
	font-size: 70px;
	color: brown;
	font-family: "Comic Sans MS";
	margin-top: 100px;	

}
#logout{
	margin-left: 600px;
	margin-top: 80px;
	font-size: 20px;
}
a{
	text-decoration: none;
}
#lg{
	margin-left: 500px;
	font-size: 30px;
	color: brown;
}
</style>

<body>
<h1 id="student">Student Profile</h1>
<p id = "lg"><?php echo "You are logged in as ".$_SESSION['s_id']; ?></p>
<div id="details">
	Name: <?php echo $fname." ".$lname; ?>
	<br>
	Father's Name: <?php echo $f_fname." ".$f_lname; ?>
	<br>
	Board %: <?php echo $board_per; ?>
	<br>
	NEET Score: <?php echo $NEET_score; ?>
	<br>
	NEET Rank: <?php echo $NEET_rank; ?>
	<br>
	College Allotted: <?php echo $clg_allot; ?>
	<br>
	<button id="logout"><a href = 'logout.php'>logout</a></button><br>
</div>

</body>
