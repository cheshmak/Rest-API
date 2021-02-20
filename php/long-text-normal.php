<?php
$ch              = curl_init();
$myPrivateApiKey = "35a17a94f046fed2962ea290f7929c86dbd26811781bc12f475bb8130ac1";// API Key	 Update me
$myAppID         = "5c3db54c48689000073f881b"; //  Update me
$myPushTitle     = 'Normal push'; // Update me
$myPushMessage   = 'MY PUSH MESSAGE FROM PHP'; // Update me

///////////////////////////// Don't change the following code ///////////////////////////////
$data            = array (
	'afterOpenType' => 'openProgram',
	'pushData' =>
		[
			'title' => $myPushTitle,
			'shortMessage' => $myPushMessage,
			"bigText" => "apps, the cards that learners see are the ones that the software estimates they are closest to forgetting. This increases long-term retention. It’s easier to space repetition with microlearning than with any other learning method. Not only are topics focused, making it easier to identify what the learner does and does not remember, but ",
			 "smallIcon" => "ic_shopping_cart",
		],
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