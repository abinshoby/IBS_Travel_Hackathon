<?php
$con = mysqli_connect("localhost","root","","www");
$id= $_POST['id'];
$sql = "SELECT * FROM experience WHERE id=$id";
$res= $con->query($sql);
while($row = $res->fetch_assoc()){
	$up = $row['upvote']+1;
	$sql = "UPDATE experience
SET upvote = $up
WHERE id=$id";
	$res = $con->query($sql);
}
?>