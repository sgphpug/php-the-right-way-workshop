<?php
include 'foo.php';
$user = $_POST['username'];
$pass = $_POST['password'];
if( !strcasecmp($user, "admin") && !strcasecmp($pass, $secret)) {
    echo"<h1>$flag</h1>";
}
else { 
    echo"<h1>No flag for n00bs..</h1>";
}
?>