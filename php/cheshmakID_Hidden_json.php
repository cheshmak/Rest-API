<?php
$ch              = curl_init();
$myPrivateApiKey = "35a17a94f046fed2962ea290f7929c86dbd26811781bc12f475bb8130ac1";// Update me
$myAppID         = "5c3db54c48689000073f881b"; // Update me
$myCheshmakId    = '6a7b85d0-cfae-11e9-9bd3-856294cddc55'; // Update me
$myJSON = [ // Update me
	"name" => "reza",
	"city" => "chehmak"
];

///////////////////////////// Don't change the following code ///////////////////////////////
$data            = array (
	'afterOpenType' => 'service',
	'pushData' =>
		[
			'title' => 'ارسال داده',
			'customData'=> json_encode($myJSON)
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