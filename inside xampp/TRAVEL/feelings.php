<?php
$con = mysqli_connect("localhost","root","","www");
$text = $_POST['text'];
$file = fopen("hackathon/nlp.txt","w");
fwrite($file,$text);
$file = fopen("hackathon/newnlp.txt","w");
$out = shell_exec("python hackathon/nlpibm.py 2>&1");
fwrite($file,$out);
fclose($file)
/*
$sql = "SELECT * FROM experience WHERE 'experience'=$text LIMIT 1";
$res = $con->query($sql);
while($row = $res->fetch_assoc()){
	$id= $row['id'];
	$sql = "UPDATE experience
SET feeling= $out
WHERE id=$id";
}*/
?>