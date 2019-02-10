


<?PHP
error_reporting(0);
if(isset($_POST['text'])){
 $d=$_POST['text'];
$to=$_POST['to'];

//echo"<script>console.log('";echo $d; echo"');</script>";
$out=shell_exec("python translate.py $d ~~ $to 2>&1 ");
     
    $myfile = fopen("translate.txt", "r") or die("Unable to open file!");
    echo $out;
    $r= fread($myfile,filesize("translate.txt"));
   echo"<script>var msg = new SpeechSynthesisUtterance('"; echo $r;echo "');
msg.lang = lang[$('#to').val()];

window.speechSynthesis.speak(msg); recognition.stop();</script>";
                                 
echo $r;

fclose($myfile); 

exit();
}


?>

