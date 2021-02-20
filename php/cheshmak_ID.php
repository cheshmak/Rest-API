<?php
$ch              = curl_init();
$myPrivateApiKey = "35a17a94f046fed2962ea290f7929c86dbd26811781bc12f475bb8130ac1";// Update me
$myAppID         = "5c3db54c48689000073f881b"; // Update me
$myPushTitle     = 'FROM PHP'; // Update me
$myPushMessage   = 'MY PUSH MESSAGE WITH API'; // Update me
$targetPushUrl   = 'http://mywebsite.com/'; // Update me
$pushIcon        = 'https://www.android.com/static/2016/img/share/andy-lg.png'; // Update me
$myCheshmakId    = 'eea8a320-fe41-11ea-be87-2177fb9971f8'; // Update me

///////////////////////////// Don't change the following code ///////////////////////////////
$data            = array (
	'afterOpenType' => 'url',
	'pushData' =>
		[
			'title' => $myPushTitle,
			'shortMessage' => $myPushMessage,
			'icon' => $pushIcon,
			'url' => $targetPushUrl,
		],
	'filter' =>
		[
			'cheshmakIds' => [ $myCheshmakId ],
		]
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