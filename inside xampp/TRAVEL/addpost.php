<?php
session_start();
$con = mysqli_connect("localhost","root","","www");
$exp = $_POST['exp'];
$state = $_POST['state'];
$cost = $_POST['cost'];
$title = $_POST['title'];
$tag = $_POST['tag'];
$uname = $_SESSION['username'];
$sql = "INSERT INTO experience(username, experience, state, cost, title, tag)
VALUES ('$uname', '$exp', '$state', '$cost', '$title', '$tag')";


$res = $con->query($sql);
if($res){
	echo "Success";
	exit();
}
echo "DSDS";
?>