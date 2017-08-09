<?php
ob_start();
session_start();
//echo $_SESSION['s_id'];
require("connection.php");
if(isset($_SESSION['s_id'])&&!empty($_SESSION['s_id'])){
if(isset($_POST['pref1'])&&isset($_POST['pref2'])&&isset($_POST['pref3'])&&isset($_POST['pref4']))
{ 
  $pref1 = $_POST['pref1'];
  $pref2 = $_POST['pref2'];
  $pref3 = $_POST['pref3'];
  $pref4 = $_POST['pref4'];
   $query = "UPDATE student_academic
                SET P_1='".$pref1."', P_2='".$pref2."', P_3='".$pref3."', P_4='".$pref4."'
                 WHERE student_academic.stu_id = '".$_SESSION['s_id']."';";
  $query_run = mysql_query($query);
  if($query_run)
{   
  header('Location:'.'details.php');
}
}
}
else
{
  //echo "string";
  header('Location:'.'error.php');
}
?>




<!DOCTYPE html>
<html>
<head>
<title>Fill choices</title>
</head>
<style type="text/css">
	#box{
	margin-left: 200px;
	margin-top: 200px;
	font-size: 20px;
  padding-left: 40px;
  padding-top: 10px;
  padding-bottom: 10px;
  background-color: #DEB887;
  width: 500px;
  color:brown;
}
#done{
	margin-left: 150px;
}
#back{
	background: url(back2.jpg);
    background-size: 100% 100%;
    background-repeat: no-repeat;
    webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
.drop{
  width: 150px;
  height: 30px;
  border-radius: 5px;
}
#para{
  margin-left: 120px;
  font-family: georgia;
  color: brown;
}
</style>
<body background  id="back" >

<div id="box">
<p id="para">FILL YOUR CHOICES</p><br>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
Preference 1&nbsp
  <select name="pref1" class="drop">
  <option value="AIIMSD">AIIMSD</option>
  <option value="AIIMSB">AIIMSB</option>
  <option value="AIIMSP">AIIMSP</option>
  <option value="AIIMSH">AIIMSH</option>
</select><br><br>
Preference 2&nbsp<select name="pref2" class="drop">
  <option value="AIIMSD">AIIMSD</option>
  <option value="AIIMSB">AIIMSB</option>
  <option value="AIIMSP">AIIMSP</option>
  <option value="AIIMSH">AIIMSH</option>
</select><br><br>
Preference 3&nbsp<select name="pref3" class="drop">
  <option value="AIIMSD">AIIMSD</option>
  <option value="AIIMSB">AIIMSB</option>
  <option value="AIIMSP">AIIMSP</option>
  <option value="AIIMSH">AIIMSH</option>
</select><br><br>
Preference 4&nbsp<select name="pref4" class="drop">
  <option value="AIIMSD">AIIMSD</option>
  <option value="AIIMSB">AIIMSB</option>
  <option value="AIIMSP">AIIMSP</option>
  <option value="AIIMSH">AIIMSH</option>
</select>
<br><br>

<button id="done" value="submit">Done</button>
</form>
</div>
</body>
