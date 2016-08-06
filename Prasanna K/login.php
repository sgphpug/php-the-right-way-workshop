<?php
$con=mysqli_connect("127.0.0.1","root","root123","test");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$user = $_GET["user"];
$pass = addslashes($_GET["pass"]);
$result = mysqli_query($con,"SELECT * FROM user
WHERE usr = 'admin' and pass = '$pass'");

if (mysqli_num_rows($result) > 0)
{
echo "You are Admin .. You win .... Welcome";
 } 
 else{
 echo "Try Harder .....";

 }
 mysqli_close($con);
 ?>
