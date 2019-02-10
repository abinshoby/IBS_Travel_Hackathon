<?PHP
error_reporting(0);
if(isset($_POST['text'])){
 $d=$_POST['text'];
$to=$_POST['to'];
//$myfile = fopen("translate.txt", "w") or die("Unable to open file!");
	//echo fread($myfile,filesize("tmp.txt"));
//fwrite($myfile,$d);
//fclose($myfile);
//$myfile = fopen("to.txt", "w") or die("Unable to open file!");
	//echo fread($myfile,filesize("tmp.txt"));
//fwrite($myfile,$to);
//fclose($myfile);
$out=shell_exec("python actual.py $d ~~ $to 2>&1 ");
//echo $out;
//$outfile=fopen("translate.txt", "r") or die("Unable to open file!");//for display translated text
//if( file_exists("translate.txt"))
    //echo fread($outfile,filesize("translate.txt"));
//fclose($outfile);
exit();
}

?>

