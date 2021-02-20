<?php
$ch              = curl_init();
$myPrivateApiKey = "35a17a94f046fed2962ea290f7929c86dbd26811781bc12f475bb8130ac1";//API Key	 Update me
$myAppID         = "5c3db54c48689000073f881b"; // Update me
$myPushTitle     = 'Normal push with JSON'; // Update me
$myPushMessage   = 'MY PUSH MESSAGE FROM PHP'; // Update me
$targetPushUrl   = 'http://mywebsite.com/'; // Update me
$myJSON = [ // Update me
	"name" => "reza",
	"city" => "chehmak"
];

///////////////////////////// Don't change the following code ///////////////////////////////
$data            = array (
	'afterOpenType' => 'url',
	'pushData' =>
		[
			'title' => $myPushTitle,
			'shortMessage' => $myPushMessage,
			'url' => $targetPushUrl,
			'customData'=> json_encode($myJSON)
		],

	'start' => 1580111268000,
	'end' => 1580287188000,
);
$data_string     = json_encode($data);
curl_setopt($ch, CURLOPT_URL, "https://api.cheshmak.me/v1/push/app/{$myAppID}/send" );
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,$data_string );
curl_setopt($ch, CURLOPT_POST, 1);

$headers         = array();
$headers[]       = "Content-Type: application/json";
$headers[]       = "Key: {$myPrivateApiKey}";
$headers[]       = "Cache-Control: no-cache";
curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$result = curl_exec($ch);

if (curl_errno($ch)) {
echo 'Error:' . curl_error($ch);
}else{
	var_dump($result);
}
curl_close ($ch);