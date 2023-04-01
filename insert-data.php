<?php
include("config.php");

$name = ucwords($_POST['full_name']);
$email = $_POST['emaildata'];

$query = "INSERT INTO users (name,email) VALUES ('$name','$email')";
if($conn->query($query))
{
  echo 1;
}
else{
  echo 0;
}

?>