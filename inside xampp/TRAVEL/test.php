<?php
$con = mysqli_connect("localhost","root","","www");
$sql = "SELECT NAME FROM destination WHERE REVIEW > 4.5";
$res = $con->query($sql);
while($row = $res->fetch_assoc()){
	$array[] = $row;
}
//	print_r($array);

foreach($array as $np){
	$b[] = $np['NAME'];
}
print_r($b);
?>