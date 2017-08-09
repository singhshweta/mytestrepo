<?php
require("connection.php");
$query = "SELECT clg_name, total_seats, vacant_seats FROM institute";
 $query_run = mysql_query($query);
while($row = mysql_fetch_assoc($query_run)){
echo ".<p>".$row['clg_name']." --->&nbsp&nbsp&nbsp"."Total seats =  ".$row['total_seats']." &nbsp&nbsp&nbsp&nbspVacant seats = ".$row['vacant_seats']."</p><br>";
}
//while($row = mysql_fetch_assoc($query_run)) 
		//{ 	e
				//echo $row['total_seats'] .$row['vacant_seats']; 
		//}

?>
<style >
	p{
		margin-left: 500px;
		margin-top: 30px;
		color: white;
		font-size: 25px;
	}
body{
	background-image: url(clg.jpg);
	background-repeat: no-repeat;
    webkit-background-size: cover;
  -moz-background-size: cover;
  -o-background-size: cover;
  background-size: cover;
}
</style>
<<!DOCTYPE html>
<html>
<body>

</body>
</html>