<?php
$localhost = "localhost";
$username = "root";
$password = "";
$dbname = "ajax_crud";

// db connection
$conn = mysqli_connect($localhost, $username, $password, $dbname);
// check connection
if($conn) {
  //echo "Successfully connected";
} else {
echo "connection failed";
};

?>
