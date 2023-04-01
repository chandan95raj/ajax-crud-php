<?php
include("config.php");
$Id = $_POST['id'];
$event_query = "DELETE FROM users WHERE id = '$Id'";
$event_data = mysqli_query($conn, $event_query);
if ($event_data) {
	echo "Deleted Successfully" ;
}       
else{
	echo "Deleted Failed";
}
?>