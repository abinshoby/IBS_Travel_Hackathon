<?php
$connection=mysqli_connect('localhost','root','','usermanagement');
if(!$connection)
{
	echo "unable to connect to my sql.".PHP_EOL;
	echo "Debugging errno:".mysqli_connect_errno().PHP_EOL;
	echo "Debugging error:".mysqli_connect_error().PHP_EOL;

}
?>
