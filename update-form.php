<?php
include("config.php");
$id = $_POST['id'];
$fullname = ucwords($_POST['fullname']);
$email = $_POST['email'];
$event_query = "UPDATE users SET name='$fullname',email='$email' WHERE id='$id'";
$event_data = mysqli_query($conn, $event_query);

if ($event_data) {
	echo "Updated Successfully" ;
}       
else{
	echo "Updated Failed";
}
?>