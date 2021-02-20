<?php
$ch              = curl_init();
$myPrivateApiKey = "544b885ba9f07e3c3653e1656060d30aceb3bd7f9be0168c18f4942cfcca";// API Key	 Update me
$myAppID         = "5c31b4772e465e0006ba0164"; //  Update me
$myPushTitle     = 'Normal push'; // Update me
$myPushMessage   = 'MY PUSH MESSAGE FROM PHP'; // Update me
$targetPushUrl   = 'http://mywebsite.com/'; // Update me
$myTags = [ // Update me
	'groupB',
	'cheshmakMulti3',
];

///////////////////////////// Don't change the following code ///////////////////////////////
$data        = array(
	'afterOpenType' => 'url',
	'pushData'      =>
		[
			'title'        => $myPushTitle,
			'shortMessage' => $myPushMessage,
			'url'          => $targetPushUrl,
		],
	'target'        => [
		'tags' => [
			'pattern' => $myTags
		]
	]


);

$data_string = json_encode( $data );
curl_setopt( $ch, CURLOPT_URL, "https://api.cheshmak.me/v1/push/app/{$myAppID}/send" );
curl_setopt( $ch, CURLOPT_RETURNTRANSFER, 1 );
curl_setopt( $ch, CURLOPT_POSTFIELDS, $data_string );
curl_setopt( $ch, CURLOPT_POST, 1 );

$headers   = array();
$headers[] = "Content-Type: application/json";
$headers[] = "Key: {$myPrivateApiKey}";
$headers[] = "Cache-Control: no-cache";
curl_setopt( $ch, CURLOPT_HTTPHEADER, $headers );

$result = curl_exec( $ch );

if ( curl_errno( $ch ) ) {
	echo 'Error:' . curl_error( $ch );
} else {
	var_dump( $result );
}
curl_close( $ch );