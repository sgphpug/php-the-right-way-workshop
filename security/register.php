<?php
$con=mysqli_connect("127.0.0.1","root","root123","test");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
$user = $_GET["user"];
$pass = $_GET["pass"];
if ($user=="admin"){
echo "User admin already registered";

}
else{
$res = mysqli_query($con,"SELECT * FROM user
WHERE pass = '$pass'");
if (mysqli_num_rows($res) > 0){
echo "Password already choosen choose a different one";
}
else{

mysqli_query($con,"INSERT INTO user (usr, pass) 
VALUES ('$user','$pass')") or die(mysqli_error($con));
echo "User registered";
}
}

mysqli_close($con);
?>
