<?php
$text = $_POST['text'];
$to = $_POST['to'];
$entext = urlencode($text);
//xhttp.open("GET", "http://ws.detectlanguage.com/0.2/detect?q=$text&key=70d388dfdd536088faef3c75e3878153", true);
//xhttp.send();
		 
$url = "http://ws.detectlanguage.com/0.2/detect?q=$entext&key=70d388dfdd536088faef3c75e3878153";
 
//$data = http_build_query( array( ‘name’ => ‘value’ ) );
 
$options = array(
    'http' => array(
        'header'  => "Content-type: application/x-www-form-urlencoded",
        'method'  => 'POST'
    ),
);
 
$context = stream_context_create( $options );
 
$result = file_get_contents( $url, false, $context );
$res=json_decode($result,true);
$from = $res['data']['detections'][0]['language'];
// When you have your own client ID and secret, put them down here:
$CLIENT_ID = "FREE_TRIAL_ACCOUNT";
$CLIENT_SECRET = "PUBLIC_SECRET";

// Specify your translation requirements here:
$postData = array(
  'fromLang' => $from,
  'toLang' => $to,
  'text' => $_POST['text']
);

$headers = array(
  'Content-Type: application/json',
  'X-WM-CLIENT-ID: '.$CLIENT_ID,
  'X-WM-CLIENT-SECRET: '.$CLIENT_SECRET
);

$url = 'http://api.whatsmate.net/v1/translation/translate';
$ch = curl_init($url);

curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($postData));

$response = curl_exec($ch);

echo $response;
curl_close($ch);
?>