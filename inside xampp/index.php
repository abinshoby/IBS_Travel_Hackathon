<?php
//$new = fopen("tmp.txt","w");
//fclose($new);
$out=shell_exec("python summaryglow.py 2>&1 ");
//$out=shell_exec("dir");
echo $out;
//if($out){
	//$myfile = fopen("tmp.txt", "r") or die("Unable to open file!");
	//echo fread($myfile,filesize("tmp.txt"));
	//fclose($myfile);
	//unlink("tmp.txt");}
	//else 
		//echo"error";


?>