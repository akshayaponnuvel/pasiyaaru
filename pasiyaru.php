<?php

$name = $_POST['name'];
$pno = $_POST['pno'];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pasiyaru";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Connection failure: " . $conn->connect_error);
}

$sql = "INSERT INTO order(name,pno) VALUES ('$name','$pno')";


if($conn->query($sql)==TRUE){
  echo "Your table is booked successfully";
}
 else{
  echo "Error:".$sql."<br>".$conn->error;
}

$conn->close();

?>